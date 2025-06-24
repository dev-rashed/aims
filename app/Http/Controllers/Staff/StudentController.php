<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\StudentRequest;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    public $student;

    /**
     * Assign a new student to the specified user
     */
    public function __construct()
    {
        $this->student = User::query();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('show_student');
        if (request()->ajax()) {
            return DataTables::eloquent($this->student)
                ->addIndexColumn()
                ->filter(fn ($query) => $query->where('account_type', User::TYPE_USER), true)
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.student.edit', $data->id), 'type' => 'edit', 'id' => false, 'can' => 'edit_student'],
                        ['url' => route('staff.student.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_student'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.student.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.student.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        $input = $request->all();
        $input['username'] = generateSlug("$request->first_name $request->last_name");
        $input['account_type'] = User::TYPE_USER;
        $input['email_verified_at'] = now();
        $input['avatar'] = fileUpload($request->avatar, 'user');
        $input['password'] = bcrypt($request->password);

        if (User::where('username', $input['username'])->exists()) {
            $input['username'] .= rand();
        }
        $this->student->create($input);

        return response()->json(['message' => translate('added_message', ['text' => 'student'])]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = $this->student->findOrFail($id);

        return view('staff.student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = $this->student->findOrFail($id);

        return view('staff.student.form', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, $id)
    {
        $student = $this->student->findOrFail($id);
        $input = $request->all();
        $input['username'] = generateSlug("$request->first_name $request->last_name");
        $input['avatar'] = $request->hasFile('avatar') ? fileUpload($request->avatar, 'user', $student->avatar) : $student->avatar;

        if (User::where('username', $input['username'])->exists()) {
            $input['username'] .= rand();
        }
        $student->update($input);

        return response()->json(['message' => translate('updated_message', ['text' => 'Student'])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('delete_therapist');
        $student = $this->student->findOrFail($id);
        deleteUploadedFile($student->avatar);
        $student->delete();

        return response()->json(['message' => translate('deleted_message', ['text' => 'Student'])]);
    }
}
