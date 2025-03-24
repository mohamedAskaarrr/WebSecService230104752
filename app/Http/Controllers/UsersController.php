<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Spatie\Permission\Models\Role;
class UsersController extends Controller {
    use ValidatesRequests;

    // public function debugRole()
    // {
    //     $user = User::find(1); // Change 1 to a valid user ID
    //     dd($user->getRoleNames());
    // }

    public function doLogin(Request $request) {
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->back()
                ->withInput($request->input())
                ->withErrors('Invalid login information.');
        }

        $user = User::where('email', $request->email)->first();
        Auth::setUser($user);
    //    dd($request->all());
        return redirect("/");
    }
    
    public function viewProfile(){
        return view('users.UserProfile');
    }

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
        ]);
        $user->assignRole('user');

        // Log in the new user
        Auth::login($user);

        // Redirect user to welcome1 page
        return redirect("/login");
        
    }

    public function index()
    {
        return view('welcome1'); // Ensure you have a `welcome1.blade.php` file
    }

    public function showUsers()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        $users = User::all();
        return view('users.Admin', compact('users'));
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

    public function login(Request $request) {
        return view('users.login');
    }

    public function doLogout(Request $request) {
        Auth::logout();
        return redirect("/register");
    }

    public function updateUser(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            
            // Simplified permission check
            if (!Auth::check()) {
                return redirect()->back()->with('error', 'Please login first.');
            }

            // Allow users to edit their own profile or admins to edit any profile
            if (Auth::id() !== $user->id && Auth::user()->role !== 'admin') {
                return redirect()->back()->with('error', 'Unauthorized access');
            }

            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $id,
            ];

            $messages = [
                'name.required' => 'The name field is required.',
                'email.required' => 'The email field is required.',
                'email.email' => 'Please enter a valid email address.',
                'email.unique' => 'This email is already in use.'
            ];

            // Only admin can change roles
            if (Auth::user()->role === 'admin') {
                $rules['role'] = 'required|in:admin,employee,user';
                $messages['role.in'] = 'Invalid role selected.';
            }

            $request->validate($rules, $messages);

            $updateData = [
                'name' => $request->name,
                'email' => $request->email,
            ];

            // Only admin can update roles
            if (Auth::user()->role === 'admin' && $request->has('role')) {
                $updateData['role'] = $request->role;
            }

            $user->update($updateData);

            return redirect()->back()->with('success', 'User updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the user.');
        }
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        
        // Check if user has permission or is editing their own profile
        if (!(Auth::user()->hasPermission('editUser') && 
            Auth::id() !== $user->id && 
            Auth::user()->role !== 'employee')) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        return view('users.edit', compact('user'));
    }

    public function changePassword(Request $request, $id)
    {
        try {
            if (!(Auth::user()->role === 'admin' || Auth::id() === $id)) {
                return redirect()->back()
                    ->with('error', 'You do not have permission to change this password.');
            }

            $request->validate([
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required'
            ], [
                'password.required' => 'The password field is required.',
                'password.min' => 'The password must be at least 6 characters.',
                'password.confirmed' => 'The password confirmation does not match.',
                'password_confirmation.required' => 'Please confirm your password.'
            ]);

            $user = User::findOrFail($id);
            $user->update([
                'password' => bcrypt($request->password)
            ]);

            return redirect()->back()->with('success', 'Password updated successfully');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()
                ->with('error', 'User not found.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while changing the password.');
        }
    }

    public function deleteUser($id)
    {
        try {
            if (!Auth::user()->hasPermission('delete_users')) {
                return redirect()->back()
                    ->with('error', 'You do not have permission to delete users.');
            }

            $user = User::findOrFail($id);
            
            // Prevent deleting your own account
            if (Auth::user()->id === $user->id) {
                return redirect()->back()
                    ->with('error', 'You cannot delete your own account.');
            }

            $user->delete();

            return redirect()->back()->with('success', 'User deleted successfully');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()
                ->with('error', 'User not found.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while deleting the user.');
        }
    }

    public function updateProfile(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255'
            ], [
                'name.required' => 'The name field is required.',
                'name.string' => 'The name must be text.',
                'name.max' => 'The name cannot be longer than 255 characters.'
            ]);

            $user = Auth::user();
            if (!$user) {
                return redirect()->back()->with('error', 'User not authenticated.');
            }

            $user->update(['name' => $request->name]);

            return redirect()->back()->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the profile.');
        }
    }


    public function updateCredit(Request $request, User $user)
{
    $request->validate([
        'amount' => 'required|numeric',
        'operation' => 'required|in:add,subtract'
    ]);

    if ($request->operation === 'subtract' && $user->credit < $request->amount) {
        return redirect()->back()->with('error', 'Insufficient credit!');
    }

    // Update credit based on operation type
    $user->credit = ($request->operation === 'add') 
        ? $user->credit + $request->amount 
        : $user->credit - $request->amount;

    $user->save();

    return redirect()->back()->with('success', 'User credit updated successfully!');
}

}