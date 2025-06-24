<?php

namespace App\Http\Responses;

use App\Models\Therapist;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;

class TherapistCreateResponse implements Responsable
{
    public function __construct(private ?Therapist $therapist = null)
    {
    }

    public function toResponse($request)
    {
        $data['professions'] = DB::table('professions')->orderBy('name', 'DESC')->get(['id', 'name']);
        $data['languages'] = DB::table('languages')->orderBy('name', 'DESC')->get(['id', 'name']);
        $data['sessions'] = DB::table('sessions')->orderBy('name', 'DESC')->get(['id', 'name']);
        $data['accessibilities'] = DB::table('accessibilities')->orderBy('name', 'DESC')->get(['id', 'name']);
        $data['concessions'] = DB::table('concessions')->orderBy('name', 'DESC')->get(['id', 'name']);
        $data['formats'] = DB::table('formats')->orderBy('name', 'DESC')->get(['id', 'name']);
        $data['onlinePlatforms'] = DB::table('online_platforms')->orderBy('name', 'DESC')->get(['id', 'name']);
        $data['currencies'] = DB::table('currencies')->get();

        return view('staff.neurologist.therapist.form', [
            'data' => $data,
            'therapist' => $this->therapist,
        ]);
    }
}
