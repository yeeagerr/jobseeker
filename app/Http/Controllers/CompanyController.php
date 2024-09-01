<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function home()
    {
        return view('landing.company');
    }

    public function index()
    {
        return view('company.index');
    }
}
