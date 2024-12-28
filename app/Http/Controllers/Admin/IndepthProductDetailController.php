<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IndepthProductDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class IndepthProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = IndepthProductDetail::with('product')->paginate(10);
        return view('admin.indepth_product_details.index', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $products = Product::all(); // Get all products
    return view('admin.indepth_product_details.form', compact('products'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('indepth_images', 'public');
        }

        IndepthProductDetail::create($data);

        return redirect()->route('admin.indepth-product-details.index')->with('success', 'Detail added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IndepthProductDetail $indepthProductDetail)
{
    $products = Product::all(); // Get all products
    return view('admin.indepth_product_details.form', compact('indepthProductDetail', 'products'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IndepthProductDetail $indepthProductDetail)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($indepthProductDetail->image && \Storage::disk('public')->exists($indepthProductDetail->image)) {
                \Storage::disk('public')->delete($indepthProductDetail->image);
            }

            $data['image'] = $request->file('image')->store('indepth_images', 'public');
        }

        $indepthProductDetail->update($data);

        return redirect()->route('admin.indepth-product-details.index')->with('success', 'Detail updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IndepthProductDetail $indepthProductDetail)
    {
        if ($indepthProductDetail->image && \Storage::disk('public')->exists($indepthProductDetail->image)) {
            \Storage::disk('public')->delete($indepthProductDetail->image);
        }

        $indepthProductDetail->delete();

        return redirect()->route('admin.indepth-product-details.index')->with('success', 'Detail deleted successfully.');
    }

//     public function show($id)
// {
    
//     $detail = IndepthProductDetail::with('product')->where('product_id', $id)->first();

//     if (!$detail) {
//         abort(404, 'Product details not found');
//     }

//     return view('website.productdetails', compact('detail'));
// }

}
