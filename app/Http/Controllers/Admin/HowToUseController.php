<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HowToUse;
use App\Models\Product;
use Illuminate\Http\Request;

class HowToUseController extends Controller
{
    /**
     * Display a listing of the HowToUse entries.
     */
    public function index()
    {
        $howToUses = HowToUse::with('product')->get();
        return view('admin.howtouses.index', compact('howToUses'));
    }

    /**
     * Show the form for creating a new HowToUse entry.
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.howtouses.create', compact('products'));
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
    public function edit(HowToUse $howToUse)
    {
        $products = Product::all();
        return view('admin.howtouses.edit', compact('howToUse', 'products'));
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
        $howToUse->delete();

        return redirect()->route('admin.howtouses.index')->with('success', 'How-to-use entry deleted successfully.');
    }
}
