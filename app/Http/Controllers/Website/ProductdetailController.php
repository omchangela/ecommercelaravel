<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\HowToUse;
use App\Models\IndepthProductDetail;
use App\Models\Ingredient;

class ProductdetailController extends Controller
{
    public function home(Request $request)
    {
        // Fetch data dynamically
        $products = Product::get();    // Get all products
        $categories = Category::all(); // Get all categories

        // Pass data to the view
        return view('website.productdetails', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function productDetail($id)
{
    // Eager load 'prices' and 'category' relationships for the product
    $product = Product::with(['prices', 'category'])->find($id);

    if (!$product) {
        abort(404, 'Product not found');
    }

    // Fetch the first price as the default selected price
    $price = $product->prices->first();

    // Fetch the in-depth product details
    $detail = IndepthProductDetail::with('product')->where('product_id', $id)->first();

    // Fetch ingredients associated with the product
    $ingredients = Ingredient::with('product')->where('product_id', $id)->paginate(10);

    // Fetch how-to-use instructions
    $howtouses = HowToUse::with('product')->where('product_id', $id)->paginate(10);

    // Retrieve multiple images from the product (stored as a JSON or serialized field)
    $multipleImages = $product->multiple_images;

    // Pass all data to the view, including the product images
    return view('website.productdetails', compact('product', 'price', 'detail', 'ingredients', 'howtouses', 'multipleImages'));
}





    public function addToBag(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'price_id' => 'required|exists:prices,id',
        ]);

        // Retrieve the current bag session or initialize a new one
        $bag = session()->get('bag', []);

        // Add the product to the bag
        $bag[] = [
            'product_id' => $validated['product_id'],
            'price_id' => $validated['price_id']
        ];

        // Save the bag back to the session
        session()->put('bag', $bag);

        return redirect()->back()->with('success', 'Product added to the bag!');
    }

    public function viewBag()
    {
        // Retrieve bag data from the session
        $bag = session()->get('bag', []);

        // Optionally, you can load the product and price details for display
        $bagItems = collect($bag)->map(function ($item) {
            $product = Product::find($item['product_id']);
            $price = $product ? $product->prices->find($item['price_id']) : null;

            return [
                'product' => $product,
                'price' => $price,
            ];
        });

        return view('website.bag', compact('bagItems'));
    }
}
