<?php

namespace App\Http\Middleware;

use App\Models\Pekerjaan;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsYourJob
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route('id');
        $job = Pekerjaan::find($id);
        $user = Auth::guard('company')->user();
        if (!isset($job)) {
            return redirect()->route('company.profile', $user->id);
        }

        if ($job->company->id == $user->id) {
            return $next($request);
        } else {
            return redirect()->route('company.profile', $user->id);
        }
    }
}
