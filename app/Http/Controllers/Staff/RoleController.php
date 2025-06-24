<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\RoleRequest;
use App\Models\Module;
use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('show_role');
        if ($request->ajax()) {
            return DataTables::eloquent(Role::query())
                ->addIndexColumn()
                ->editColumn('permissions', function ($data) {
                    $permissions = json_decode($data->permissions);
                    return count($permissions ?? []);
                })
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.role.show', $data->id), 'type' => 'show', 'id' => false, 'can' => 'show_role'],
                        ['url' => route('staff.role.edit', $data->id), 'type' => 'edit', 'id' => false, 'can' => 'edit_role'],
                        ['url' => route('staff.role.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_role'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.role.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_role');
        $modules = Module::orderBy('name', 'ASC')->get();

        return view('staff.role.form', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $this->authorize('create_role');

        $input = $request->all();
        $input['slug'] = generateSlug($request->name);
        $input['permissions'] = json_encode($request->permissions);

        Role::create($input);

        return response()->json(['message' => translate('added_message', ['text' => 'role'])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $this->authorize('show_role');
        $modules = Module::orderBy('name', 'ASC')->get();

        return view('staff.role.show', compact('modules', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $this->authorize('edit_role');
        $modules = Module::orderBy('name', 'ASC')->get();

        return view('staff.role.form', compact('modules', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        $this->authorize('edit_role');

        $input = $request->all();
        $input['slug'] = generateSlug($request->name);
        $input['permissions'] = json_encode($request->permissions);

        $role->update($input);

        return response()->json(['message' => translate('updated_message', ['text' => 'Role'])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete_role');
        if ($role->deletable) {
            $role->delete();

            return response()->json(['message' => translate('deleted_message', ['text' => 'Role'])]);
        }

        return response()->json(['message' => translate('deleted_message', ['text' => 'Role'])], 300);
    }
}
