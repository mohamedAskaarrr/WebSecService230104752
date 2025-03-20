<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
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