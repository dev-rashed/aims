<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Therapist;
use App\Models\TherapistDistance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DirectoryController extends Controller
{
    /**
     * Display a listing of the directory page
     */
    public function index(Request $request)
    {
        $therapists = self::getTherapist($request);

        if ($request->ajax()) {
            return view('frontend.directory.therapists', compact('therapists'));
        }

        $data['professions'] = DB::table('professions')->latest('id')->get();
        $data['sessions'] = DB::table('sessions')->latest('id')->get();
        $data['languages'] = DB::table('languages')->latest('id')->get();
        $data['accessibilities'] = DB::table('accessibilities')->latest('id')->get();
        $data['concessions'] = DB::table('concessions')->latest('id')->get();
        $data['formats'] = DB::table('formats')->latest('id')->get();

        return view('frontend.directory.index', compact('data', 'therapists'));
    }

    /**
     * Display a listing of the directory page
     */
    public function filter(Request $request)
    {
        $therapists = self::getTherapist($request);

        return view('frontend.directory.therapists', compact('therapists'));
    }

    /**
     * getTherapist
     */
    private static function getTherapist(Request $request)
    {
        session()->forget('location');
        $paginate = 10;
        $query = Therapist::query()->with('user:id,first_name,last_name,username,location,avatar', 'membershipPlan:id,name,slug');

        if ($request->has('professions') && count(array_filter($request->professions)) > 0) {
            $query->whereHas('professions', fn ($q) => $q->whereIn('slug', $request->professions));
        }
        if ($request->has('sessions') && count(array_filter($request->sessions)) > 0) {
            $query->whereHas('sessions', fn ($q) => $q->whereIn('slug', $request->sessions));
        }
        if ($request->has('languages') && count(array_filter($request->languages)) > 0) {
            $query->whereHas('languages', fn ($q) => $q->whereIn('slug', $request->languages));
        }
        if ($request->has('accessibilities') && count(array_filter($request->accessibilities)) > 0) {
            $query->whereHas('accessibilities', fn ($q) => $q->whereIn('slug', $request->accessibilities));
        }
        if ($request->has('concessions') && count(array_filter($request->concessions)) > 0) {
            $query->whereHas('concessions', fn ($q) => $q->whereIn('slug', $request->concessions));
        }
        if ($request->has('formats') && count(array_filter($request->formats)) > 0) {
            $query->whereHas('formats', fn ($q) => $q->whereIn('slug', $request->formats));
        }
        if (!empty($request->min_price) && !empty($request->max_price)) {
            $from = session()->get('currency')?->code;
            $min_price = convertAmount($request->min_price, false, $from, 'GBP');
            $max_price = convertAmount($request->max_price, false, $from, 'GBP');

            $query->whereBetween('fees', [$min_price, $max_price]);
        }

        $query->approved()->where('hide_profile', false);
        // $query->approved();

        if (! empty($request->location) && ! empty($request->distance)) {
            $location = getLocation($request->location);
            if (gettype($location) === 'object') {

                $latitude    = $location->lat;
                $longitude   = $location->lng;
                $earthRadius = 6371;
                $query->selectRaw("*, ($earthRadius * ACOS(
                        COS(RADIANS($latitude)) * COS(RADIANS('latitude_address')) *
                        COS(RADIANS('longitude_address') - RADIANS($longitude)) +
                        SIN(RADIANS($latitude)) * SIN(RADIANS('latitude_address'))
                    )) AS distance")
                    ->having('distance', '<=', $request->distance)
                    ->orderBy('distance');

                // $latitudeFrom = $location->lat;
                // $longitudeFrom = $location->lng;

                // $finalTherapistIds = [];
                // foreach ($query->get() as $therapist) {
                //     $latitudeTo = $therapist->latitude_address;
                //     $longitudeTo = $therapist->longitude_address;

                //     if ($latitudeTo != null && $longitudeTo != null) {
                //         // Calculate distance between latitude and longitude
                //         $theta = $longitudeFrom - $longitudeTo;
                //         $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) + cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
                //         $dist = acos($dist);
                //         $dist = rad2deg($dist);
                //         $miles = $dist * 60 * 1.1515;

                //         if ($request->has('distance') && ! empty($request->get('distance'))) {
                //             if ($miles <= $request->distance) {
                //                 self::createPostCodeTherapist($request->location, $therapist->id, $miles);
                //                 array_push($finalTherapistIds, $therapist->id);
                //             }
                //         } else {
                //             self::createPostCodeTherapist($request->location, $therapist->id, $miles);
                //             array_push($finalTherapistIds, $therapist->id);
                //         }
                //     }
                // }

                // $query = Therapist::with(['user', 'distances:location,therapist_id,distance'])
                //     ->whereIn('id', $finalTherapistIds)
                //     ->orderBy(
                //         TherapistDistance::select('distance')
                //             ->where('location', $request->location)
                //             ->whereColumn('therapists.id', 'therapist_distances.therapist_id')
                //             ->take(1)
                //     );
                // session()->put('location', $request->location);
            }
        }
        else {
            $query->latest('id');
        }

        return $query->paginate($paginate);
    }

    /**
     * Create Therapist Distance
     */
    private static function createPostCodeTherapist($location, $therapistId, $miles)
    {
        $distance = TherapistDistance::where('location', $location)->where('therapist_id', $therapistId)->first();
        if (! $distance) {
            TherapistDistance::create([
                'location' => $location,
                'therapist_id' => $therapistId,
                'distance' => round($miles, 2),
            ]);
        }

        return true;

        // return Therapist::with(['user', 'distances:post_code_id,therapist_id,distance'])
        //                 ->whereIn('id', $finalTherapistIds)
        //                 ->orderByRaw('(SELECT distance FROM post_code_therapists WHERE post_code_therapists.therapist_id = therapists.id)')
        //                 ->paginate(10);
    }
}
