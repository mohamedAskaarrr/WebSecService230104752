<?php
// app/Http/Controllers/Auth/LoginController.php
// app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller


{



    public function onlinestore(){
        return view('frontend.master');
    }
    public function login(Request $request)
    {
        // Validate the login request
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
           
        ]);

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Check the user's role
            if (Auth::user()->role === 'admin') {
                return redirect('/'); // Redirect admin to the home page
            } else {

                return redirect('/users/UerProfile'); // Redirect regular users to the user profile page
            }
        }

        // If login fails, redirect back with an error
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }
}