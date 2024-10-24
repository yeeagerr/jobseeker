<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Pekerjaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::guard('company')->check()) {
            return redirect()->route('home');
        }
        $jobs = Pekerjaan::all();
        return view('jobs.index', compact(var_name: 'jobs'));
    }

    public function filter_jobs(Request $request)
    {
        if (Auth::guard('company')->check()) {
            return redirect()->route('home');
        }
        $query = Pekerjaan::with('company');

        if (count($request->jam) > 1 or count($request->tingkat) > 1 or count($request->tipe) > 1) {
            if (count($request->jam) > 1) {
                $query->whereIn('jam', $request->jam);
            }
            if (count($request->tingkat) > 1) {
                $query->whereIn('tingkat', $request->tingkat);
            }
            if (count($request->tipe) > 1) {
                $query->whereIn('tipe', $request->tipe);
            }

            $pekerjaans = $query->get();
        } else {
            $pekerjaans = Pekerjaan::with('company')->get();
        }

        $html = view('components.cardJob-1', ['jobs' => $pekerjaans])->render();

        return response()->json(['html' => $html]);
    }

    public function detail(Pekerjaan $id)
    {
        $isApply = Applicant::where("user_id", Auth::user()->id)->where('pekerjaan_id', $id->id)->first();
        return view('jobs.detail-job', compact('id', 'isApply'));
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

    public function show_edit(Pekerjaan $id)
    {
        // $user = Auth::guard('company')->user();
        return view("jobs.edit-job", compact("id"));
    }

    public function update(Pekerjaan $id, Request $request)
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

        $id->update($validatedData);
        return redirect()->route('company.profile', Auth::guard("company")->user()->id)->with("success", "Job successfully updated!");
    }

    public function destroy($id)
    {
        $job = Pekerjaan::find($id);
        $job->delete();
        return redirect()->route('company.profile', Auth::guard("company")->user()->id)->with("success", "Job successfully deleted!");
    }
}
