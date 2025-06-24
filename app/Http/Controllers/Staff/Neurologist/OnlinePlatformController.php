<?php

namespace App\Http\Controllers\Staff\Neurologist;

use App\Http\Controllers\Controller;
use App\Models\OnlinePlatform;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OnlinePlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('show_online_platform');
        if (request()->ajax()) {
            $onlinePlatforms = OnlinePlatform::query();

            return DataTables::eloquent($onlinePlatforms)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.online-platform.edit', $data->id), 'type' => 'edit', 'can' => 'edit_online_platform'],
                        ['url' => route('staff.online-platform.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_online_platform'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.neurologist.online-platform.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_online_platform');

        return view('staff.neurologist.online-platform.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create_online_platform');
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,png,gif,jpeg,svg,webp|max:512',
        ]);

        OnlinePlatform::create([
            'name' => $request->name,
            'image' => fileUpload($request->image, 'social'),
        ]);

        return response()->json(['message' => translate('added_message', ['text' => 'online platform'])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(OnlinePlatform $onlinePlatform)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OnlinePlatform $onlinePlatform)
    {
        $this->authorize('edit_online_platform');

        return view('staff.neurologist.online-platform.form', compact('onlinePlatform'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OnlinePlatform $onlinePlatform)
    {
        $this->authorize('edit_online_platform');
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,gif,jpeg,svg,webp|max:512',
        ]);

        if ($request->file('image')) {
            $image = fileUpload($request->image, 'social', $onlinePlatform->image);
        }

        $onlinePlatform->update([
            'name' => $request->name,
            'image' => $image ?? $onlinePlatform->image,
        ]);

        return response()->json(['message' => translate('updated_message', ['text' => 'Online platform'])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OnlinePlatform $onlinePlatform)
    {
        $this->authorize('delete_online_platform');
        deleteUploadedFile($onlinePlatform->image);
        $onlinePlatform->delete();

        return response()->json(['message' => translate('deleted_message', ['text' => 'Online platform'])]);
    }
}
