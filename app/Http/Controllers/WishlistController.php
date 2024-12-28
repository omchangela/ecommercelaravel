<?php

namespace App\Http\Controllers;

use App\Models\Product;

use App\Models\Wishlist;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // Display wishlist
    public function index()
    {
        $user = Auth::user();
        $wishlists = Wishlist::where('user_id', $user->id)->get();
        $wishlistCount = $wishlists->count();
        return view('website.wishlist.index', compact('wishlists', 'wishlistCount'));
    }

    // Add item to cart from wishlist
    public function addToCart($wishlistId)
    {
        $wishlist = Wishlist::findOrFail($wishlistId);

        if (!$wishlist->product_id) {
            return redirect()->route('wishlist.index')->with('error', 'Invalid product ID.');
        }

        $product = Product::findOrFail($wishlist->product_id);
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image_url,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
    }



    public function store(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'product_name' => 'required|string',
            'product_image' => 'required|string',
            'price' => 'required|numeric',
            'unit' => 'nullable|string', // Validate the unit field
        ]);
    
        // Save to database
        Wishlist::create([
            'product_id' => $validated['product_id'],
            'product_name' => $validated['product_name'],
            'product_image' => $validated['product_image'],
            'price' => $validated['price'],
            'unit' => $validated['unit'], // Save unit value
            'user_id' => auth()->id(),
        ]);
    
        return redirect()->route('wishlist.index')->with('success', 'Added to wishlist successfully !');
    }
    

    // Delete item from wishlist
    public function destroy($wishlistId)
    {
       
        $wishlistItem = Wishlist::findOrFail($wishlistId);
        $wishlistItem->delete();

        return redirect()->route('wishlist.index')->with('success', 'Product removed from wishlist.');
    }
}
