<?php

namespace App\Http\Requests\Staff;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
        $imageRule = 'nullable'.imageFileValidationRule();

        return [
            'app_name' => 'nullable|string|max:255',
            'app_title' => 'nullable|string|max:255',
            'app_description' => 'nullable|string',
            'email' => 'nullable|string|email',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'invoice_prefix' => 'nullable|string',
            'copyright' => 'nullable|string',
            'timezone' => 'nullable|string|max:255',
            'date_format' => 'nullable|string|max:255',
            'currency_symbol' => 'nullable|integer|exists:currencies,id',
            'currency_position' => 'nullable|string|max:255',

            'mail' => 'nullable|array',
            'mail.mailer' => 'nullable|string|max:10',
            'mail.encryption' => 'nullable|string|max:3',
            'mail.port' => 'nullable|integer',
            'mail.host' => 'nullable|string',
            'mail.username' => 'nullable|string',
            'mail.password' => 'nullable|string',
            'mail.from_address' => 'nullable|email|string|max:50',

            'social_name' => 'nullable|array',
            'social_name.*' => 'nullable|string|max:20',
            'social_url' => 'nullable|array',
            'social_url.*' => 'nullable|url',

            'logo' => $imageRule,
            'dark_logo' => $imageRule,
            'favicon' => $imageRule,
            'footer_logo' => $imageRule,
            'default_image' => $imageRule,

            'stripe' => 'nullable|array',
            'stripe.key' => 'nullable|string',
            'stripe.secret' => 'nullable|string',

            'google' => 'nullable|array',
            'google.client_id' => 'nullable|string',
            'google.client_secret' => 'nullable|string',
            'google.map_api_key' => 'nullable|string',
            'google.recaptcha_site_key' => 'nullable|string',
            'google.recaptcha_secret_key' => 'nullable|string',

            'vimeo' => 'nullable|array',
            'vimeo.client_id' => 'nullable|string',
            'vimeo.client_secret' => 'nullable|string',
            'vimeo.access_token' => 'nullable|string',

            'tinymce_api_key' => 'nullable|string',

        ];
    }
}
