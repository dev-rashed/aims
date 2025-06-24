<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\CounsellorRequest;
use App\Models\Counsellor;
use Yajra\DataTables\Facades\DataTables;

class CounsellorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('show_counsellor');
        if (request()->ajax()) {
            $counsellors = Counsellor::query();

            return DataTables::eloquent($counsellors)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.counsellor.edit', $data->id), 'type' => 'edit', 'can' => 'edit_counsellor'],
                        ['url' => route('staff.counsellor.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_counsellor'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.counsellor.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_counsellor');

        return view('staff.counsellor.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CounsellorRequest $request)
    {
        $input = $request->all();
        $input['image'] = $request->hasFile('image') ? fileUpload($request->file('image'), 'counsellor') : null;

        Counsellor::create($input);

        return response()->json(['message' => translate('added_message', ['text' => 'contributor'])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Counsellor $counsellor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Counsellor $counsellor)
    {
        $this->authorize('edit_counsellor');

        return view('staff.counsellor.form', compact('counsellor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CounsellorRequest $request, Counsellor $counsellor)
    {
        $this->authorize('edit_counsellor');
        $input = $request->all();
        $input['image'] = $request->hasFile('image') ? fileUpload($request->file('image'), 'counsellor', $counsellor->image) : $counsellor->image;

        $counsellor->update($input);

        return response()->json(['message' => translate('updated_message', ['text' => 'Contributor'])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Counsellor $counsellor)
    {
        $this->authorize('delete_counsellor');
        deleteUploadedFile($counsellor->image);
        $counsellor->delete();

        return response()->json(['message' => translate('deleted_message', ['text' => 'Contributor'])]);
    }
}
