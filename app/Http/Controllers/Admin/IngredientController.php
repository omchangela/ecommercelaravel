<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class IngredientController extends Controller
{
    /**
     * Display a listing of the ingredients.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $records = Ingredient::with('product')->select('ingredients.*'); // Select required fields

            return DataTables::of($records)
                ->addColumn('product', function ($record) {
                    return $record->product->name ?? 'N/A'; // Safely get product name
                })
                ->editColumn('created_at', function ($record) {
                    return $record->created_at->format('Y-m-d H:i:s'); // Format created_at field
                })
                ->addColumn('action', function ($record) {
                    return '<a href="' . route('admin.ingredients.edit', $record->id) . '" class="btn btn-warning btn-sm">Edit</a>
                            <form action="' . route('admin.ingredients.destroy', $record->id) . '" method="POST" style="display:inline;">
                                ' . csrf_field() . method_field('DELETE') . '
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">Delete</button>
                            </form>';
                })
                ->rawColumns(['action']) // Ensure HTML columns are rendered correctly
                ->make(true);
        }

        return view('admin.ingredients.index'); // Pass necessary data to the view
    }

    /**
     * Show the form for creating a new ingredient.
     */
    public function create()
    {
        $products = Product::all(); // Fetch all products
        return view('admin.ingredients.form', compact('products'));
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
    public function edit($id)
    {
        $ingredient = Ingredient::findOrFail($id);  // Find ingredient by ID
        $products = Product::all();  // Fetch all products
        return view('admin.ingredients.form', compact('ingredient', 'products'));
    }



    /**
     * Update the specified ingredient in storage.
     */
    public function update(Request $request, $id)
{
    // Convert 'key' and 'value' to strings
    $keys = is_array($request->key) ? implode(',', $request->key) : strval($request->key);
    $values = is_array($request->value) ? implode(',', $request->value) : strval($request->value);

    // Validate the input fields after conversion
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'key' => 'required|max:255',
        'value' => 'required', // Ensure 'value' is treated as a string
    ]);

    // Find the ingredient by ID
    $ingredient = Ingredient::findOrFail($id);

    // Update the ingredient with the converted values
    $ingredient->update([
        'product_id' => $request->product_id,
        'key' => $keys,
        'value' => $values,
    ]);

    return redirect()->route('admin.ingredients.index')->with('success', 'Ingredient updated successfully!');
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
