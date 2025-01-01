<?php

namespace App\Http\Controllers\Website;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;
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
            'unit' => 'nullable|string',
        ]);

        // Save to database
        Wishlist::create([
            'product_id' => $validated['product_id'],
            'product_name' => $validated['product_name'],
            'product_image' => $validated['product_image'],
            'price' => $validated['price'],
            'unit' => $validated['unit'],
            'user_id' => auth()->id(),
        ]);

        // Redirect back with success message and flag to reload
        return back()->with('success', 'Added to wishlist successfully!')->with('reload', true);
    }



    // Delete item from wishlist
    public function destroy($wishlistId)
    {

        $wishlistItem = Wishlist::findOrFail($wishlistId);
        $wishlistItem->delete();

        return redirect()->route('wishlist.index')->with('success', 'Product removed from wishlist.');
    }

    public function remove(Request $request)
{
    $user = Auth::user();
    $productId = $request->input('product_id');

    // Find and remove the product from the wishlist
    $wishlistItem = \App\Models\Wishlist::where('user_id', $user->id)->where('product_id', $productId)->first();
    if ($wishlistItem) {
        $wishlistItem->delete();
    }

    return redirect()->back()->with('reload', true);
}
}
