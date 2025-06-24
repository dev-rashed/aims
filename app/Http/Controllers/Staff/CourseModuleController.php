<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\CourseModuleRequest;
use App\Models\Course;
use App\Models\CourseModule;
use Vimeo\Laravel\Facades\Vimeo;
use Yajra\DataTables\Facades\DataTables;

class CourseModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('show_course');
        if (request()->ajax()) {
            $modules = CourseModule::query()->with('course:id,title');

            return DataTables::eloquent($modules)
                ->addIndexColumn()
                ->editColumn('lectures', function ($data) {
                    return count(json_decode($data->lectures));
                })
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.course-module.show', $data->id), 'type' => 'show', 'id' => false, 'can' => 'show_course'],
                        ['url' => route('staff.course-module.edit', $data->id), 'type' => 'edit', 'id' => false, 'can' => 'edit_course'],
                        ['url' => route('staff.course-module.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_course'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.course-module.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_course');
        $courses = Course::latest()->get(['id', 'title']);

        return view('staff.course-module.form', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseModuleRequest $request)
    {
        $this->authorize('create_course');
        foreach ($request->modules as $module) {
            $lectures = [];
            foreach ($module['lectures'] as $lecture) {
                $lectures[] = [
                    'title' => $lecture['title'] ?? null,
                    'video_id' => $lecture['video_id'],
                    'duration' => $lecture['duration'],
                    'status' => isset($lecture['status']) ? true : false,
                ];
            }
            CourseModule::create([
                'course_id' => $request->course,
                'title' => $module['title'],
                'slug' => generateSlug($module['title']),
                'lectures' => json_encode($lectures),
            ]);
        }

        return response()->json(['message' => translate('added_message', ['text' => 'course module'])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseModule $courseModule)
    {
        $this->authorize('show_course');

        return view('staff.course-module.show', compact('courseModule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseModule $courseModule)
    {
        $this->authorize('edit_course');
        $courses = Course::latest()->get(['id', 'title']);

        return view('staff.course-module.form', compact('courses', 'courseModule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseModuleRequest $request, CourseModule $courseModule)
    {
        $this->authorize('edit_course');
        foreach ($request->modules as $module) {
            $lectures = [];
            foreach ($module['lectures'] as $lecture) {
                $lectures[] = [
                    'title' => $lecture['title'] ?? null,
                    'video_id' => $lecture['video_id'],
                    'duration' => $lecture['duration'],
                    'status' => isset($lecture['status']) ? true : false,
                ];
            }
            $courseModule->update([
                'course_id' => $request->course,
                'title' => $module['title'],
                'slug' => generateSlug($module['title']),
                'lectures' => json_encode($lectures),
            ]);
        }

        return response()->json(['message' => translate('updated_message', ['text' => 'Course module'])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseModule $courseModule)
    {
        $this->authorize('delete_course');
        $courseModule->delete();

        return response()->json(['message' => translate('updated_message', ['text' => 'Course module'])]);
    }

    /**
     * search vimeo video
     */
    public function searchVimeo()
    {
        $keyword = request()->has('keyword') ? request()->get('keyword') : '';
        if (! empty($keyword)) {
            $vimeo = Vimeo::request("/me/videos?query={$keyword}");

            return isset($vimeo['body']['data']) ? $vimeo['body']['data'] : [];
        }

        return [];
    }
}
