<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\ServiceRequest;
use App\Models\Service;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('show_service');
        if (request()->ajax()) {
            $services = Service::query();

            return DataTables::eloquent($services)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.service.edit', $data->id), 'type' => 'edit', 'can' => 'edit_service'],
                        ['url' => route('staff.service.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_service'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.service.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_service');

        return view('staff.service.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        $this->authorize('create_service');
        $input = $request->validated();
        $input['image'] = fileUpload($request->image, 'service');
        service::create($input);

        return response()->json(['message' => translate('added_message', ['text' => 'service'])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $this->authorize('edit_service');

        return view('staff.service.form', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $this->authorize('edit_service');
        $input = $request->validated();
        if ($request->hasFile('image')) {
            $input['image'] = fileUpload($request->image, 'service', $service->image);
        }

        $service->update($input);

        return response()->json(['message' => translate('updated_message', ['text' => 'Service'])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $this->authorize('delete_service');
        deleteUploadedFile($service->image);
        $service->delete();

        return response()->json(['message' => translate('deleted_message', ['text' => 'Service'])]);
    }
}
