<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\CertificateRequest;
use App\Models\Certificate;
use App\Models\Therapist;
use Yajra\DataTables\Facades\DataTables;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('show_certificate');
        if (request()->ajax()) {
            $certificates = Certificate::query()->with('therapist:id,practitioner_id', 'therapist.user:id,first_name,last_name');

            return DataTables::eloquent($certificates)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.certificate.edit', $data->id), 'type' => 'edit', 'id' => false, 'can' => 'edit_certificate'],
                        ['url' => route('staff.certificate.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_certificate'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.certificate.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_certificate');
        $data['therapists'] = Therapist::with('user:id,first_name,last_name')->approved()->latest('id')->get(['id', 'practitioner_id']);

        return view('staff.certificate.form', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CertificateRequest $request)
    {
        if (Certificate::where('therapist_id', $request->therapist)->first()) {
            return response()->json(['message' => translate('certificate_exists')], 300);
        }
        Certificate::create([
            'therapist_id' => $request->therapist,
            'image' => fileUpload($request->image, 'certificate'),
            'logo' => fileUpload($request->logo, 'certificate'),
        ]);

        return response()->json(['message' => translate('added_message', ['text' => 'certificate'])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        $this->authorize('edit_certificate');
        $data['therapists'] = Therapist::with('user:id,first_name,last_name')->approved()->latest('id')->get(['id', 'practitioner_id']);

        return view('staff.certificate.form', compact('data', 'certificate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CertificateRequest $request, Certificate $certificate)
    {
        $this->authorize('edit_certificate');

        $image = $request->hasFile('image') ? fileUpload($request->image, 'certificate', $certificate->image) : $certificate->image;
        $logo = $request->hasFile('logo') ? fileUpload($request->logo, 'certificate', $certificate->logo) : $certificate->logo;

        $certificate->update([
            'therapist_id' => $request->therapist,
            'image' => $image,
            'logo' => $logo,
        ]);

        return response()->json(['message' => translate('updated_message', ['text' => 'Certificate'])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        $this->authorize('delete_certificate');
        deleteUploadedFile($certificate->image);
        deleteUploadedFile($certificate->logo);
        $certificate->delete();

        return response()->json(['message' => translate('deleted_message', ['text' => 'Certificate'])]);
    }
}
