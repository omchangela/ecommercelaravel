<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

use App\Models\Product;
use Illuminate\Http\Request;

use App\Models\HowToUse;
use App\Models\IndepthProductDetail;
use App\Models\Ingredient;
use App\Models\Category;

class ShopController extends Controller
{
    /**
     * Display the total number of products.
     */

    public function index(Request $request)
    {
        // Fetch categories for the sidebar
        $categories = Category::all();

        // Fetch the total number of products
        $totalProducts = Product::count();

        // Start the query for products with eager loading of prices
        $query = Product::with(['prices'])->select('products.*');

        // Filter by category if provided
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter by price range if provided
        if ($request->has('price_range')) {
            list($minPrice, $maxPrice) = explode('-', $request->price_range);
            $query->whereHas('prices', function ($q) use ($minPrice, $maxPrice) {
                $q->whereBetween('price', [(int)$minPrice, (int)$maxPrice]);
            });
        }

        // Apply sorting with optimized server-side rendering
        if ($request->has('orderby')) {
            switch ($request->orderby) {
                case 'date':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'price':
                    $query->join('prices', 'products.id', '=', 'prices.product_id')
                        ->orderBy('prices.price', 'asc');
                    break;
                case 'price-desc':
                    $query->join('prices', 'products.id', '=', 'prices.product_id')
                        ->orderBy('prices.price', 'desc');
                    break;
            }
        }

        // Paginate the results
        $products = $query->paginate(12)->appends($request->all());


        

        // Return the main view with data
        return view('website.shop.index', compact('products', 'categories', 'totalProducts'));
    }


    /**
     * Display the details of a single product.
     */
    public function show(Product $product)
    {
        // Load the prices relationship for the product
        $product->load('prices');

        // Pass data to the view
        return view('website.productdetails', compact('product'));
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
