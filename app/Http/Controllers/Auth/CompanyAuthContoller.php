<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Interview;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CompanyAuthContoller extends Controller
{
    public function show_register()
    {
        return view('company.register');
    }

    public function show_login()
    {
        return view('auth.login-company');
    }

    public function create(Request $request)
    {
        $validate = $request->validate(
            [
                'nama' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:companies|unique:users',
                'deskripsi' => 'nullable|string',
                'lokasi' => 'nullable|string|max:255',
                'size' => 'nullable|string|max:50',
                'industri' => 'nullable|string|max:100',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'link' => 'nullable|max:255',
                'password' => 'required|string|min:8',
            ]
        );

        $password = Hash::make($validate['password']);

        $validate['password'] = $password;

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('company.logo'), $logo);
        } else {
            $logo = null;
        }

        if ($request->hasFile('banner')) {
            $banner = $request->file('banner')->getClientOriginalName();
            $request->file('banner')->move(public_path('company.banner'), $banner);
        } else {
            $banner = null;
        }


        $validate['logo'] = $logo;
        $validate['banner'] = $banner;

        $company = Company::create($validate);

        $pertanyaan = [
            'Ceritakan tentang diri anda',
            'Alasan mengapa bapak/ibu mendaftar di perusahaan kami',
            'Apa pengalaman dan skill kamu di bidang ini ?'
        ];
        Interview::create([
            'company_id' => $company->id,
            'pertanyaan' => json_encode($pertanyaan),
        ]);

        event(new Registered($company));

        Auth::guard('company')->login($company);

        // dd(Auth::guard('company')->check());

        return redirect(route('verification.notice', absolute: false));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $company = Company::where('email', $request->email)->first();

        if ($company) {
            if (Hash::check($request->password, $company->password)) {
                Auth::guard('company')->login($company);

                return redirect()->route('home');
            } else {
                return redirect()->route('company.login');
            }
        } else {
            return redirect()->route('company.login');
        }
    }
}
