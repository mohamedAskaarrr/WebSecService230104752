<?php
namespace App\Http\Controllers\Web;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use DB;

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

		if(!auth()->user()) return redirect('/');

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

		if(!auth()->user()->hasPermissionTo('delete_products')) abort(401);

		$product->delete();

		return redirect()->route('products_list');
	}










	
	public function addToBasket(Product $product)
	{
		$user = auth()->user();
	
		// Check if the user is logged in
		if (!$user) {
			return redirect()->route('login')->with('warning', 'You need to be logged in to add products to your basket.');
		}
	
		// Check if the user has enough credit
		if ($user->credit < $product->price) {
			return redirect()->back()->with('warning', '⚠️ Your credit is not enough to buy this product.');
		}
	
		// Check if the product is in stock
		if ($product->available_stock <= 0) {
			return redirect()->back()->with('warning', '⚠️ Product is out of stock.');
		}
	
		// Deduct credit from the user
		$user->credit -= $product->price;
		$user->save();
	
		// Decrease product stock
		$product->available_stock -= 1;
		$product->save();
	
		// Retrieve the basket from the database (or session) related to the logged-in user
		$basket = $user->basket()->first();
	
		if (!$basket) {
			// If the user doesn't have a basket, create one
			$basket = new Basket();
			$basket->user_id = $user->id;
			$basket->save();
		}
	
		// Add product to the basket or update its quantity
		$productInBasket = $basket->products()->where('product_id', $product->id)->first();
	
		if ($productInBasket) {
			// If product already exists in the basket, increase the quantity
			$productInBasket->pivot->quantity++;
			$productInBasket->pivot->save();
		} else {
			// If product is not in the basket, add it
			$basket->products()->attach($product->id, ['quantity' => 1]);
		}
	
		// Redirect the user to the basket page with a success message
		return redirect()->route('products.basket')->with('success', 'Product added to basket!');
	}

	public function removeFromBasket($productId)
{
	
    $user = auth()->user();

    // Find the product in the user's basket
    // $basketItem = Basket::where('user_id', $user->id)
    //                     ->where('product_id', $productId)
    //                     ->first();
	


	$basketItem = Basket::where('user_id', auth()->id())
						->where('product_id', $productId)
						->first();

	if ($basketItem) {
		$basketItem->delete(); // Remove the product from the basket
	}

    return redirect()->route('products.basket')->with('success', 'Product removed from basket!');
}

	


public function basket()

{
	// $user = auth()->user(); // Get the logged-in user
    // $basketItems = Basket::with('product')->where('user_id', $user->id)->get(); // Get the user's basket items

    $basket = session('basket', []);
    return view('products.basket', compact('basket'));
}



} 
