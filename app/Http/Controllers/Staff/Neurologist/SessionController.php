<?php

namespace App\Http\Controllers\Staff\Neurologist;

use App\Http\Controllers\Controller;
use App\Models\Session;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('show_session');
        if (request()->ajax()) {
            $sessions = Session::query();

            return DataTables::eloquent($sessions)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.session.edit', $data->id), 'type' => 'edit', 'can' => 'edit_session'],
                        ['url' => route('staff.session.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_session'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.neurologist.session.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_session');

        return view('staff.neurologist.session.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create_session');
        $request->validate(['name' => 'required|string|max:255|unique:sessions']);
        Session::create([
            'name' => $request->name,
            'slug' => generateSlug($request->name),
        ]);

        return response()->json(['message' => translate('added_message', ['text' => 'session'])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Session $session)
    {
        $this->authorize('edit_session');

        return view('staff.neurologist.session.form', compact('session'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Session $session)
    {
        $this->authorize('edit_session');
        $request->validate(['name' => 'required|string|max:255|unique:sessions,name,'.$session->id]);
        $session->update([
            'name' => $request->name,
            'slug' => generateSlug($request->name),
        ]);

        return response()->json(['message' => translate('updated_message', ['text' => 'Session'])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Session $session)
    {
        $this->authorize('delete_session');
        $session->delete();

        return response()->json(['message' => translate('deleted_message', ['text' => 'Session'])]);
    }
}
