<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Privacy;
use Yajra\DataTables\DataTables;

class PrivacyController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $privacy = Privacy::query();
            return DataTables::of($privacy)
                ->addColumn('action', function ($row) {
                    $editUrl = route('admin.privacy.edit', $row->id);
                    $deleteUrl = route('admin.privacy.destroy', $row->id);
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

        return view('admin.privacy.index');
    }

    public function create()
    {
        return view('admin.privacy.form'); 
    }

    public function edit($id)
    {
        $privacy = Privacy::findOrFail($id);
        return view('admin.privacy.form', compact('privacy'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
        ]);

        $privacy = Privacy::findOrFail($id);
        $privacy->update(['description' => $request->description]);

        return redirect()->route('admin.privacy.index')->with('success', 'privacy & Conditions updated successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
        ]);

        Privacy::create(['description' => $request->description]);

        return redirect()->route('admin.privacy.index')->with('success', 'privacy & Conditions created successfully.');
    }

    public function destroy($id)
    {
        $privacy = Privacy::findOrFail($id);
        $privacy->delete();

        return redirect()->route('admin.privacy.index')->with('success', 'privacy & Conditions deleted successfully.');
    }
}
