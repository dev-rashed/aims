<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class LocationRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return gettype(getLocation($value)) != 'boolean';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Your location does not exists.';
    }
}
