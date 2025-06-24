<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PhoneValidationNumberRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        try {
            $location = request()->filled('location') ? getLocation(request()->input('location'), true) : null;
            $countryCode = $location->countryCode ?? 'GB';
            phone($value, $countryCode, 'E164');
        }
        catch (\Exception $e) {
            storeExceptionLog($e);
            $fail('Please provide a valid phone number.');
        }
    }
}
