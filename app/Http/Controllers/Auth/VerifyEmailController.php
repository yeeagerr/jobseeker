<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        $detectUser = Auth::check() ?  $request->user() : Auth::guard('company')->user();
        if ($detectUser->hasVerifiedEmail()) {
            return redirect()->route('home');
        }

        if ($detectUser->markEmailAsVerified()) {
            event(new Verified($detectUser));
        }

        return redirect()->route('home');
    }
}
