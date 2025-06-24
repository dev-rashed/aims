<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\StaffRequest;
use App\Models\Role;
use App\Models\Staff;
use Yajra\DataTables\Facades\DataTables;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('show_staff');
        if (request()->ajax()) {
            return DataTables::eloquent(Staff::query()->with('role:id,name'))
                ->addIndexColumn()
                ->filter(fn ($query) => $query->where('deletable', true), true)
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.staff.show', $data->id), 'type' => 'show', 'id' => false, 'can' => 'show_staff'],
                        ['url' => route('staff.staff.edit', $data->id), 'type' => 'edit', 'id' => false, 'can' => 'edit_staff'],
                        ['url' => route('staff.staff.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_staff'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.staff.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_staff');
        $roles = Role::orderBy('name', 'ASC')->get();

        return view('staff.staff.form', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StaffRequest $request)
    {
        $this->authorize('create_staff');

        $input = $request->validated();
        $input['role_id'] = $request->role;
        $input['image'] = $request->hasFile('image') ? fileUpload($request->image, 'staff') : null;
        $input['password'] = bcrypt($request->password);

        Staff::create($input);

        return response()->json(['message' => translate('added_message', ['text' => 'staff'])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        $this->authorize('show_staff');
        $staff->load('role:id,name');

        return view('staff.staff.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        $this->authorize('edit_staff');
        $roles = Role::orderBy('name', 'ASC')->get();

        return view('staff.staff.form', compact('roles', 'staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StaffRequest $request, Staff $staff)
    {
        $this->authorize('edit_staff');

        $input = $request->validated();
        $input['role_id'] = $request->role;
        $input['image'] = $request->hasFile('image') ? fileUpload($request->image, 'staff', $staff->image) : $staff->image;

        $staff->update($input);

        return response()->json(['message' => translate('updated_message', ['text' => 'Staff'])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        $this->authorize('delete_staff');
        if ($staff->deletable) {
            $staff->delete();

            return response()->json(['message' => translate('deleted_message', ['text' => 'Staff'])]);
        }

        return response()->json(['message' => translate('deleted_message', ['text' => 'staff'])], 300);
    }
}
