<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Store a newly created price in storage.
     */
    public function store(Request $request, $productId)
    {
        $validated = $request->validate([
            'price' => 'required|numeric|min:0',
            'unit' => 'required|string|max:255',
        ]);

        $product = Product::findOrFail($productId);

        // Create a new price for the product
        $product->prices()->create($validated);

        return redirect()->route('admin.product.show', $productId)->with('success', 'Price added successfully!');
    }

    /**
     * Remove the specified price from storage.
     */
    public function destroy($productId, $priceId)
    {
        $price = Price::findOrFail($priceId);
        $price->delete();

        return redirect()->route('admin.product.show', $productId)->with('success', 'Price deleted successfully!');
    }
}
