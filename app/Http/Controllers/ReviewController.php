<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store($CompanyId, Request $request)
    {
        if (!$CompanyId or empty($CompanyId)) {
            return redirect()->route('home')->with('failed', 'Whos company you want review bro?, theres no one');
        }
        $request->validate([
            'message' => 'required',
            'rating' => 'required|in:1,2,3,4,5',
            'agreement' => 'required'
        ]);

        // dd($request->rating);

        Review::create([
            'company_id' => $CompanyId,
            'user_id' => $request->user()->id,
            'message' => $request->message,
            'rating' => $request->rating
        ]);

        return redirect()->route('company.profile', $CompanyId)->with('success', 'You added your review to this company');
    }

    public function destroy(Review $id)
    {
        if (Auth::check()) {
            if (Auth::user()->id ?? "" !== $id->user_id) {
                return redirect()->back()->with('failed', 'You not own this review');
            }
        }
        $company_id = $id->company_id;
        $id->delete();
        return redirect()->route('company.profile', $company_id)->with('success', 'Your review successfully deleted!');
    }
}
