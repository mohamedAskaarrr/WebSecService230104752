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


}

