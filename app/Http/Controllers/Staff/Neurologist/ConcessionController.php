<?php

namespace App\Http\Controllers\Staff\Neurologist;

use App\Http\Controllers\Controller;
use App\Models\Concession;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ConcessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('show_concession');
        if (request()->ajax()) {
            $concessions = Concession::query();

            return DataTables::eloquent($concessions)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.concession.edit', $data->id), 'type' => 'edit', 'can' => 'edit_concession'],
                        ['url' => route('staff.concession.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_concession'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.neurologist.concession.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_concession');

        return view('staff.neurologist.concession.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create_concession');
        $request->validate(['name' => 'required|string|max:255|unique:concessions']);
        Concession::create([
            'name' => $request->name,
            'slug' => generateSlug($request->name),
        ]);

        return response()->json(['message' => translate('added_message', ['text' => 'concession'])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Concession $concession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Concession $concession)
    {
        $this->authorize('edit_concession');

        return view('staff.neurologist.concession.form', compact('concession'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Concession $concession)
    {
        $this->authorize('edit_concession');
        $request->validate(['name' => 'required|string|max:255|unique:concessions,name,'.$concession->id]);
        $concession->update([
            'name' => $request->name,
            'slug' => generateSlug($request->name),
        ]);

        return response()->json(['message' => translate('updated_message', ['text' => 'Concession'])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Concession $concession)
    {
        $this->authorize('delete_concession');
        $concession->delete();

        return response()->json(['message' => translate('deleted_message', ['text' => 'Concession'])]);
    }
}
