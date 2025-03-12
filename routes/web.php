<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\GradeController;
use App\Models\Grade;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/academic-record', function () {
    $grades = Grade::all();
    return view('academic-record', compact('grades'));
})->name('academic.record');

Route::get('/multible', function () {
return view('multible'); //welcome.blade.php
});

Route::get('/even', function () {
return view('even'); //even.blade.php
});

Route::get('/prime', function () {
return view('prime'); //prime.blade.php
});

Route::get('/minitest', function () {
    return view(view: 'minitest'); //prime.blade.php
    });

Route::get('/create',[ProductController::class,'create'])->name('create');

Route::post('/product/store',[ProductController::class,'store'])->name('products.store');

Route::get('/products/index',[ProductController::class,'index'])->name('index');

// Add these resource routes for products
Route::resource('products', ProductController::class);

Route::resource('grades', GradeController::class);


