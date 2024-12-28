<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private $data = [
        'route' => 'admin.product.',
        'title' => 'Product',
        'menu' => 'product',
        'submenu' => '',
    ];

    public function __construct()
    {
        // $this->middleware('auth');
    }

    private function _validate($request, $id = null)
    {
        return $request->validate([
            'name' => 'required|max:255',
            'status' => 'required|max:255',
            'category_id' => 'required|exists:categories,id', // Ensure category_id is valid
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $records = Product::with('category')->select('id', 'name','description', 'image', 'status', 'category_id', 'rate', 'review_count', 'created_at');

            return DataTables::of($records)
                ->editColumn('image', function ($record) {
                    // Check if image exists and return the full URL using asset helper
                    return $record->image ?
                        '<img src="' . asset('storage/' . $record->image) . '" alt="Image" width="50" height="50" class="img-thumbnail">' :
                        'N/A';
                })
                ->addColumn('category_name', function ($record) {
                    return $record->category ? $record->category->name : 'N/A';
                })
                ->editColumn('status', function ($record) {
                    return $record->status == 'Active'
                        ? '<span class="badge bg-success">Active</span>'
                        : '<span class="badge bg-warning">Inactive</span>';
                })
                ->addColumn('action', function ($record) {
                    return '<a href="' . route($this->data['route'] . 'show', $record->id) . '" class="btn btn-info btn-sm ajax_show">View</a>' .
                        '&nbsp;<a href="' . route($this->data['route'] . 'edit', $record->id) . '" class="btn btn-warning btn-sm">Edit</a>' .
                        '&nbsp;<button class="btn btn-danger btn-sm ajax_delete" data-id="' . $record->id . '">Delete</button>';
                })
                ->addColumn('rate', function ($record) {
                    return $record->rate ?? 'N/A';
                })
                ->addColumn('review_count', function ($record) {
                    return $record->review_count ?? 0;
                })
                ->addColumn('price', function ($record) {
                    $prices = $record->prices->pluck('price')->toArray();
                    return implode(', ', $prices) ?: 'N/A'; // List prices for the product
                })
                ->rawColumns(['image', 'status', 'action'])
                ->make(true);
        }

        return view('admin.product.index', $this->data);
    }
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['categories'] = Category::all(); // Get all categories for the dropdown
        return view('admin.product.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
         $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:65535',
            'image' => 'nullable|image|max:2048',
            'multiple_images.*' => 'nullable|image|max:2048', // Validate multiple images
            'status' => 'required|in:Active,Inactive',
            'category_id' => 'nullable|exists:categories,id',
            'rate' => 'nullable|numeric|min:0',
            'review_count' => 'nullable|integer|min:0',
            'price' => 'required|array',
            'price.*' => 'numeric|min:0',
            'unit' => 'required|array',
            'unit.*' => 'string|max:255',
        ]);

        // Create a new product instance
        $product = new Product();
        $product->fill($request->except(['price', 'unit', 'image', 'multiple_images']));

        // Handle single image upload
        if ($request->hasFile('image')) {
            $imageName = uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('images', $imageName, 'public');
            $product->image = 'images/' . $imageName;
        }

        // Handle multiple image uploads
        if ($request->hasFile('multiple_images')) {
            $multipleImages = [];
            foreach ($request->file('multiple_images') as $image) {
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('images', $imageName, 'public');
                $multipleImages[] = 'images/' . $imageName;
            }
            $product->multiple_images = $multipleImages;
        }

        $product->save();

        // Handle prices and units
        foreach ($request->price as $index => $priceValue) {
            $price = new Price();
            $price->product_id = $product->id;
            $price->price = $priceValue;
            $price->unit = $request->unit[$index];
            $price->save();
        }

        return redirect()->route('admin.product.index')->with('success', 'Product created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['record'] = Product::with('prices')->findOrFail($id);
        
        return view('admin.product.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['record'] = Product::findOrFail($id);
        $this->data['categories'] = Category::all();
        return view('admin.product.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:65535',
            'image' => 'nullable|image|max:2048',
            'multiple_images.*' => 'nullable|image|max:2048', // Validate multiple images
            'status' => 'required|in:Active,Inactive',
            'category_id' => 'nullable|exists:categories,id',
            'rate' => 'nullable|numeric|min:0',
            'review_count' => 'nullable|integer|min:0',
            'price' => 'required|array',
            'price.*' => 'numeric|min:0',
            'unit' => 'required|array',
            'unit.*' => 'string|max:255',
        ]);

        $product = Product::findOrFail($id);
        $product->fill($request->except(['price', 'unit', 'image', 'multiple_images']));

        // Handle single image upload
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $imageName = uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('images', $imageName, 'public');
            $product->image = 'images/' . $imageName;
        }

        // Handle multiple image uploads
        if ($request->hasFile('multiple_images')) {
            if ($product->multiple_images) {
                foreach ($product->multiple_images as $image) {
                    Storage::disk('public')->delete($image);
                }
            }
            $multipleImages = [];
            foreach ($request->file('multiple_images') as $image) {
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('images', $imageName, 'public');
                $multipleImages[] = 'images/' . $imageName;
            }
            $product->multiple_images = $multipleImages;
        }

        $product->save();

        // Handle prices and units
        if ($request->has('price') && $request->has('unit')) {
            $product->prices()->delete();
            foreach ($request->price as $index => $priceValue) {
                $price = new Price();
                $price->product_id = $product->id;
                $price->price = $priceValue;
                $price->unit = $request->unit[$index];
                $price->save();
            }
        }

        return redirect()->route('admin.product.index')->with('success', 'Product updated successfully!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = Product::findOrFail($id);
        $record->delete();
        return Response::json(['result' => 'success', 'message_type' => 'danger', 'message' => 'Deleted Data successfully!']);
    }
}
