<?php

namespace App\Http\Controllers\Staff\Neurologist;

use App\Http\Controllers\Controller;
use App\Models\Profession;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('show_profession');
        if (request()->ajax()) {
            $professions = Profession::query();

            return DataTables::eloquent($professions)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.profession.edit', $data->id), 'type' => 'edit', 'can' => 'edit_profession'],
                        ['url' => route('staff.profession.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_profession'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.neurologist.profession.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_profession');

        return view('staff.neurologist.profession.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create_profession');
        $request->validate(['name' => 'required|string|max:255|unique:professions']);
        Profession::create([
            'name' => $request->name,
            'slug' => generateSlug($request->name),
        ]);

        return response()->json(['message' => translate('added_message', ['text' => 'profession'])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profession $profession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profession $profession)
    {
        $this->authorize('edit_profession');

        return view('staff.neurologist.profession.form', compact('profession'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profession $profession)
    {
        $this->authorize('edit_profession');
        $request->validate(['name' => 'required|string|max:255|unique:professions,name,'.$profession->id]);
        $profession->update([
            'name' => $request->name,
            'slug' => generateSlug($request->name),
        ]);

        return response()->json(['message' => translate('updated_message', ['text' => 'Profession'])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profession $profession)
    {
        $this->authorize('delete_profession');
        $profession->delete();

        return response()->json(['message' => translate('deleted_message', ['text' => 'Profession'])]);
    }
}
