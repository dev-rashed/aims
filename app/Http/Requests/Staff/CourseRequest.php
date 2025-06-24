<?php

namespace App\Http\Requests\Staff;

use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
        $title = $this->isMethod('POST') ? 'unique:courses,title' : 'unique:courses,title,'.$this->route('course')->id;

        return [
            'counsellor' => 'nullable|integer|exists:counsellors,id',
            'language' => 'nullable|integer|exists:languages,id',
            'type' => 'required|string|max:255|in:'.Course::TYPE_ONLINE.','.Course::TYPE_ADVANCED,
            'title' => 'required|string|max:255|'.$title,
            'short_description' => 'required|string',
            'description' => 'required|string',
            'duration' => 'required|string|max:255',
            'total_class' => 'required|integer',
            'price' => 'required|numeric',
            'tags' => 'nullable|string',
            'image' => $this->isMethod('POST') ? 'required' : 'nullable'.imageFileValidationRule(),
        ];
    }
}
