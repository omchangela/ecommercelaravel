<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BannerController extends Controller
{
    // Display the list of banners
    public function index(Request $request)
{
    if ($request->ajax()) {
        $banners = Banners::select('*');
        
        return DataTables::of($banners)
            ->editColumn('created_at', function ($record) {
                return $record->created_at->format(config('setting.DATETIME_FORMAT'));
            })
            ->editColumn('image', function ($record) {
                return $record->image 
                    ? '<img src="' . asset('storage/' . $record->image) . '" width="100" alt="Image">'
                    : 'No Image';
            })
            ->addColumn('action', function ($record) {
                return '<a href="' . route('admin.banners.show', $record->id) . '" class="btn btn-info btn-sm" title="View">View</a>' .
                    '&nbsp;<a href="' . route('admin.banners.edit', $record->id) . '" class="btn btn-warning btn-sm" title="Edit">Edit</a>' .
                    '&nbsp;<form action="' . route('admin.banners.destroy', $record->id) . '" method="POST" style="display:inline;" onsubmit="return confirm(\'Are you sure you want to delete this banner?\');">' .
                    '<button type="submit" class="btn btn-danger btn-sm" title="Delete">Delete</button></form>';
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    return view('admin.banners.index');
}


    // Show the form for creating a new banner
    public function create()
    {
        return view('admin.banners.create');
    }

    // Store a newly created banner
    public function store(Request $request)
    {
        $request->validate([
            'text_input_1' => 'required|string',
            'text_input_2' => 'required|string',
            'text_input_3' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        // Store the uploaded image in the public storage directory
        $imagePath = $request->file('image')->store('public/banners');

        // Create the banner with the validated inputs
        Banners::create([
            'text_input_1' => $request->input('text_input_1'),
            'text_input_2' => $request->input('text_input_2'),
            'text_input_3' => $request->input('text_input_3'),
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.banners.index')->with('success', 'Banner created successfully.');
    }

    // Display a specific banner
    public function show($id)
    {
        $banner = Banners::findOrFail($id);
        return view('admin.banners.show', compact('banner'));
    }

    // Show the form for editing a banner
    public function edit($id)
    {
        $banner = Banners::findOrFail($id);
        return view('admin.banners.edit', compact('banner'));
    }

    // Update an existing banner
    public function update(Request $request, $id)
    {
        $request->validate([
            'text_input_1' => 'required|string',
            'text_input_2' => 'required|string',
            'text_input_3' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $banner = Banners::findOrFail($id);

        $banner->text_input_1 = $request->input('text_input_1');
        $banner->text_input_2 = $request->input('text_input_2');
        $banner->text_input_3 = $request->input('text_input_3');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/banners');
            $banner->image = $imagePath;
        }

        $banner->save();

        return redirect()->route('admin.banners.index')->with('success', 'Banner updated successfully.');
    }

    // Delete a banner
    public function destroy($id)
    {
        $banner = Banners::findOrFail($id);

        // Optionally delete the image file from storage
        if ($banner->image) {
            \Storage::delete($banner->image);
        }

        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'Banner deleted successfully.');
    }

    public function showBanners()
{
    // Fetch all banners
    $banners = banners::all(); 

    // Pass the banners data to the view
    return view('website.home', compact('banners'));
}
}
