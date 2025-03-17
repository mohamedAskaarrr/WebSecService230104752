<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermission
{
    public function handle(Request $request, Closure $next, $permission)
    {
        if (!auth()->check()) {
            return redirect('login');
        }

        if (!auth()->user()->hasPermission($permission)) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        return $next($request);
    }
} 