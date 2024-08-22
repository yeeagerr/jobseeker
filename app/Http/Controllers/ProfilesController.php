<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    public function index()
    {
        $message = "";
        $btnMessage = "";
        $route = "";
        if (Auth::user()) {
            if (!request()->user()->hasVerifiedEmail()) {
                $message = "Kamu harus verifikasi email kamu telebih dahulu, Silahkan cek gmail kamu yang telah di registrasi";
                $btnMessage = "Kembali";
                $route = route('verification.notice');
            }
        } else {
            $message = "Kamu belom membuat profile, buat profile terlebih dahulu";
            $btnMessage = "Buat Profile Sekarang";
            $route = route('register');
        }



        return view('profile.index', [
            'user' => Auth::user(),
            'message' => $message,
            'btnMessage' => $btnMessage,
            'route' => $route
        ]);
    }

    public function show_edit()
    {
        $user = Auth::user();
        return view('profile.edit-profile', compact('user'));
    }

    public function update(Request $request)
    {
        // Validate the incoming request data
        $validate = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'skills' => 'array|nullable',
            'skills.*' => 'string|nullable',
        ]);

        // Find the authenticated user
        $user = User::find(Auth::user()->id);


        $pengalaman = $user->pengalaman ? $user->pengalaman : [];
        $newPengalaman = [
            $request->input("year"),
            $request->input("positionEx"),
            $request->input("descriptionEx")
        ];
        // dd($newPengalaman);

        $pengalaman[] = $newPengalaman;

        // dd($pengalaman);

        // Update the user with validated data
        $user->update([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'position' => $request->input('positionUser'), // Assuming 'positionUser' is a valid input
            'description' => $request->input('descriptionUser'),
            'skills' => $request->input('skills'), // Use validated skills
            'age' => $request->input('age'),
            'nohp' => $request->input('nohp'),
            'alamat' => $request->input('alamat'),
            'pengalaman' => $pengalaman
        ]);



        return redirect()->route('profile');
    }
}
