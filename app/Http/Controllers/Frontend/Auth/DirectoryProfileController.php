<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\TherapistRequest;
use App\Models\OnlinePlatform;
use App\Models\Therapist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DirectoryProfileController extends Controller
{
    /**
     * index
     */
    public function index(Request $request)
    {
        $data['professions'] = DB::table('professions')->orderBy('name', 'DESC')->get(['id', 'name']);
        $data['languages'] = DB::table('languages')->orderBy('name', 'DESC')->get(['id', 'name']);
        $data['sessions'] = DB::table('sessions')->orderBy('name', 'DESC')->get(['id', 'name']);
        $data['accessibilities'] = DB::table('accessibilities')->orderBy('name', 'DESC')->get(['id', 'name']);
        $data['concessions'] = DB::table('concessions')->orderBy('name', 'DESC')->get(['id', 'name']);
        $data['formats'] = DB::table('formats')->orderBy('name', 'DESC')->get(['id', 'name']);
        $data['onlinePlatforms'] = DB::table('online_platforms')->orderBy('name', 'DESC')->get(['id', 'name']);
        $data['currencies'] = DB::table('currencies')->get();

        $therapist = $request->user()->therapist;

        return view('user.directory', compact('data', 'therapist'));
    }

    /**
     * update authenticated user practitioner profile
     */
    public function update(TherapistRequest $request)
    {
        $input = $request->all();
        $location = getLocation($request->location);
        $input['latitude_address'] = $location->lat;
        $input['longitude_address'] = $location->lng;

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
            $input['online_platforms'] = $online_platforms;
        }

        $therapist = Therapist::query()->where('practitioner_id', auth()->id())->first();

        if ($therapist?->live_profile) {
            $input['video'] = $request->hasFile('video') && $therapist->live_profile ? fileUpload($request->video, 'user/video', $therapist->video ?? null) : $therapist->video;
        } else {
            $input['video'] = null;
        }

        if ($request->hasFile('documents')) {
            $documents = [];
            if ($therapist && $therapist->documents != null) {
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

        if ($therapist) {
            $therapist->update($input);
        }
        else {
            $input['practitioner_id'] = auth()->id();
            $therapist = Therapist::query()->create($input);
        }

        $therapist->user->update([
            'location' => $request->location,
            'currency_id' => $request->currency,
        ]);

        $therapist->professions()->sync($request->input('professions'));
        $therapist->languages()->sync($request->input('languages'));
        $therapist->sessions()->sync($request->input('sessions'));
        $therapist->accessibilities()->sync($request->input('accessibilities'));
        $therapist->concessions()->sync($request->input('concessions'));
        $therapist->formats()->sync($request->input('formats'));

        return response()->json(['message' => translate('service_profile_updated')]);
    }
}
