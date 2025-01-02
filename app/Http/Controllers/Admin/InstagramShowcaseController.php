<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InstagramShowcase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InstagramShowcaseController extends Controller
{
    // Display all images
    public function index()
    {
        $images = InstagramShowcase::paginate(10);
        return view('admin.instagram.index', compact('images'));
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
