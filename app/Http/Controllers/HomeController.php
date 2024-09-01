<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // dd(Auth::guard('company')->check());
        if (Auth::guard('company')->check()) {
            return view('landing.company');
        } else {
            return view('landing.user');
        }
    }
}
