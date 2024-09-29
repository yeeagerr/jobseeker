<?php

namespace App\Http\Controllers;

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
            $jobs = Pekerjaan::take(5)->get();
            return view('landing.user', compact('jobs'));
        }
    }
}
