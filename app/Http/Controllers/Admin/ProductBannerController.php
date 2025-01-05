<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class ProductBannerController extends Controller
{
    public function index(Request $request)
{
    if ($request->ajax()) {
        $banners = ProductBanner::select('id', 'image_path', 'created_at'); // Select created_at field
        
        return DataTables::of($banners)
            ->addColumn('image', function ($banner) {
                return '<img src="' . asset('storage/' . $banner->image_path) . '" width="100" />';
            })
            ->addColumn('created_at', function ($banner) {
                return $banner->created_at->format('Y-m-d H:i:s'); // Format the created_at field
            })
            ->addColumn('action', function ($banner) {
                return '<a href="' . route('admin.product_banners.edit', $banner->id) . '" class="btn btn-teal btn-sm">Edit</a> 
                        <form action="' . route('admin.product_banners.destroy', $banner->id) . '" method="POST" style="display:inline;" onsubmit="return confirm(\'Are you sure?\')">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>';
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }

    return view('admin.product_banners.index');
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
