<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
class RoleController extends Controller
{
    //
    public function index(){
        $Roles = Role::all();

        return view('role-permission.role.index',
    [
        'Roles' => $Roles
    ]);
}
       
    
    public function create(){

        return view('role-permission.role.create');
    }
    public function edit(Role $Role ){
        // return $Role;
            
        // return $Role;
        return view('role-permission.role.edit',compact('Role'));
          

       
    }
    public function store(Request $request){
        $request->validate([
                'name' => 'required', 'unique:Roles,name'
        ]);
        Role::create([
            'name'=>$request -> name            

        ]);
        return redirect('Roles')->with('status','Role created successfully');
    }


    public function update(Request $request, Role $Role)
    {
        $request->validate([
            'name' => 'required|unique:Roles,name,'.$Role->id
        ]);

        $Role->update([
            'name' => $request->name            
        ]);

        return redirect('Roles')->with('status', 'Role updated successfully');
    }

    public function Destroy($RoleID){
        $Role = Role::find($RoleID);
        $Role->delete();
        
        return redirect('Roles')->with('status', 'Role Deleted successfully');
        
    }



}
