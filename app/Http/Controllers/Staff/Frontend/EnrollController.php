<?php

namespace App\Http\Controllers\Staff\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Enroll;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('show_enroll');
        if (request()->ajax()) {
            $enrolls = Enroll::query()->with('user:id,first_name,last_name', 'payment:id,relation_id,subtotal,discount,total', 'course:id,title');

            return DataTables::eloquent($enrolls)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.enroll.show', $data->id), 'type' => 'show', 'id' => false, 'can' => 'show_enroll'],
                        ['url' => route('staff.enroll.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_enroll'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.frontend.enroll.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Enroll $enroll)
    {
        $enroll->load('user', 'course', 'payment');

        $enroll->update(['is_seen' => true]);

        return view('staff.frontend.enroll.show', compact('enroll'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enroll $enroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enroll $enroll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enroll $enroll)
    {
        $this->authorize('delete_enroll');
        $enroll->delete();

        return response()->json(['message' => translate('deleted_message', ['text' => 'Enroll'])]);
    }
}
