<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Add product to cart
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        // Check if the product is already in the cart for the logged-in user
        $existingCart = Cart::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->first();

        if (!$existingCart) {
            // If not, create a new cart item
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'product_name' => $product->name,
                'price' => $request->price,
                'quantity' => $request->quantity ?? 1,
                'unit' => $request->unit,
                'image_url' => $product->image_url, // Include image URL from the product
            ]);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        return redirect()->back()->with('error', 'Product is already in your cart.');
    }

    // Add product from wishlist to cart
    public function addFromWishlist(Request $request)
    {
        $wishlist = Wishlist::findOrFail($request->wishlist_id);

        // Check if the product is already in the cart
        $existingCart = Cart::where('user_id', auth()->id())
            ->where('product_id', $wishlist->product_id)
            ->first();

        if (!$existingCart) {
            // Add the item to the cart
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $wishlist->product_id,
                'product_name' => $wishlist->product_name,
                'price' => $wishlist->price,
                'quantity' => 1, // Default quantity
                'unit' => $wishlist->unit,
                'image_url' => $wishlist->product_image,
            ]);
        }

        // Remove the item from the wishlist
        $wishlist->delete();

        return redirect()->back()->with('success', 'Product moved to cart successfully!');
    }

    // Show cart items
    public function index()
    {
        $cartItems = Cart::where('user_id', auth()->id())->get();
        $cartCount = $cartItems->count();
        return view('website.cart.index', compact('cartItems', 'cartCount'));
    }

    // Delete product from cart
    public function destroy($id)
    {
        try {
            $cartItem = Cart::where('user_id', auth()->id())->findOrFail($id);
            $cartItem->delete();

            // Check if the cart is empty after the deletion
            $isCartEmpty = Cart::where('user_id', auth()->id())->count() === 0;

            // Refresh the page instead of redirecting
            return redirect()->back()->with('success', 'Item removed from the cart successfully!');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete item'], 500);
        }
    }

    // Update cart item quantity
    public function updateQuantity(Request $request)
    {
        // Assuming you are saving cart items in the session or database.
        $cartItems = $request->input('cartItems');

        foreach ($cartItems as $cartItem) {
            $item = Cart::find($cartItem['id']);
            if ($item) {
                $item->quantity = $cartItem['quantity'];
                $item->save();
            }
        }

        return response()->json(['success' => true, 'cartItems' => $cartItems]);
    }
}
