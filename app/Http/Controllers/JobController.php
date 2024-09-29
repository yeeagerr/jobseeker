<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Pekerjaan::all();
        return view('jobs.index', compact('jobs'));
    }

    public function detail(Pekerjaan $id)
    {
        return view('jobs.detail-job', compact('id'));
    }

    public function job()
    {
        return view('jobs.add-job');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'tanggal'      => 'required|date',
            'pekerjaan'    => 'required|string|max:255',
            'lokasi'       => 'required|string|max:255',
            'jam'          => 'required|string|in:full time,part time,half time,satu proyek,kapan saja',
            'tipe'         => 'required|string|in:setiap hari,fleksibel,shift,kerja di tempat,metode online', //in:full-time,part-time,internship  
            'tingkat'      => 'required|string|in:pemula,junior,middle,senior,sepuh',
            'deskripsi'    => 'nullable|string',
            'gaji'         => 'nullable|string',
            'requirement'  => 'nullable|string',
        ]);

        Pekerjaan::create([
            'company_id' => Auth::guard('company')->user()->id,
            'tanggal'      => $validatedData['tanggal'],         // Date
            'pekerjaan'    => $validatedData['pekerjaan'],       // Job title
            'lokasi'       => $validatedData['lokasi'],          // Location
            'jam'          => $validatedData['jam'],             // Time
            'tipe'         => $validatedData['tipe'],            // Job type
            'tingkat'      => $validatedData['tingkat'],         // Job level
            'deskripsi'    => $validatedData['deskripsi'],       // Description (nullable)
            'gaji'         => $validatedData['gaji'],            // Salary (nullable)
            'requirement'  => $validatedData['requirement'],     // Requirements (nullable
        ]);
        return redirect()->route('company.profile', Auth::guard("company")->user()->id)->with("success", "Job successfully added!");
    }
}
