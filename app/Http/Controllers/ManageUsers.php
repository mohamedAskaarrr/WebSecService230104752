<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Inertia\Inertia;
class ManageUsers extends Controller
{
    //
    public function index(){
        $permissions = Permission::all();

        return view('role-permission.permission.index',
    [
        'permissions' => $permissions
    ]);
    
       
    }
    public function create(){

        return view('role-permission.permission.create');
    }
    public function edit(){

        return "wassup";
        // view('role-permission.permission.edit');

       
    }
    public function store(Request $request){
        $request->validate([
                'name' => 'required', 'unique:permissoins,name'
        ]);
        Permission::create([
            'name'=>$request -> name            

        ]);
        return redirect('permissions')->with('status','permission created successfully');
    }


}