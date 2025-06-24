<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\MembershipPlanRequest;
use App\Models\MembershipPlan;
use Yajra\DataTables\Facades\DataTables;

class MembershipPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('show_membership_plan');
        if (request()->ajax()) {
            $plans = MembershipPlan::query();

            return DataTables::eloquent($plans)
                ->addIndexColumn()
                ->editColumn('features', function ($data) {
                    return json_decode($data->features);
                })
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.membership-plan.show', $data->id), 'type' => 'show', 'can' => 'show_membership_plan'],
                        ['url' => route('staff.membership-plan.edit', $data->id), 'type' => 'edit', 'can' => 'edit_membership_plan'],
                        ['url' => route('staff.membership-plan.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_membership_plan'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.membership.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_membership_plan');

        return view('staff.membership.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MembershipPlanRequest $request)
    {
        $input = $request->all();
        $input['slug'] = generateSlug($request->name);
        MembershipPlan::create($input);

        return response()->json(['message' => translate('added_message', ['text' => 'membership plan'])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(MembershipPlan $membershipPlan)
    {
        $this->authorize('show_membership_plan');

        return view('staff.membership.show', compact('membershipPlan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MembershipPlan $membershipPlan)
    {
        $this->authorize('create_membership_plan');

        return view('staff.membership.form', compact('membershipPlan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MembershipPlanRequest $request, MembershipPlan $membershipPlan)
    {
        $input = $request->all();
        $input['slug'] = generateSlug($request->name);
        $membershipPlan->update($input);

        return response()->json(['message' => translate('updated_message', ['text' => 'Membership plan'])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MembershipPlan $membershipPlan)
    {
        $this->authorize('delete_membership_plan');
        $membershipPlan->delete();

        return response()->json(['message' => translate('deleted_message', ['text' => 'Membership plan'])]);
    }
}
