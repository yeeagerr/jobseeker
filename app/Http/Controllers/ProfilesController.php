<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    public function index()
    {
        return view('profile.index', [
            'message' => Auth::user() ? null : "Kamu belom membuat profile, buat profile terlebih dahulu",
            'btnMessage' => Auth::user() ? null : "Buat Profile Sekarang"
        ]);
    }
}
