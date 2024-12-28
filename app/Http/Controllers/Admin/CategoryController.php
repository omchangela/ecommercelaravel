<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Variable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Validator;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    private $data = array(
        'route' => 'admin.category.',
        'title' => 'Category',
        'menu' => 'category',
        'submenu' => '',
    );

    public function __construct()
    {
        // $this->middleware('auth');
    }

    private function _validate($request, $id = null)
    {
        return Validator::make($request->all(), [
            'name' => 'required|max:255',
            'status' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image upload
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $records = Category::select('*');
            return DataTables::of($records)
                ->editColumn('created_at', function ($record) {
                    return $record->created_at->format(config('setting.DATETIME_FORMAT'));
                })
                ->editColumn('image', function ($record) {
                    return $record->image 
                        ? '<img src="' . asset('storage/' . $record->image) . '" width="100" alt="Image">' 
                        : 'No Image';
                })
                ->addColumn('status', function ($record) {
                    return html()->select('status', Variable::$status)->value($record['status'])
                        ->attributes(['data-id' => $record->id])
                        ->class(['update_field', 'form-select', 'form-select-sm', 
                            'text-success' => ($record['status'] == "Active"), 
                            'text-warning' => ($record['status'] == "Inactive")]);
                })
                ->addColumn('action', function ($record) {
                    return '<button data-url="' . route($this->data['route'] . 'show', $record->id) . '" class="btn btn-indigo btn-sm ajax_show" title="View" data-method="GET">View</button>' .
                        '&nbsp;<button data-url="' . route($this->data['route'] . 'edit', $record->id) . '" class="btn btn-teal btn-sm ajax_insert_update" title="Edit" data-method="GET">Edit</button>' .
                        '&nbsp;<button class="btn btn-danger btn-sm ajax_delete" data-id="' . $record->id . '" data-toggle="tooltip" data-original-title="Delete">Delete</button>';
                })
                ->rawColumns(['status', 'action', 'image'])
                ->make(true);
        }
        return view('admin.category.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $this->_validate($request);
        if ($validator->fails()) {
            return Response::json(['result' => '0', 'message' => $validator->errors()->first(), 'errors' => $validator->errors()], 403);
        }

        $inputs = $request->all();

        // Handle file upload
        if ($request->hasFile('image')) {
            $inputs['image'] = $request->file('image')->store('categories', 'public');
        }

        Category::create($inputs);

        return Response::json(['result' => '1', 'message_type' => 'success', 'message' => $this->data['title'] . ' inserted successfully.'], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['record'] = Category::findOrFail($id);
        return view('admin.category.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $record = Category::findOrFail($id);

        $validator = $this->_validate($request);
        if ($validator->fails()) {
            return Response::json(['result' => '0', 'message' => $validator->errors()->first(), 'errors' => $validator->errors()], 403);
        }

        $inputs = $request->all();

        // Handle file upload
        if ($request->hasFile('image')) {
            // Delete the old image
            if ($record->image && Storage::disk('public')->exists($record->image)) {
                Storage::disk('public')->delete($record->image);
            }

            // Store the new image
            $inputs['image'] = $request->file('image')->store('categories', 'public');
        }

        $record->update($inputs);

        return Response::json(['result' => '1', 'message_type' => 'info', 'message' => $this->data['title'] . ' updated successfully.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = Category::findOrFail($id);

        // Delete image file
        if ($record->image && Storage::disk('public')->exists($record->image)) {
            Storage::disk('public')->delete($record->image);
        }

        $record->delete();

        return Response::json(['result' => 'success', 'message_type' => 'danger', 'message' => 'Deleted Data successfully!']);
    }
}
