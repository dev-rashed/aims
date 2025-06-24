<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enroll;
use App\Models\Event;
use App\Models\Therapist;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data['cources'] = Course::count();
        $data['enrolls'] = Enroll::count();
        $data['therapists'] = Therapist::approved()->count();
        $data['events'] = Event::count();

        return view('staff.dashboard', compact('data'));
    }
}
