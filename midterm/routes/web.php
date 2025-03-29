<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ExamController; // Add this line
use App\Models\Grade;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManageUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

Route::get('/', function () {
    return view('welcome1');
});

Route::get('/users/UserProfile', function () {
    return view('UserProfile');
});

Route::get('/users/UserProfile', [UsersController::class, 'viewProfile'])->name('UserProfile');

Route::get('/logout', function () {
    return view('register');
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

Route::get('/minitest', function () {
    return view(view: 'minitest'); //prime.blade.php
});

Route::get('/login', function () {
    return view(view: 'login'); //login.blade.php
});

Route::get('/register', function () {
    return view(view: 'register'); 
});

Route::get('/UserProfile', function () {
    return view('UserProfile'); //welcome.blade.php
});





Route::get('/permission/index',[ManageUsers::class,'index'])->name('index');



Route::get('/products.index', [ProductController::class, 'list'])->name('products.index');



Route::get('/create',[ProductController::class,'create'])->name('create');

Route::post('/product/store',[ProductController::class,'store'])->name('products.store');

Route::get('/products/index',[ProductController::class,'index'])->name('index');

// Add these resource routes for products
Route::resource('products', ProductController::class);

Route::resource('grades', GradeController::class);

// Add these resource routes for exams
Route::resource('exam', ExamController::class);








// Admin Dashboard Route

// User Profile Route
Route::get('/UserProfile', [UsersController::class, 'userprofile'])->name('UserProfile');
Route::get('/welcome', function () {
    return view('welcome');
})->middleware('CheckUserProfile')->name('welcome');

// 





Route::get('/Admin', function () {
    return view('users/admin');
});


// Login route
Route::post('/login', [LoginController::class, 'login'])->name('login');







Route::get('register', [UsersController::class, 'register'])->name('register');
Route::post('register', [UsersController::class, 'doRegister'])->name('do_register');
Route::get('login', [UsersController::class, 'login'])->name('login');
Route::post('login', [UsersController::class, 'doLogin'])->name('do_login');
Route::get('logout', [UsersController::class, 'doLogout'])->name('register');

Route::get('/welcome1', function () {
    
    return view('welcome1');

});



Route::get('/Home', function () {
    return view('Home');
});


Route::get('/debug-role', [UsersController::class, 'debugRole']);




use App\Http\Controllers\ProductsController;








// Route::post('/product1/list', [ProductsController::class, 'add'])->name('productslist');



// Route::put('/product1/update/{id}', [ProductsController::class, 'updateProduct'])->name('product1.update')


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/product', [ProductsController::class, 'index'])->name('product1.list');
Route::get('/product/create', [ProductsController::class, 'create'])->name('product1.create');
Route::post('/product', [ProductsController::class, 'store'])->name('product1.store');
Route::get('/product/{product}/edit', [ProductsController::class, 'edit'])->name('product1.edit');
Route::put('/product/{product}/update', [ProductsController::class, 'update'])->name('product1.update');
Route::delete('/product/{product}/destroy', [ProductsController::class, 'destroy'])->name('product1.destroy');

Route::get('/product/{product}/buy', [ProductsController::class, 'buy'])->name('product1.buy');



Route::get('product1/Basket', [ProductsController::class, 'basket'])->name('Basket');










Route::post('/user/{user}/credit', [UsersController::class, 'updateCredit'])->name('user.updateCredit');























// oneHP 


Route::get('/ass1', function () {
    return view('ass1'); 
   });

// Route::get('/test/{number?}', function ($number = null) {

//     $j =   $number ?? 2;
//     return view('test', compact('j')); 
//    });

Route::get('/test', function (Request $request) {
$j =  $request->number??2;
dd($request->all());

return view('test', compact('j')); 
});

// Route::get('/test', function () {

//     return view('test'); 
//    });


   Route::get('/minitest', function () {
    $bill = [
        ['item' => 'Jam', 'quantity' => 2, 'price' => 11],
        ['item' => 'Milk', 'quantity' => 1, 'price' => 5],
        ['item' => 'Bread', 'quantity' => 3, 'price' => 2.5],
        ['item' => 'Eggs', 'quantity' => 1, 'price' => 3.40],
        ['item' => 'Rice', 'quantity' => 5, 'price' => 1.00],
        ['item' => 'Chicken', 'quantity' => 2, 'price' => 8.75]
    ];
    
    return view('minitest', ['bill' => $bill]); 
});

Route::get('/transcript', function () {
    $student = [
        'name' => 'John Doe',
        'id' => 'STU123456',
        'department' => 'Computer Science',
        'GPA' => '3.8'
    ];

    $courses = [
        [
            'course' => 'Mathematics', 'credits' => 3, 'grade' => 'A',
            'instructor' => 'Dr. Smith', 'schedule' => 'Mon & Wed 10:00 AM - 11:30 AM'
        ],
        [
            'course' => 'Physics', 'credits' => 4, 'grade' => 'B+',
            'instructor' => 'Dr. Brown', 'schedule' => 'Tue & Thu 2:00 PM - 3:30 PM'
        ],
        [
            'course' => 'Computer Science', 'credits' => 3, 'grade' => 'A-',
            'instructor' => 'Prof. Johnson', 'schedule' => 'Mon & Wed 1:00 PM - 2:30 PM'
        ],
        [
            'course' => 'English', 'credits' => 2, 'grade' => 'B',
            'instructor' => 'Ms. Davis', 'schedule' => 'Fri 9:00 AM - 10:30 AM'
        ],
        [
            'course' => 'History', 'credits' => 3, 'grade' => 'C+',
            'instructor' => 'Mr. Wilson', 'schedule' => 'Tue & Thu 11:00 AM - 12:30 PM'
        ]
    ];

    // GPA Calculation
    $gradePoints = [
        'A' => 4.0, 'A-' => 3.7, 'B+' => 3.3, 'B' => 3.0,
        'C+' => 2.7, 'C' => 2.3, 'D' => 2.0, 'F' => 0.0
    ];
    
    $totalCredits = 0;
    $totalPoints = 0;
    
    foreach ($courses as $course) {
        $credits = $course['credits'];
        $grade = $course['grade'];
        $points = $gradePoints[$grade] ?? 0;
        
        $totalCredits += $credits;
        $totalPoints += $credits * $points;
    }

    $gpa = $totalCredits ? round($totalPoints / $totalCredits, 2) : 0.0;

    return view('transcript', [
        'student' => $student,
        'courses' => $courses,
        'gpa' => $gpa
    ]);
});





// Route::get('products', [ProductController::class, 'list'])->name('products_list');

// Admin routes
// Route::middleware(['auth', 'permission:edit_users'])->group(function () {
//     Route::get('/admin/users', [UsersController::class, 'showUsers'])->name('admin.users');
//     Route::get('/admin/users/{id}/edit', [UsersController::class, 'editUser'])->name('admin.users.edit');
//     Route::put('/admin/users/{id}', [UsersController::class, 'updateUser'])->name('admin.users.update');
//     Route::delete('/admin/users/{id}', [UsersController::class, 'deleteUser'])->name('admin.users.delete');
//     Route::post('/admin/users/{id}/change-password', [UsersController::class, 'changePassword'])->name('admin.users.password');
// });

// Employee routes
// Route::middleware(['auth', 'role:employee'])->group(function () {
//     Route::get('/users/{id}/edit', [UsersController::class, 'editUser'])->name('users.edit');
//     Route::put('/users/{id}', [UsersController::class, 'updateUser'])->name('users.update');
// });

// User routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UsersController::class, 'viewProfile'])->name('user.profile');
    Route::put('/profile', [UsersController::class, 'updateProfile'])->name('user.profile.update');
    Route::post('/profile/password', [UsersController::class, 'changePassword'])->name('user.password.update');
});

// // Admin routes for roles and permissions management
// Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
//     Route::resource('roles', RoleController::class);
//     Route::resource('permissions', PermissionController::class);
// });



Route::resource('permissions',App\Http\Controllers\ManageUsers::class);