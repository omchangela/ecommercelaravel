<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HowToUse;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HowToUseController extends Controller
{
    /**
     * Display a listing of the HowToUse entries for DataTables (server-side processing).
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // Fetch HowToUse data with related product
            $howToUses = HowToUse::with('product')
                ->select('how_to_uses.*');  // Select fields from how_to_uses table

            // Use DataTables to process the data and return the required JSON format
            return DataTables::of($howToUses)
                ->addColumn('product_name', function ($howToUse) {
                    return $howToUse->product->name ?? 'N/A';  // Return product name or N/A if not available
                })
                ->addColumn('description', function ($howToUse) {
                    return $howToUse->description;  // Return description
                })
                ->addColumn('created_at', function ($howToUse) {
                    return $howToUse->created_at->format('Y-m-d');  // Format the created_at field
                })
                ->addColumn('actions', function ($howToUse) {
                    $editUrl = route('admin.howtouses.edit', $howToUse->id);
                    $deleteUrl = route('admin.howtouses.destroy', $howToUse->id);

                    // Correct form action syntax
                    return '
                        <a href="' . $editUrl . '" class="btn btn-warning btn-sm">Edit</a>
                        <form action="' . $deleteUrl . '" method="POST" class="d-inline" onsubmit="return confirm(\'Are you sure?\')">
                            ' . csrf_field() . method_field('DELETE') . '
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>';
                })
                ->rawColumns(['actions'])
                ->make(true);  // Return the DataTables JSON response
        }

        // Return the view when it's not an AJAX request (for initial page load)
        return view('admin.howtouses.index');
    }

    /**
     * Show the form for creating a new HowToUse entry.
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.howtouses.form', compact('products'));
    }

    /**
     * Store a newly created HowToUse entry in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'description' => 'nullable|string',
        ]);

        HowToUse::create($request->only('product_id', 'description'));

        return redirect()->route('admin.howtouses.index')->with('success', 'How-to-use entry created successfully.');
    }

    /**
     * Show the form for editing the specified HowToUse entry.
     */
    public function edit($id)
    {
        $howToUse = HowToUse::findOrFail($id);  // Fetch the specific how-to-use record
        $products = Product::all(); // Fetch all products
        return view('admin.howtouses.form', compact('howToUse', 'products'));
    }

    /**
     * Update the specified HowToUse entry in storage.
     */
    public function update(Request $request, HowToUse $howToUse)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'description' => 'nullable|string',
        ]);

        $howToUse->update($request->only('product_id', 'description'));

        return redirect()->route('admin.howtouses.index')->with('success', 'How-to-use entry updated successfully.');
    }

    /**
     * Remove the specified HowToUse entry from storage.
     */
    public function destroy(HowToUse $howToUse)
{
    // Delete the HowToUse entry
    $howToUse->delete();

    // Return redirect with success message
    return redirect()->route('admin.howtouses.index')->with('success', 'How-to-use entry deleted successfully.');
}

}
