<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\TherapistContactMail;
use App\Models\Therapist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NeurologistController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function bookmark($username)
    {
        $userId = User::where('username', $username)->practitioner()->firstOrFail()->id;
        $therapist = Therapist::where('practitioner_id', $userId)->approved()->first();

        if (! $therapist) {
            return response()->json(['message' => translate('something_wrong')], 300);
        }

        $bookmarks = session()->get('bookmarks') ?? [];

        $bookmarkId = array_search($therapist->id, $bookmarks);

        if ($bookmarkId) {
            unset($bookmarks[$bookmarkId]);
        }
        else {
            $bookmarks[] = $therapist->id;
        }

        session()->put('bookmarks', $bookmarks);

        return response()->json([
            'added' => $bookmarkId ? false : true,
            'bookmarks' => $bookmarks,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function details(Request $request, $username)
    {
        $user = User::query()->with('therapist', 'therapist.professions', 'therapist.languages', 'therapist.sessions', 'therapist.accessibilities', 'therapist.concessions')->where('username', $username)->practitioner()->firstOrFail();

        if (! $request->session()->has('visitor')) {
            $location = \Stevebauman\Location\Facades\Location::get($request->ip());
            $session_id = generateSlug();
            $request->session()->put('visitor', $session_id);

            $user->visitors()->updateOrCreate([
                'session_id' => $session_id,
                'ip_address' => $request->ip(),
                'country_name' => $location->countryName ?? null,
                'country_code' => $location->countryCode ?? null,
                'region_name' => $location->regionName ?? null,
                'city_name' => $location->cityName ?? null,
                'zip_code' => $location->zipCode ?? null,
                'latitude' => $location->latitude ?? null,
                'longitude' => $location->longitude ?? null,
            ]);
        }

        return view('frontend.neurologist.profile', compact('user'));
    }

    /**
     * bookmark store
     */
    public function bookmarkStore(Request $request)
    {
        session()->put('bookmarks', json_decode($request->bookmarks));

        return response()->json([
            'message' => 'Store bookmark successfully!'
        ]);
    }

    /**
     * bookmark page view
     */
    public function bookmarkData()
    {
        $therapistIds = session()->get('bookmarks') != null ? session()->get('bookmarks') : [];
        $therapists = Therapist::whereIn('id', $therapistIds)->get();

        return view('frontend.directory.bookmark', compact('therapists'));
    }

    /**
     * contact store
     */
    public function contactStore(Request $request)
    {
        $request->validate([
            'therapist' => 'required|string|exists:users,username',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $user = User::query()->where('username', $request->therapist)->first();

        Mail::to($user->therapist?->email ?? $user->email)->send(new TherapistContactMail($request, $user));
        Mail::to(config('mail.from.address'))->send(new TherapistContactMail($request, $user, true));

        return response()->json(['message' => 'Contact info sent successfully']);
    }
}
