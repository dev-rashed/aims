<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\CourseRequest;
use App\Models\Counsellor;
use App\Models\Course;
use App\Models\Language;
use Yajra\DataTables\Facades\DataTables;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('show_course');
        if (request()->ajax()) {
            $courses = Course::query()->with('counsellor:id,first_name,last_name', 'language:id,name');

            return DataTables::eloquent($courses)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.course.show', $data->id), 'type' => 'show', 'id' => false, 'can' => 'show_course'],
                        ['url' => route('staff.course.edit', $data->id), 'type' => 'edit', 'id' => false, 'can' => 'edit_course'],
                        ['url' => route('staff.course.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_course'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.course.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_course');
        $data['counsellors'] = Counsellor::latest('id')->get(['id', 'first_name', 'last_name']);
        $data['languages'] = Language::orderBy('name', 'DESC')->get(['id', 'name']);
        $data['types'] = [Course::TYPE_ONLINE, Course::TYPE_ADVANCED];

        return view('staff.course.form', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        $input = $request->all();
        $input['counsellor_id'] = $request->counsellor;
        $input['language_id'] = $request->language;
        $input['slug'] = generateSlug($request->title);
        $input['image'] = fileUpload($request->image, 'course');

        Course::create($input);

        return response()->json(['message' => translate('added_message', ['text' => 'course'])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $this->authorize('show_course');

        return view('staff.course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $this->authorize('edit_course');
        $data['counsellors'] = Counsellor::latest('id')->get(['id', 'first_name', 'last_name']);
        $data['languages'] = Language::orderBy('name', 'DESC')->get(['id', 'name']);
        $data['types'] = [Course::TYPE_ONLINE, Course::TYPE_ADVANCED];

        return view('staff.course.form', compact('data', 'course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, Course $course)
    {
        $this->authorize('edit_course');
        $input = $request->all();
        $input['counsellor_id'] = $request->counsellor;
        $input['language_id'] = $request->language;
        $input['slug'] = generateSlug($request->title);
        if ($request->hasFile('image')) {
            $input['image'] = fileUpload($request->image, 'course', $course->image);
        }

        $course->update($input);

        return response()->json(['message' => translate('updated_message', ['text' => 'Course'])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $this->authorize('delete_course');
        deleteUploadedFile($course->image);
        $course->delete();

        return response()->json(['message' => translate('deleted_message', ['text' => 'Course'])]);
    }
}
