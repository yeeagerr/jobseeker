<?php

namespace App\Http\Controllers;

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
}
