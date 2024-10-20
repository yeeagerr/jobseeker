<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Company;
use App\Models\Interview;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Pekerjaan $id)
    {
        $isApply = Applicant::where("user_id", Auth::user()->id)->where('pekerjaan_id', $id->id)->first();

        if ($isApply) {
            return redirect()->route('home')->with('failed', 'Kamu sudah mengajukan pekerjaan di sini !');
        }
        return view('company.interview.index', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $company = Auth::guard("company")->user();
        return view("company.interview.edit", compact("company"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Company $id, Request $request)
    {
        $interview = Interview::find($id->has_interview->id);
        $request->validate([
            'pertanyaan' => 'required|array',
        ]);

        $interview->update([
            'pertanyaan' => $request->pertanyaan
        ]);

        return redirect()->route('company.profile', $id->id)->with('success', 'Pertanyaan Interview Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
