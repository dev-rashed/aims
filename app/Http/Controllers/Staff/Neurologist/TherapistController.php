<?php

namespace App\Http\Controllers\Staff\Neurologist;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\TherapistRequest;
use App\Http\Responses\TherapistCreateResponse;
use App\Models\OnlinePlatform;
use App\Models\Therapist;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TherapistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('show_therapist');
        if (request()->ajax()) {
            $therapists = Therapist::query()->with('user:id,first_name,last_name,email,phone,avatar', 'membershipPlan:id,name');

            return DataTables::eloquent($therapists)
                ->addIndexColumn()
                ->filter(fn ($query) => $query->approved(), true)
                ->addColumn('membership_expire', fn ($data) => formatDate($data->membership_expire))
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.therapist.show', $data->id), 'type' => 'show', 'id' => false, 'can' => 'show_therapist'],
                        ['url' => route('staff.therapist.edit', $data->id), 'type' => 'edit', 'id' => false, 'can' => 'edit_therapist'],
                        ['url' => route('staff.therapist.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_therapist'],
                    ]);
                })
                ->rawColumns(['action', 'payment_done'])
                ->toJson();
        }

        return view('staff.neurologist.therapist.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_therapist');

        return new TherapistCreateResponse();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TherapistRequest $request)
    {
        $input = $request->all();
        $input['username'] = generateSlug("$request->first_name $request->last_name");
        $input['account_type'] = User::TYPE_PRACTITIONER;
        $input['email_verified_at'] = now();
        $input['currency_id'] = $request->currency;

        $input['avatar'] = $request->hasFile('avatar') ? fileUpload($request->avatar, 'user') : null;
        $input['video'] = $request->hasFile('video') ? fileUpload($request->video, 'user/video') : null;
        $input['password'] = bcrypt($request->password);
        $input['hide_profile'] = $request->has('hide_profile');
        $input['live_profile'] = $request->has('live_profile');

        if ($request->hasFile('documents')) {
            $documents = [];
            foreach ($request->documents as $document) {
                $uploadedDoc = fileUpload($document, 'user/documents');
                array_push($documents, $uploadedDoc);
            }
            $input['documents'] = json_encode($documents);
        }

        if (User::where('username', $input['username'])->first()) {
            $input['username'] .= rand();
        }

        $user = User::create($input);

        if ($request->has('online_platforms') && ! empty($request->online_platforms)) {
            $online_platforms = [];
            foreach ($request->online_platforms as $key => $online_platform) {
                $platform = OnlinePlatform::find($online_platform);
                if ($platform) {
                    $online_platforms[$key] = [
                        'id' => $platform->id,
                        'name' => $platform->name,
                        'url' => $request->urls[$key],
                    ];
                }
            }
            $input['online_platforms'] = json_encode($online_platforms);
        }

        $input['approved'] = true;
        $input['registered'] = $request->has('registered');
        $input['status'] = $request->has('status') ? false : true;
        $location = getLocation($request->location);
        $input['latitude_address'] = $location->lat;
        $input['longitude_address'] = $location->lng;
        $input['is_seen'] = true;

        $therapist = $user->therapist()->create($input);

        $therapist->professions()->sync($request->input('professions'));
        $therapist->languages()->sync($request->input('languages'));
        $therapist->sessions()->sync($request->input('sessions'));
        $therapist->accessibilities()->sync($request->input('accessibilities'));
        $therapist->concessions()->sync($request->input('concessions'));
        $therapist->formats()->sync($request->input('formats'));

        return response()->json(['message' => translate('added_message', ['text' => 'therapist'])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Therapist $therapist)
    {
        $this->authorize('show_therapist');
        $therapist->load('user', 'professions', 'languages', 'sessions', 'accessibilities', 'concessions', 'formats');

        $therapist->update(['is_seen' => true]);

        return view('staff.neurologist.therapist.show', compact('therapist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Therapist $therapist)
    {
        $this->authorize('edit_therapist');

        $therapist->load('user', 'professions:id', 'languages:id', 'sessions:id', 'accessibilities:id', 'concessions:id', 'formats:id');

        $therapist->update(['is_seen' => true]);

        return new TherapistCreateResponse($therapist);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TherapistRequest $request, Therapist $therapist)
    {
        $this->authorize('edit_therapist');

        $therapist->load('user');

        $userInput = $request->only('first_name', 'last_name', 'email', 'location');
        $userInput['phone'] = $request->phone;
        $userInput['currency_id'] = $request->currency;
        $userInput['username'] = generateSlug("$request->first_name $request->last_name");
        if (User::where('id', '!=', $therapist->user->id)->where('username', $userInput['username'])->first()) {
            $userInput['username'] = $userInput['username'].rand();
        }

        $input = $request->all();

        $userInput['avatar'] = $request->hasFile('avatar') ? fileUpload($request->file('avatar'), 'user', $therapist->user?->avatar) : $therapist->user?->avatar;
        $input['video'] = $request->hasFile('video') ? fileUpload($request->file('video'), 'user/video', $therapist->video) : $therapist->video;

        if ($request->hasFile('documents')) {
            $documents = [];
            if (!empty($therapist->documents)) {
                foreach (json_decode($therapist->documents) as $decodedDoc) {
                    deleteUploadedFile($decodedDoc);
                }
            }
            foreach ($request->documents as $document) {
                $uploadedDoc = fileUpload($document, 'user/documents');
                array_push($documents, $uploadedDoc);
            }
            $input['documents'] = json_encode($documents);
        }
        else {
            $input['documents'] = $therapist->documents;
        }


        if (! empty($request->online_platforms)) {
            $online_platforms = [];
            foreach ($request->online_platforms as $key => $online_platform) {
                $platform = OnlinePlatform::find($online_platform);
                if ($platform) {
                    $online_platforms[$key] = [
                        'id' => $platform->id,
                        'name' => $platform->name,
                        'url' => $request->urls[$key],
                    ];
                }
            }
            $input['online_platforms'] = $online_platforms;
        }

        $location = getLocation($request->location);
        $input['latitude_address'] = $location?->lat;
        $input['longitude_address'] = $location?->lng;
        $input['registered'] = $request->has('registered');
        $input['hide_profile'] = $request->has('hide_profile');
        $input['live_profile'] = $request->has('live_profile');
        $input['phone'] = $request->phone;

        $therapist->update($input);
        $therapist->user()->update($userInput);

        $therapist->professions()->sync($request->input('professions'));
        $therapist->languages()->sync($request->input('languages'));
        $therapist->sessions()->sync($request->input('sessions'));
        $therapist->accessibilities()->sync($request->input('accessibilities'));
        $therapist->concessions()->sync($request->input('concessions'));
        $therapist->formats()->sync($request->input('formats'));

        return response()->json(['message' => translate('updated_message', ['text' => 'Therapist'])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Therapist $therapist)
    {
        $this->authorize('delete_therapist');
        deleteUploadedFile($therapist->user?->avatar);
        deleteUploadedFile($therapist->video);
        if ($therapist->documents !== null) {
            foreach (json_decode($therapist->documents) as $document) {
                deleteUploadedFile($document);
            }
        }

        $therapist->delete();
        $therapist->user?->delete();

        return response()->json(['message' => translate('deleted_message', ['text' => 'Therapist'])]);
    }

    /**
     * social
     */
    public function social()
    {
        $onlinePlatforms = OnlinePlatform::orderBy('name', 'DESC')->get(['id', 'name']);

        return response()->json($onlinePlatforms);
    }

    /**
     * application
     */
    public function application()
    {
        return view('staff.neurologist.therapist.application');
    }

    /**
     * application
     */
    public function hideProfile(Request $request)
    {

        Therapist::query()->find($request->id)->update([$request->type => $request->value]);

        return response()->json(1);
        // return response()->json(['message' => 'Display directory status updated successfully']);
    }
}
