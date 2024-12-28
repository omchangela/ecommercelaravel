<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use App\Models\Product;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the ingredients.
     */
    public function index()
    {
        $ingredients = Ingredient::with('product')->paginate(10);
        return view('admin.ingredients.index', compact('ingredients'));
    }

    /**
     * Show the form for creating a new ingredient.
     */
    public function create()
    {
        $products = Product::all(); // Fetch all products
        return view('admin.ingredients.create', compact('products'));
    }

    /**
     * Store a newly created ingredient in storage.
     */

     public function store(Request $request)
     {
         // Validate the input fields (ensure key and value arrays are present and valid)
         $request->validate([
             'product_id' => 'required|exists:products,id',
             'key' => 'required|array',         // Validate 'key' as an array
             'key.*' => 'required|string|max:255', // Each key in the array should be a non-empty string
             'value' => 'required|array',       // Validate 'value' as an array
             'value.*' => 'required|string',    // Each value in the array should be a non-empty string
         ]);
     
         // Create ingredients
         $productId = $request->product_id;
         foreach ($request->key as $index => $key) {
             Ingredient::create([
                 'product_id' => $productId,
                 'key' => $key,
                 'value' => $request->value[$index],
             ]);
         }
     
         return redirect()->route('admin.ingredients.index')->with('success', 'Ingredients added successfully!');
     }
     

    /**
     * Show the form for editing the specified ingredient.
     */
    public function edit(Ingredient $ingredient)
    {
        $products = Product::all(); // Fetch all products
        return view('admin.ingredients.edit', compact('ingredient', 'products'));
    }

    /**
     * Update the specified ingredient in storage.
     */
    public function update(Request $request, Ingredient $ingredient)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'key.*' => 'required|string|max:255',
        'value.*' => 'required|string',
    ]);

    $ingredient->update([
        'product_id' => $request->product_id,
    ]);

    // Delete existing ingredients and re-create them
    $ingredient->ingredients()->delete();

    foreach ($request->key as $key => $value) {
        $ingredient->ingredients()->create([
            'key' => $request->key[$key],
            'value' => $request->value[$key],
        ]);
    }

    return redirect()->route('admin.ingredients.index')->with('success', 'Ingredient updated successfully.');
}


    /**
     * Remove the specified ingredient from storage.
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();

        return redirect()->route('admin.ingredients.index')->with('success', 'Ingredient deleted successfully.');
    }
}
