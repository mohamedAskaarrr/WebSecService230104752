<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleRedirectMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->hasRole('admin')) {
                return redirect('/dashboard');
            } elseif (Auth::user()->hasRole('user')) {
                return redirect('/users/UserProfile');
            }
        }

        return $next($request);
    }
}
