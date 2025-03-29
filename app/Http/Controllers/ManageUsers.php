<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Inertia\Inertia;
class ManageUsers extends Controller
{

    
    
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
    public function edit(Permission $permission ){
        // return $permission;
            
        // return $permission;
        return view('role-permission.permission.edit',compact('permission'));
          

       
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


    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,'.$permission->id
        ]);

        $permission->update([
            'name' => $request->name            
        ]);

        return redirect('permissions')->with('status', 'Permission updated successfully');
    }

    public function Destroy($permissionID){
        $permission = Permission::find($permissionID);
        $permission->delete();
        
        return redirect('permissions')->with('status', 'Permission Deleted successfully');
        
    }


}