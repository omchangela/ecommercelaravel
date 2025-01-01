<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Demo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;
use Yajra\DataTables\DataTables;

class DemoajaxController extends Controller
{
    private $data = array(
        'route' => 'admin.demoajax.',
        'title' => 'Demo',
        'menu' => 'demoajax',
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
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //        $this->data['records'] = Demo::all();
        if ($request->ajax()) {
            $records = Demo::select('*');
            return DataTables::of($records)
                ->editColumn('created_at', function ($record) {
                    return $record->created_at->format(config('setting.DATETIME_FORMAT'));
                })
                //                ->editColumn('image', function ($record) {
                //                    return '<img src="' . $record['image_url'] . '" width="100"> ';
                //                })
                ->addColumn('status', function ($record) {
                    return html()->select('status', \App\Models\Variable::$status)->value($record['status'])->attributes(['data-id' => $record->id])
                        ->class(['update_field', 'form-select', 'form-select-sm', 'text-success' => ($record['status'] == "Active"), 'text-warning' => ($record['status'] == "Inactive")]);
                })
                ->addColumn('action', function ($record) {
                    return '<button data-url="' . route($this->data['route'] . 'show', $record->id) . '" class="btn btn-indigo btn-sm ajax_show" title="View" data-method="GET">View</button>' .
                        '&nbsp;<button data-url="' . route($this->data['route'] . 'edit', $record->id) . '" class="btn btn-teal btn-sm ajax_insert_update" title="Edit"  data-method="GET" >Edit</button>' .
                        '&nbsp;<button class="btn btn-danger btn-sm ajax_delete " data-id="' . $record->id . '" data-toggle="tooltip" data-original-title="Delete">Delete</button>';
                })
                ->rawColumns(['status', 'action', 'image'])
                ->make(true);
        }
        return view('admin.demoajax.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.demoajax.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $this->_validate($request);
        if ($validator->fails()) {
            $response['result'] = '0';
            $response['message'] = $errors = $validator->errors()->first();
            $response['errors'] = $errors = $validator->errors();
            return Response::json($response, 403);
        }
        Demo::create($request->all());

        $response['result'] = '1';
        $response['message_type'] = 'success';
        $response['message'] = $this->data['title'] . ' inserted successfully.';
        return Response::json($response, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['record'] = Demo::findOrFail($id);
        return view('admin.demoajax.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['record'] = Demo::findOrFail($id);
        return view('admin.demoajax.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $record = Demo::findOrFail($id);
        /* Change Status Block */
        if ($request->ajax()  && !empty($request['quick_update'])) {
            $record->update($request->only(['status']));
            return \Illuminate\Support\Facades\Response::json(['result' => 'success', 'message_type' => 'info', 'message' => 'Record updated successfully!']);
        }

        $validator = $this->_validate($request);
        if ($validator->fails()) {
            $response['result'] = '0';
            $response['message'] = $errors = $validator->errors()->first();
            $response['errors'] = $errors = $validator->errors();
            return Response::json($response, 403);
        }

        $inputs = $request->all();
        //        $inputs['image'] = $this->uploadFile($request, $record, 'image', 'brand');
        //        if (empty($inputs['image'])) {
        //            unset($inputs['image']);
        //        }
        $record->update($inputs);

        $response['result'] = '1';
        $response['message_type'] = 'info';
        $response['message'] = $this->data['title'] . ' updated successfully.';
        return Response::json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = Demo::findOrFail($id);
        $record->delete();
        return \Illuminate\Support\Facades\Response::json(['result' => 'success', 'message_type' => 'danger', 'message' => 'Deleted Data successfully!']);
    }
}
