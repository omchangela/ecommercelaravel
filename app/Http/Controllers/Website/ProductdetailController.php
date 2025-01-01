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


}
