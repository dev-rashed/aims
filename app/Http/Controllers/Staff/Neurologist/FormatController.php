<?php

namespace App\Http\Controllers\Staff\Neurologist;

use App\Http\Controllers\Controller;
use App\Models\Format;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FormatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('show_format');
        if (request()->ajax()) {
            return DataTables::eloquent(Format::query())
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.format.edit', $data->id), 'type' => 'edit', 'can' => 'edit_format'],
                        ['url' => route('staff.format.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_format'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.neurologist.format.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_format');

        return view('staff.neurologist.format.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create_format');
        $request->validate(['name' => 'required|string|max:255|unique:formats']);
        Format::create([
            'name' => $request->name,
            'slug' => generateSlug($request->name),
        ]);

        return response()->json(['message' => translate('added_message', ['text' => 'format'])]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Format $format)
    {
        $this->authorize('edit_format');

        return view('staff.neurologist.format.form', compact('format'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Format $format)
    {
        $this->authorize('edit_format');
        $request->validate(['name' => 'required|string|max:255|unique:formats,name,'.$format->id]);
        $format->update([
            'name' => $request->name,
            'slug' => generateSlug($request->name),
        ]);

        return response()->json(['message' => translate('updated_message', ['text' => 'format'])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Format $format)
    {
        $this->authorize('delete_format');
        $format->delete();

        return response()->json(['message' => translate('deleted_message', ['text' => 'format'])]);
    }
}
