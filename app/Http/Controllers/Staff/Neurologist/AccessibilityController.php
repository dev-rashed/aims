<?php

namespace App\Http\Controllers\Staff\Neurologist;

use App\Http\Controllers\Controller;
use App\Models\Accessibility;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AccessibilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('show_accessibility');
        if (request()->ajax()) {
            $accessibilites = Accessibility::query();

            return DataTables::eloquent($accessibilites)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.accessibility.edit', $data->id), 'type' => 'edit', 'can' => 'edit_accessibility'],
                        ['url' => route('staff.accessibility.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_accessibility'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.neurologist.accessibility.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_accessibility');

        return view('staff.neurologist.accessibility.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create_accessibility');
        $request->validate(['name' => 'required|string|max:255|unique:accessibilities']);
        Accessibility::create([
            'name' => $request->name,
            'slug' => generateSlug($request->name),
        ]);

        return response()->json(['message' => translate('added_message', ['text' => 'accessibility'])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Accessibility $accessibility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Accessibility $accessibility)
    {
        $this->authorize('edit_accessibility');

        return view('staff.neurologist.accessibility.form', compact('accessibility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Accessibility $accessibility)
    {
        $this->authorize('edit_accessibility');
        $request->validate(['name' => 'required|string|max:255|unique:accessibilities,name,'.$accessibility->id]);
        $accessibility->update([
            'name' => $request->name,
            'slug' => generateSlug($request->name),
        ]);

        return response()->json(['message' => translate('updated_message', ['text' => 'Accessibility'])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accessibility $accessibility)
    {
        $this->authorize('delete_accessibility');
        $accessibility->delete();

        return response()->json(['message' => translate('deleted_message', ['text' => 'Accessibility'])]);
    }
}
