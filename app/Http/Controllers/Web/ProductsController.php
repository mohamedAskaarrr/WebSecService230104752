<?php
namespace App\Http\Controllers\Web;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Basket;


class ProductsController extends Controller {

	use ValidatesRequests;

	public function __construct()
    {
        $this->middleware('auth:web')->except('list');
    }

	public function list(Request $request) {
        


		$query = Product::select("products.*");

		$query->when($request->keywords, 
		fn($q)=> $q->where("name", "like", "%$request->keywords%"));

		$query->when($request->min_price, 
		fn($q)=> $q->where("price", ">=", $request->min_price));
		
		$query->when($request->max_price, fn($q)=> 
		$q->where("price", "<=", $request->max_price));
		
		$query->when($request->order_by, 
		fn($q)=> $q->orderBy($request->order_by, $request->order_direction??"ASC"));

		$products = $query->get();

		return view('products.list', compact('products'));
	}

	public function edit(Request $request, Product $product = null) {

		if(!Auth::user()) return redirect('/');

		$product = $product??new Product();

		return view('products.edit', compact('product'));
	}

	public function save(Request $request, Product $product = null) {

		$this->validate($request, [
	        'code' => ['required', 'string', 'max:32'],
	        'name' => ['required', 'string', 'max:128'],
	        'model' => ['required', 'string', 'max:256'],
	        'description' => ['required', 'string', 'max:1024'],
	        'price' => ['required', 'numeric'],
	    ]);

		$product = $product??new Product();
		$product->fill($request->all());
		$product->save();

		return redirect()->route('products_list');
	}

	public function delete(Request $request, Product $product) {

		// Simple authorization check - only admins can delete products
		if(!Auth::user() || Auth::user()->email !== 'admin@example.com') abort(401);

		$product->delete();

		return redirect()->route('products_list');
	}










	public function addToBasket(Product $product)
{
    $user = Auth::user();

    // Check if the user is logged in and has enough credit
    if (!$user) {
        return redirect()->route('login')->with('warning', 'You need to be logged in.');
    }

    if ($user->credit < $product->price) {
        return redirect()->back()->with('warning', '⚠️ Not enough credit.');
    }

    // Check if the product is in stock
    if ($product->available_stock <= 0) {
        return redirect()->back()->with('warning', '⚠️ Product out of stock.');
    }

    // Deduct credit and decrease product stock using DB::update
    DB::table('users')->where('id', $user->id)->decrement('credit', $product->price);
    DB::table('products')->where('id', $product->id)->decrement('available_stock', 1);

    // Retrieve or create basket, then add product
	$user = Auth::user();

	$basket = Basket::firstOrCreate([
        'user_id' => $user->id,
        'product_id' => $product->id,
        'product_name' => $product->name,
		
        'quantity' => 1

    ]);


    

    // Uncomment this if you want to use the many-to-many relationship
    // $basket->products()->syncWithoutDetaching([
    //     $product->id => ['quantity' => \DB::raw('quantity + 1')]
    // ]);

	
    // return redirect()->route('products.basket')->with('success', 'Product added to basket!');
    return redirect()->route('products_list')->with('success', 'Thank you for your purchase!');
}





public function purchase(Product $product)
{
    $user = Auth::user();

    // Check if the user is logged in and has enough credit
    if (!$user) {
        return redirect()->route('login')->with('warning', 'You need to be logged in.');
    }

    if ($user->credit < $product->price) {
        return redirect()->back()->with('warning', '⚠️ Not enough credit.');
    }

    // Check if the product is in stock
    if ($product->available_stock <= 0) {
        return redirect()->back()->with('warning', '⚠️ Product out of stock.');
    }

    // Deduct credit and decrease product stock using DB::update
    DB::table('users')->where('id', $user->id)->decrement('credit', $product->price);
    DB::table('products')->where('id', $product->id)->decrement('available_stock', 1);

    // Retrieve or create basket, then add product
	$user = Auth::user();

	$basket = Basket::firstOrCreate([
        'user_id' => $user->id,
        'product_id' => $product->id,
        'product_name' => $product->name,
		
        'quantity' => 1

    ]);




	
}

public function basket()
{
    $user = Auth::user();
    if (!$user) {
        return redirect()->route('login')->with('warning', 'You need to be logged in to view your basket.');
    }

    $basketItems = Basket::where('user_id', $user->id)
        ->join('products', 'basket.product_id', '=', 'products.id')
        ->select('basket.*', 'products.name', 'products.price', 'products.photo')
        ->get();

    return view('products.basket', compact('basketItems'));
}


public function checkout()
{
    $user = Auth::user();
    
    if (!$user) {
        return redirect()->route('login')->with('warning', 'You need to be logged in to checkout.');
    }

    $basketItems = Basket::where('user_id', $user->id)->get();
    
    if ($basketItems->isEmpty()) {
        return redirect()->route('products.basket')->with('warning', 'Your basket is empty.');
    }

    // Process the checkout (you can add your checkout logic here)
    // For now, we'll just clear the basket
    Basket::where('user_id', $user->id);
    
    return redirect()->route('products.basket')->with('success', 'Thank you for your purchase!');
}








public function addstock(Request $request, product $product)

{  
  
    if (auth()->user()->hasRole('Employee')){
        
    }
    
    $request->validate([
        'stock' => 'required|numeric|min:1'
    ]);


    $product->available_stock += $request->stock;

    // Save the updated credit balance
    $product->save();

    return redirect()->back()->with('success', 'Stock updated successfully!');

}
    // In your HomeController or relevant controller
   public function index()
   {
    $products = Product::where('featured', true)->take(3)->get();
    return view('home', compact('products'));
}










}