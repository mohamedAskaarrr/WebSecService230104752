<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ProductModel;


class ProductController extends Controller
{
    //
    public function create(){
        return view('products.create');
    }
    public function store(Request $request){
        $data=$request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'   
        ])
        
        ;
        $newUser= User::create($data);
        return redirect(route('products.index'))
        

        
        ;
    }
    public function index(Request $request)
    {
        $query = User::query();
        
        if ($request->filled('search')) {
            $query->where('id', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('name', 'like', '%' . $request->search . '%');
        }
        
        $user = $query->get();
        return view('products.index', ['products' => $user]);
    }
    public function crUsers(){
        return view('products.index');
    }
    public function show($id)
    {
        return view('products.show', ['product' => User::find($id)]);
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('products.edit', ['user' => $user]);
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        
        $user = User::find($id);
        $user->update($data);
        
        return redirect(route('products.index'))->with('success', 'User updated successfully');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        
        return redirect(route('products.index'))->with('success', 'User deleted successfully');
    }
}
