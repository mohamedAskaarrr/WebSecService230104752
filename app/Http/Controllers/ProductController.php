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
        $newUser= User::create($data);
        return redirect(route('products.index'));
        


        

        
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

    public function listProduct()
{
    return view('Product1.list'); // Ensure you have a `welcome1.blade.php` file
}
public function save(Request $request, Product $product ): RedirectResponse {
    $this->validate($request, [
        'code' => ['required', 'string', 'max:32'],
        'name' => ['required', 'string', 'max:128'],
        'model' => ['required', 'string', 'max:256'],
        'description' => ['required', 'string', 'max:1024'],
        'price' => ['required', 'numeric'],
        'photo' => ['nullable', 'image', 'max:1024'],
    ]);

    // Save logic here...

    $product = $product ?? new Product();
    $product->fill($request->all());
    $product->save();

    return redirect()->route('product1.list');
}
public function showProduct() {
    $products = Product::all(); 
    dd($products);
    
    // Fetch all products from database
    return view('Product1.list', compact('products'));
}
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        
        return redirect(route('products.index'))->with('success', 'User deleted successfully');
    }

//     public function delete(Request $request, Product $product)
//     {
//         if (!auth()->user()->hasPermissionTo('delete_products')) {
//             abort(401);
//         }
//         $product->delete();
//     return redirect()->route('products_list');  
//    }



}







