<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TermsAndConditions;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TermsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $terms = TermsAndConditions::query();
            return DataTables::of($terms)
                ->addColumn('action', function ($row) {
                    $editUrl = route('admin.terms.edit', $row->id);
                    $deleteUrl = route('admin.terms.destroy', $row->id);
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

        return view('admin.terms.index');
    }

    public function create()
    {
        return view('admin.terms.form'); 
    }

    public function edit($id)
    {
        $terms = TermsAndConditions::findOrFail($id);
        return view('admin.terms.form', compact('terms'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
        ]);

        $terms = TermsAndConditions::findOrFail($id);
        $terms->update(['description' => $request->description]);

        return redirect()->route('admin.terms.index')->with('success', 'Terms & Conditions updated successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
        ]);

        TermsAndConditions::create(['description' => $request->description]);

        return redirect()->route('admin.terms.index')->with('success', 'Terms & Conditions created successfully.');
    }

    public function destroy($id)
    {
        $terms = TermsAndConditions::findOrFail($id);
        $terms->delete();

        return redirect()->route('admin.terms.index')->with('success', 'Terms & Conditions deleted successfully.');
    }
}