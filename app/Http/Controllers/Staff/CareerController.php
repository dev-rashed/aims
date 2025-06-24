<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Yajra\DataTables\Facades\DataTables;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('show_career');
        if (request()->ajax()) {
            $careers = Career::query();

            return DataTables::eloquent($careers)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.career.show', $data->id), 'type' => 'show', 'can' => 'show_career'],
                        ['url' => route('staff.career.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_career'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.career.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Career $career)
    {
        $this->authorize('show_career');

        return view('staff.career.show', compact('career'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Career $career)
    {
        $this->authorize('delete_career');
        $career->delete();

        return response()->json(['message' => translate('deleted_message', ['text' => 'Career'])]);
    }
}
