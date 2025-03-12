<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            return view('admin.dashboard');
        }

        return redirect('/home')->with('error', 'You do not have access to this page.');
    }
}