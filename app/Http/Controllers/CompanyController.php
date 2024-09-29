<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Pekerjaan;
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
        return view('company.index', compact('companies'));
    }

    public function profile(Company $id)
    {
        $user = Auth::guard('company')->user();
        $jobs = Pekerjaan::all();
        return view('profile.company.profile', compact('user', 'jobs', 'id'));
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
