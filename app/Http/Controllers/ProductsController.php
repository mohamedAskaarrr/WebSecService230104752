<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
 

public function basket(){
    $products = Product::all();
    return view('product1.Basket', ['products' => $products]);
    


}
public function buy(Product $product)
{
    $user = Auth::user();

    if ($user->credit < $product->price) {
        return redirect()->back()->with('error', 'Not enough credit!');
    }

    // Deduct price from user's credit
    $user->credit -= $product->price;
    $user->save();

    // Reduce product stock
    if ($product->available_stock > 0) {
        $product->available_stock -= 1;
        $product->save();
        // Check if the user has a relationship method for purchased products
          } else {
            // Handle the case where the method does not exist
            return redirect()->back()->with('error', 'Unable to record purchase.');
        }

        return redirect()->route('basket')->with('success', 'Product purchased successfully!');

   
    
    
    }

public function index(){
        $products = Product::all();
        return view('product1.list', ['products' => $products]);
        
    }

    public function create(){
        return view('product1.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'model' => 'required', 
            'price' => 'required|decimal:0,2',
             'description' => 'nullable',
            'photo' => 'max:2048',
        ]);

        $newProduct = Product::create($data);

        return redirect(route('product1.list'));

    }

    public function edit(Product $product){
        return view('product1.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request){

            if (!auth()->user()->hasPermissionTo('edit')) {
            abort(401);
            
            $product->delete();
            return redirect()->route('products_list');
           }
           
        $data = $request->validate([
            'code' => 'required',   
            'name' => 'required',
            'model' => 'integer',
            'price' => 'required',
            'description' => 'nullable',
            'photo' => 'max:2048',
        ]);

        $product->update($data);

        return redirect(route('product1.list'))->with('success', 'Product Updated Succesffully');

    }

    public function destroy(Product $product){
        $product->delete();
        return redirect(route('product1.list'))->with('success', 'Product deleted Succesffully');
    }
}