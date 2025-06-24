<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\EventRequest;
use App\Models\Counsellor;
use App\Models\Event;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('show_event');
        if ($request->ajax()) {
            $events = Event::query()->with('counsellor:id,first_name,last_name');

            return DataTables::eloquent($events)
                ->addIndexColumn()
                ->editColumn('date', fn ($data) => formatDate($data->date))
                ->editColumn('time', fn ($data) => date('H:i', strtotime($data->time)))
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.event.show', $data->id), 'type' => 'show', 'id' => false, 'can' => 'show_event'],
                        ['url' => route('staff.event.edit', $data->id), 'type' => 'edit', 'id' => false, 'can' => 'edit_event'],
                        ['url' => route('staff.event.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_event'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.event.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_event');
        $data['counsellors'] = Counsellor::latest('id')->get(['id', 'first_name', 'last_name']);

        return view('staff.event.form', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        $input = $request->all();
        $input['counsellor_id'] = $request->counsellor;
        $input['slug'] = generateSlug($request->title);
        $input['image'] = fileUpload($request->image, 'event');

        Event::create($input);

        return response()->json(['message' => translate('added_message', ['text' => 'event'])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $this->authorize('show_event');

        return view('staff.event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $this->authorize('edit_event');
        $data['counsellors'] = Counsellor::latest('id')->get(['id', 'first_name', 'last_name']);

        return view('staff.event.form', compact('data', 'event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, Event $event)
    {
        $this->authorize('edit_event');
        $input = $request->all();
        $input['counsellor_id'] = $request->counsellor;
        $input['slug'] = generateSlug($request->title);
        if ($request->hasFile('image')) {
            $input['image'] = fileUpload($request->image, 'Event', $event->image);
        }

        $event->update($input);

        return response()->json(['message' => translate('updated_message', ['text' => 'Event'])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $this->authorize('delete_event');
        deleteUploadedFile($event->image);
        $event->delete();

        return response()->json(['message' => translate('deleted_message', ['text' => 'Event'])]);
    }
}
