<?php

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Example of a protected route
Route::middleware('auth:api')->get('/my-protected-data', function (Request $request) {
    return $request->user(); // Returns the authenticated user
});

// Or group multiple routes
Route::group(['middleware' => 'auth:api'], function() {
    // Route::get('/another-resource', [YourController::class, 'index']);
    // ... other protected routes
});