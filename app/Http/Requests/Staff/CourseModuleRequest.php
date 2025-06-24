<?php

namespace App\Http\Requests\Staff;

use Illuminate\Foundation\Http\FormRequest;

class CourseModuleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'course' => 'required|integer|exists:courses,id',
            'modules' => 'required|array',
            'modules.*.title' => 'required|string|max:255',
            'modules.*.lectures' => 'required|array',
            'modules.*.lectures.*.title' => 'required|string|max:255',
            'modules.*.lectures.*.video_id' => 'required|string|max:255',
            'modules.*.lectures.*.duration' => 'required|integer',
        ];
    }
}
