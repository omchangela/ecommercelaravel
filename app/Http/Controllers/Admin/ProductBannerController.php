<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductBannerController extends Controller
{
    public function index()
    {
        $banners = ProductBanner::paginate(10);
        return view('admin.product_banners.index', compact('banners'));
    }

    public function create()
{
    return view('admin.product_banners.form', ['banner' => null]);
}

public function edit(ProductBanner $productBanner)
{
    return view('admin.product_banners.form', ['banner' => $productBanner]);
}

public function update(Request $request, ProductBanner $productBanner)
{
    $request->validate([
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($request->hasFile('image')) {
        // Delete old image
        Storage::disk('public')->delete($productBanner->image_path);

        // Store new image
        $imagePath = $request->file('image')->store('product_banners', 'public');
        $productBanner->image_path = $imagePath;
    }

    $productBanner->save();

    return redirect()->route('admin.product_banners.index')->with('success', 'Banner updated successfully.');
}


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('product_banners', 'public');

        ProductBanner::create([
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.product_banners.index')->with('success', 'Banner created successfully.');
    }

    public function destroy(ProductBanner $productBanner)
    {
        Storage::disk('public')->delete($productBanner->image_path);
        $productBanner->delete();

        return redirect()->route('admin.product_banners.index')->with('success', 'Banner deleted successfully.');
    }
}
