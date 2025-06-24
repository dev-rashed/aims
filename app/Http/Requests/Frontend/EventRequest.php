<?php

namespace App\Http\Requests\Frontend;

use App\Models\User;
use App\Rules\LocationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Propaganistas\LaravelPhone\Rules\Phone;

class EventRequest extends FormRequest
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

        $price = DB::table('events')->where('slug', $this->event)->value('price');

        return [
            'event' => ['required','string','exists:events,slug'],
            'first_name' => ['required','string','max:255'],
            'last_name' => ['required','string','max:255'],
            'location' => ['nullable','string', new LocationRule()],
            'email' => ['required','string','email','regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix', Rule::unique(User::class)->ignore(auth()->id())],
            'phone' => ['required','string',(new Phone)->countryField($countryCode), Rule::unique(User::class)->ignore(auth()->id())],
            'password' => ['nullable','string','min:8','confirmed'],
            'stripe_token' => [config('services.stripe.enable') && $price > 0 ? 'required':'nullable'],
        ];
    }
}
