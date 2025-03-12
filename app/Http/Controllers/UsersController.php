<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller {

 public function doLogin(Request $request) {
 if(!Auth::attempt(['email' => $request->email, 'password' => $request->password]))
 return redirect()->back()->withInput($request->input())->withErrors('Invalid login information.');
 $user = User::where('email', $request->email)->first();
 Auth::setUser($user);
 return redirect("/");
 }
 

use ValidatesRequests;

public function doRegister(Request $request)
{
    $request->validate([
        'name' => ['required', 'string'],
        'email' => ['required', 'email', 'unique:users'],
        'password' => ['required', 'confirmed'],
    ]);

    // Create new user with default role = 'user'
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'Role' => 'user', // Assign default role
    ]);

    // Log in the new user
    Auth::login($user);

    // Redirect user to welcome1 page
    return redirect("/");
}

//  return redirect("/");
// }}




public function index()
    {
        return view('welcome1'); // Ensure you have a `welcome1.blade.php` file
    }


public function showUsers()
    {
        $users = User::all(); // Fetch all users from the database
        return view('users.Admin', compact('users')); // Pass users to the view
    }

public function showAdminPage()
{
    $users = User::all();
    return view('users.Admin', compact('users'));
}





public function userprofile(Request $request) {
    return view('users.UserProfile');
    }





 public function register(Request $request) {
 return view('users.register');
 }
// Removed duplicate doRegister method
 public function login(Request $request) {
 return view('users.login');
 }
//  public function doLogin(Request $request) {
//  return redirect('/');
//  }
public function doLogout(Request $request) {

    Auth::logout();
    return redirect("/register");
   }


//  public function doRegister(Request $request) {
//     if($request->password!=$request->confirm_password)
//     return redirect()->route('register', ['error'=>'Confirm password not matched.']);
//     if(!$request->email || !$request->name || !$request->password)
//     return redirect()->route('register', ['error'=>'Missing registration info.']);
//     if(User::where('email', $request->email)->first()) //Secure
//     return redirect()->route('register', ['error'=>'Missing registration info.']);

//     return redirect("/");
//    }
   





}