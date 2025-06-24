<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enroll;

class CourseController extends Controller
{
    /**
     * index
     */
    public function index()
    {
        $courseIds = Enroll::where('user_id', auth()->id())->pluck('course_id');
        $courses = Course::whereIn('id', $courseIds)->where('type', Course::TYPE_ONLINE)->get();

        return view('frontend.auth.course.index', compact('courses'));
    }

    /**
     * show
     */
    public function show($slug)
    {
        $course = Course::with('modules')->where('slug', $slug)->firstOrFail();

        return view('frontend.auth.course.show', compact('course'));
    }
}
