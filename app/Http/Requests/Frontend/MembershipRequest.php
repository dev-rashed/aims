<?php

namespace App\Http\Requests\Frontend;

use App\Models\User;
use App\Rules\LocationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Propaganistas\LaravelPhone\Rules\Phone;

class MembershipRequest extends FormRequest
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
            'membership_plan' => ['required','string','exists:membership_plans,slug'],
            'membership_type' => ['required','string','in:monthly,yearly'],
            'first_name' => ['required','string','max:255'],
            'last_name' => ['required','string','max:255'],
            'email' => ['required','string','email','regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',Rule::unique(User::class)],
            'phone' => ['required','string', (new Phone)->countryField($countryCode), Rule::unique(User::class)],
            // 'phone'        => ['required','string','regex:/(01)[0-9]{9}/'],
            'password' => ['required','string','min:8','confirmed'],
            'location' => ['required', new LocationRule()],

            'services' => ['required','array'],
            'services.*' => ['string','exists:professions,slug'],
            'method' => ['required','array'],
            'method.*' => ['string','exists:sessions,slug'],
            'concessions' => ['nullable', 'required_unless:membership_plan,student-member','array'],
            'concessions.*' => ['string','exists:concessions,slug'],
            'formats' => ['nullable', 'required_unless:membership_plan,student-member','array'],
            'formats.*' => ['string','exists:formats,slug'],
            'languages' => ['required','array'],
            'languages.*' => ['string','exists:languages,slug'],
            'description' => ['nullable', 'required_unless:membership_plan,student-member','string'],
            'qualification' => ['required','string','max:255'],
            'documents' => ['nullable', 'required_unless:membership_plan,student-member','array'],
            'documents.*' => ['file','mimetypes:image/jpeg,image/gif,image/png,application/pdf,image/x-eps','max:6144'],
            'image' => ['nullable', 'required_unless:membership_plan,student-member', imageFileValidationRule(true)],
            // 'video'           => ['required','file','mimes:mp4,mov,ogg,flv,avi,wmv','max:10240'],
            'website' => ['nullable','string'],
            'socials' => ['nullable','array'],
            'socials.*' => ['integer','exists:online_platforms,id'],
            'urls' => ['nullable','array'],
            'urls.*' => ['string'],

            'stripe_token' => [config('services.stripe.enable') ? 'required':'nullable'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'concessions.required_unless' => 'The concessions field is required.',
            'formats.required_unless' => 'The formats field is required.',
            'description.required_unless' => 'The description field is required.',
            'documents.required_unless' => 'The documents field is required.',
            'documents.image' => 'The image field is required.',
        ];
    }
}
