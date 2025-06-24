<?php

namespace App\Http\Requests\Frontend;

use App\Models\User;
use App\Rules\LocationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Propaganistas\LaravelPhone\Rules\Phone;

class TherapistRequest extends FormRequest
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
        $location = $this->filled('location') ? getLocation($this->input('location'), true) : null;
        $countryCode = $location->countryCode ?? 'GB';

        return [
            'email' => ['required','string','max:255', Rule::unique(User::class)->ignore(auth()->id())],
            'phone' => ['required','string','max:25', (new Phone)->countryField($countryCode), Rule::unique(User::class)->ignore(auth()->id())],
            'degree' => 'required|string|max:255',
            'location' => ['required', new LocationRule()],
            'website' => 'nullable|string',
            'fees' => 'required|numeric|max:255',
            'currency' => 'required|integer|exists:currencies,id',
            'short_description' => 'required|string',
            'key_details' => 'required|string|max:255',
            'professions' => 'required|array',
            'professions.*' => 'integer|exists:professions,id',
            'languages' => 'required|array',
            'languages.*' => 'integer|exists:languages,id',
            'sessions' => 'required|array',
            'sessions.*' => 'integer|exists:sessions,id',
            'accessibilities' => 'nullable|array',
            'accessibilities.*' => 'integer|exists:accessibilities,id',
            'concessions' => 'nullable|array',
            'concessions.*' => 'integer|exists:concessions,id',
            'formats' => 'nullable|array',
            'formats.*' => 'integer|exists:formats,id',
            'online_platforms' => 'nullable|array',
            'online_platforms.*' => 'integer|exists:online_platforms,id',
            'urls' => 'nullable|array',
            'urls.*' => 'string',
            'about' => 'required|string',
            'experience' => 'required|string',
            'health_insurance_providers' => 'nullable|string',
            'availability' => 'nullable|string',
            'further_information' => 'nullable|string',
            'tags' => 'nullable|string',

            'documents' => 'nullable|array',
            'documents.*' => 'file|mimes:pdf,xlxs,docx,csv,xml,xls|max:6144',
            'video' => 'nullable|file|mimes:mp4,mov,ogg,flv,avi,wmv|max:10240',
        ];
    }
}
