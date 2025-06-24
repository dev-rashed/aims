<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Mail\MembershipRenewMail;
use App\Models\MembershipPlan;
use App\Models\Renew;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use stdClass;
use Yajra\DataTables\Facades\DataTables;

class RenewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('show_renew');
        if ($request->ajax()) {
            $renews = Renew::query()->with('user:id,first_name,last_name', 'membership:id,name');

            return DataTables::eloquent($renews)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.renew.show', $data->id), 'type' => 'show', 'can' => 'show_membership'],
                        ['url' => route('staff.renew.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_membership'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.renew.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_renew');
        $data = new stdClass;
        $data->membershipPlans = MembershipPlan::query()->orderBy('name')->get();
        $data->users = User::query()->with('therapist:practitioner_id,membership_id,membership_type')->whereRelation('therapist', 'status', 'approved')->where('account_type', User::TYPE_PRACTITIONER)->orderBy('first_name')->get(['id', 'first_name', 'last_name']);

        return view('staff.renew.form', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create_renew');
        $membershipPlanId = DB::table('membership_plans')->where('id', $request->membership_plan)->value('id');

        $renew = Renew::create([
            'membership_id' => $membershipPlanId,
            'user_id' => $request->user,
            'type' => $request->type,
            'membership_type' => $request->membership_type,
            'note' => $request->note,
            'status' => true,
        ]);

        $renew->user->therapist->update([
            'membership_id' => $renew->membership?->id,
            'membership_type' => $renew->membership_type,
            'membership_expire' => $renew->membership_type == 'yearly' ? now()->addYear()->format('Y-m-d') : now()->addMonth()->format('Y-m-d'),
        ]);

        Mail::to($renew->user?->email)->send(new MembershipRenewMail($renew));

        if ($renew->type == 'cancel') {
            $renew->user()->delete();
        }

        return response()->json(['message' => 'Membership update successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Renew $renew)
    {
        $this->authorize('show_renew');

        $renew->update(['is_seen' => true]);

        $view = $request->ajax() ? 'staff.renew.ajax-show' : 'staff.renew.show';

        return view($view, compact('renew'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Renew $renew)
    {
        $this->authorize('edit_renew');
        if (! $renew->status) {
            $renew->user->therapist->update([
                'membership_id' => $renew->membership->id,
                // 'membership_start_date' => date('Y-m-d'),
                'membership_type' => $renew->membership_type,
                'membership_expire' => $renew->membership_type == 'yearly' ? now()->addYear()->format('Y-m-d') : now()->addMonth()->format('Y-m-d'),
            ]);

            Mail::to($renew->user?->email)->send(new MembershipRenewMail($renew));

            if ($renew->type == 'cancel') {
                $renew->user()->delete();
            }

            $renew->update(['status' => true]);
        }

        return response()->json(['message' => "Membership {$renew->type} successfully."]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Renew $renew)
    {
        $this->authorize('delete_renew');
        $renew->delete();

        return response()->json(['message' => translate('deleted_message', ['text' => 'Membership'])]);
    }
}
