<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PreventDuplicateSubmit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah request sudah di-submit sebelumnya dalam session
        if (session()->has(key: 'last_submission_time') && session('last_submission_time') + 5 > time()) {
            return redirect()->route('user.profile', Auth::user()->id)->with('success', 'Your account successfully updated');
        }

        // Simpan waktu submit di session
        session(['last_submission_time' => time()]);
        return $next($request);
    }
}
