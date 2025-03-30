<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
Artisan::call('cache:clear');

use App\Models\User;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;



use Illuminate\Foundation\Validation\ValidatesRequests;

class ProductController extends Controller{
    use ValidatesRequests;
   
    //
    public function list(Request $request)
    {
        $products = User::all(); // Fetch all products
        return view('products.index', compact('products')); // Pass products to view
    }
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
        
        return redirect('products.index')->with('status','User created successfully');
        }


        public function search(Request $request)
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
    // public function crUsers(){
    //     return view('products.index');
    // }
    
    public function even(){
        return view('even');
    }
    // public function minitest(){
    //     return view('minitest');
    // }
    public function show($id)
    {
        return view('products.show', ['product' => User::find($id)]);
    }
    public function edit($id)
    {
        // This will dump all roles assigned to the user

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
        return redirect('products.index')->with('status','User created successfully');
    }


    public function Destroy($id){
        $Role = User::find($id);
        $Role->delete();
        
        return redirect('products.index')->with('status', 'User Deleted successfully');
        
    }

}