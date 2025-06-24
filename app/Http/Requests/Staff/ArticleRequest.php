<?php

namespace App\Http\Requests\Staff;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'counsellor' => 'nullable|integer|exists:counsellors,id',
            'categories' => 'required|array',
            'categories.*' => 'integer|exists:article_categories,id',
            'title' => 'required|string|max:255',
            'read_time' => 'nullable|string|max:25',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'tags' => 'nullable|string',
            'image' => $this->isMethod('POST') ? 'required' : 'nullable'.imageFileValidationRule(),
        ];
    }
}
