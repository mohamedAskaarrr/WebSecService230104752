<?php
// app/Http/Controllers/Auth/LoginController.php;

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function login(Request $request)
    {
        // Validate the login request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            // Check the user's role
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('welcome'); // Redirect admin to welcome page
            } else {
                return redirect()->route('userprofile'); // Redirect user to profile page
            }
        }

        // If login fails, redirect back with error
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }
}