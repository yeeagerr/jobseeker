<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Company;
use App\Models\Pekerjaan;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    public function home()
    {
        return view('landing.company');
    }

    public function index()
    {
        $companies = Company::all();
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
        return view('company.index', compact('companies', 'companiesWithRatings'));
    }

    public function profile(Company $id)
    {
        $jobs = Pekerjaan::where('company_id', $id->id)->get();
        $reviews = Review::where('company_id', $id->id)->paginate(6);
        $IsRating = Review::where([
            ['user_id', Auth::user()->id ?? "null"],
            ['company_id', $id->id]
        ])->first();

        $totalReviews = $reviews->count(); // Menghitung jumlah ulasan
        $averageRating = 0; // atau bisa juga 1, tergantung preferensi kamu

        if ($totalReviews > 0) {
            $totalRating = $reviews->sum('rating'); // Menghitung total rating
            $averageRating = $totalRating / $totalReviews; // Menghitung rata-rata rating

            // Memastikan rating berada dalam rentang 1 sampai 5
            $averageRating = min(max($averageRating, 1), 5);
        }

        return view('profile.company.profile', compact('jobs', 'id', 'reviews', 'IsRating', 'averageRating'));
    }

    public function show_edit()
    {
        $company = Auth::guard('company')->user();
        return view('profile.company.edit-profile', compact('company'));
    }

    public function update(Request $request)
    {
        $company = Company::findOrFail(Auth::guard(name: 'company')->user()->id);
        $validate = $request->validate(
            [
                'nama' => 'required|string|max:255',
                'email' => [
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('companies')->ignore($company->id),
                    Rule::unique("users")
                ],
                'deskripsi' => 'required|string',
                'lokasi' => 'required|string|max:255',
                'size' => 'nullable|string|max:50',
                'industri' => 'nullable|string|max:100',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'link' => 'nullable|max:255',
                'password' => 'nullable|string|min:8',
            ]
        );
        $isPassword = Auth::guard('company')->user()->password;

        if ($validate['password']) {
            $isPassword = Hash::make($validate['password']);
        }

        // dd($isPassword);
        $validate['password'] = $isPassword;


        if ($validate['logo'] ?? "") {
            $logo = $request->file('logo')->getClientOriginalName() ?? "";
            $request->file('logo')->move(public_path('company.logo'), $logo);
        }
        if ($validate['banner'] ?? "") {
            $banner = $request->file('banner')->getClientOriginalName() ?? "";
            $request->file('banner')->move(public_path('company.banner'), $banner);
        }

        $validate['logo'] = $logo ?? Auth::guard('company')->user()->logo;
        $validate['banner'] = $banner ?? Auth::guard('company')->user()->banner;

        $company->update($validate);
        // return redirect()->route('company.edit')->with("success", "Your company profile successfully updated");
        return redirect()->route('company.profile', $company->id)->with("success", "Your company profile successfully updated");
    }
}
