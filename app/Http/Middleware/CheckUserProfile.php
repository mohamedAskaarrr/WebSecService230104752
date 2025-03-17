<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserProfile
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && $request->is('welcome*') && Auth::user()->role !== 'admin') {
            return redirect()->route('UserProfile')->with('error', 'Unauthorized access!');
        }

        return $next($request);
    }
}
