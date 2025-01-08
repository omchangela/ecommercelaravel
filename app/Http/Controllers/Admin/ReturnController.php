<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReturnPolicy;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ReturnController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $returnpolicy = ReturnPolicy::query();
            return DataTables::of($returnpolicy)
                ->addColumn('action', function ($row) {
                    $editUrl = route('admin.returnpolicy.edit', $row->id);
                    $deleteUrl = route('admin.returnpolicy.destroy', $row->id);
                    return '
                        <a href="'.$editUrl.'" class="btn btn-sm btn-primary">Edit</a>
                        <form action="'.$deleteUrl.'" method="POST" style="display: inline-block;">
                            '.csrf_field().'
                            '.method_field('DELETE').'
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</button>
                        </form>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.returnpolicy.index');
    }

    public function create()
    {
        return view('admin.returnpolicy.form'); 
    }

    public function edit($id)
    {
        $returnpolicy = ReturnPolicy::findOrFail($id);
        return view('admin.returnpolicy.form', compact('returnpolicy'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
        ]);

        $returnpolicy = ReturnPolicy::findOrFail($id);
        $returnpolicy->update(['description' => $request->description]);

        return redirect()->route('admin.returnpolicy.index')->with('success', 'Return Policy updated successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
        ]);

        ReturnPolicy::create(['description' => $request->description]);

        return redirect()->route('admin.returnpolicy.index')->with('success', 'Return Policy created successfully.');
    }

    public function destroy($id)
    {
        $returnpolicy = ReturnPolicy::findOrFail($id);
        $returnpolicy->delete();

        return redirect()->route('admin.returnpolicy.index')->with('success', 'Return Policy deleted successfully.');
    }
}
