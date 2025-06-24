<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class RecaptchaRule implements Rule
{
    public string $return;

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (config('services.google.recaptcha_enable')) {
            if (empty($value)) {
                $this->return = 'empty';
                return false;
            }
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret'   => config('services.google.recaptcha_secret_key'),
                'response' => $value,
            ]);
            $result = $response->json();
            $this->return = $result['success'] ? 'pass' : 'failed';
            return $result['success'];
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        if ($this->return == 'empty') {
            return 'Please fill up the ReCaptcha.';
        }
        elseif ($this->return == 'failed') {
            return 'ReCaptcha verification failed.';
        }
    }
}
