<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InstagramShowcase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class InstagramShowcaseController extends Controller
{
    // Display all images
    public function index(Request $request)
{
    if ($request->ajax()) {
        $images = InstagramShowcase::select('id', 'image', 'created_at');
        
        return DataTables::of($images)
            ->addColumn('image', function ($image) {
                return '<img src="' . asset('storage/' . $image->image) . '" width="100" />';
            })
            ->addColumn('created_at', function ($image) {
                return $image->created_at->format('d-m-Y H:i');
            })
            ->addColumn('action', function ($image) {
                return '<a href="' . route('admin.instagram.edit', $image->id) . '" class="btn btn-warning btn-sm">Edit</a>
                        <form action="' . route('admin.instagram.destroy', $image->id) . '" method="POST" style="display:inline;" onsubmit="return confirm(\'Are you sure?\')">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>';
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }

    return view('admin.instagram.index');
}

    // Show the form to create a new image
    public function create()
    {
        return view('admin.instagram.form');
    }

    // Store a new image
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store the uploaded image
        $path = $request->file('image')->store('instagram_images', 'public');

        InstagramShowcase::create([
            'image' => $path,
        ]);

        return redirect()->route('admin.instagram.index')->with('success', 'Image uploaded successfully!');
    }

    // Show the form to edit an image
    public function edit($id)
    {
        $image = InstagramShowcase::findOrFail($id);
        return view('admin.instagram.form', compact('image'));
    }

    // Update an existing image
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = InstagramShowcase::findOrFail($id);

        // If a new image is uploaded, replace the old one
        if ($request->hasFile('image')) {
            // Delete the old image from storage
            Storage::delete('public/' . $image->image);
            
            // Store the new image
            $path = $request->file('image')->store('instagram_images', 'public');
            $image->update(['image' => $path]);
        }

        return redirect()->route('admin.instagram.index')->with('success', 'Image updated successfully!');
    }

    // Delete an image
    public function destroy($id)
    {
        $image = InstagramShowcase::findOrFail($id);
        // Delete the image from storage
        Storage::delete('public/' . $image->image);
        // Delete the image record from the database
        $image->delete();

        return redirect()->route('admin.instagram.index')->with('success', 'Image deleted successfully!');
    }
}
