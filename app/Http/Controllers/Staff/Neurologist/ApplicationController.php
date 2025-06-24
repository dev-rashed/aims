<?php

namespace App\Http\Controllers\Staff\Neurologist;

use App\Http\Controllers\Controller;
use App\Http\Responses\TherapistCreateResponse;
use App\Mail\ApprovedMail;
use App\Models\Therapist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('show_new_application');
        if (request()->ajax()) {
            $therapists = Therapist::query()->has('user')->with('user:id,first_name,last_name,email,phone,avatar', 'membershipPlan:id,name');

            return DataTables::eloquent($therapists)
                ->addIndexColumn()
                ->filter(fn ($query) => $query->whereNot('status', 'approved'), true)
                ->addColumn('membership_expire', fn ($data) => formatDate($data->membership_expire))
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.application.create', ['id' => $data->id]), 'type' => 'approved', 'can' => 'show_therapist'],
                        ['url' => route('staff.application.edit', $data->id), 'type' => 'edit', 'id' => false, 'can' => 'edit_therapist'],
                        ['url' => route('staff.application.show', $data->id), 'type' => 'show', 'id' => false, 'can' => 'show_therapist'],
                        ['url' => route('staff.application.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_therapist'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.neurologist.application.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('edit_new_application');

        $therapist = Therapist::where('id', request()->get('id'))->firstOrFail();
        $plans = DB::table('membership_plans')->get();

        return view('staff.neurologist.application.form', compact('therapist', 'plans'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $this->authorize('show_new_application');
        $therapist = Therapist::with('user', 'professions', 'languages', 'sessions', 'accessibilities', 'concessions')->where('id', $id)->firstOrFail();

        $therapist->update(['is_seen' => true]);

        return view('staff.neurologist.application.show', compact('therapist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->authorize('edit_new_application');

        $therapist = Therapist::query()->with('user', 'professions', 'languages', 'sessions', 'accessibilities', 'concessions')->where('id', $id)->firstOrFail();

        $therapist->update(['is_seen' => true]);
        
        return new TherapistCreateResponse($therapist);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->authorize('edit_new_application');
        $therapist = Therapist::query()->with('user:id,first_name,last_name,email,username')->where('id', $id)->firstOrFail(['id', 'practitioner_id', 'status', 'membership_type']);

        if ($request->status != $therapist->status) {
            $data = [
                'status' => $request->status,
                'member_id' => rand(111111111, 999999999),
                'membership_start_date' => date('Y-m-d'),
                'membership_id'   => $request->membership_id,
                'membership_type' => $request->membership_type,
                'membership_expire' => $request->status == 'approved' ? now()->addYear()->format('Y-m-d') : null
            ];

            $therapist->update($data);

            Mail::to($therapist->user?->email)->send(new ApprovedMail($therapist));
        }

        return response()->json(['message' => translate('updated_message', ['text' => 'Application status'])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('delete_new_application');
        $therapist = Therapist::where('id', $id)->firstOrFail();
        deleteUploadedFile($therapist->user?->avatar);
        deleteUploadedFile($therapist->video);
        if ($therapist->documents != null) {
            foreach (json_decode($therapist->documents) as $document) {
                deleteUploadedFile($document);
            }
        }

        $therapist->user?->delete();
        $therapist->delete();

        return response()->json(['message' => translate('deleted_message', ['text' => 'New application'])]);
    }
}
