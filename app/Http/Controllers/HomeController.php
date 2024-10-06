<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Pekerjaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // dd(Auth::guard('company')->check());
        if (Auth::guard('company')->check()) {
            $seeker = User::take(5)->get();
            return view('landing.company', compact('seeker'));
        } else {
            $companies = Company::take(5)->get();
            $companiesWithRatings = [];
            foreach ($companies as $company) {
                $averageRating = 0; // Default rating (misalnya 0 atau 1, sesuai preferensi)
                // dd($company->has_review[0]->sum('rating'));
                $totalReviews = $company->has_review->count(); // Menghitung jumlah review


                if ($totalReviews > 0) {
                    $totalRating = $company->has_review[0]->sum('rating'); // Menghitung total rating
                    $averageRating = $totalRating / $totalReviews; // Menghitung rata-rata rating

                    // Pastikan rating berada dalam rentang 1 sampai 5
                    $averageRating = min(max($averageRating, 1), 5);
                }
                $companiesWithRatings[] = [
                    'company' => $company,
                    'averageRating' => $averageRating
                ];
            }

            return view('landing.user', compact('companies', 'companiesWithRatings'));
        }
    }
}
