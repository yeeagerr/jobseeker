<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Company;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{
    public function store(Pekerjaan $id, Request $request)
    {
        // $request->validate([
        //     'qna' => 'required|array',
        //     'resume' => 'nullable'
        // ]);


        if ($request->hasFile('resume')) {
            $resume = $request->file('resume')->getClientOriginalName();
            $request->file('resume')->move(public_path('resume'), $resume);
        } else {
            $resume = null;
        }

        $pertanyaan = json_decode($id->company->has_interview->pertanyaan);
        $qna = [];

        for ($i = 0; $i < count($pertanyaan); $i++) {
            $penampungan = [
                'pertanyaan' => $pertanyaan[$i],
                'jawaban' => $request->qna[$i]
            ];
            array_push($qna, $penampungan);
        }

        Applicant::create([
            'pekerjaan_id' => $id->id,
            'user_id' => Auth::user()->id,
            'company_id' => $id->company_id,
            'qna' => json_encode($penampungan),
            'resume' => $resume
        ]);

        return redirect()->route('user.profile', Auth::user()->id)->with('success', "Pesan melamar kamu telah terkirim, tinggal tunggu waktu saja.");
    }
}
