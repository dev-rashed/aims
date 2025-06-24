<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Rules\LocationRule;
use App\Rules\RecaptchaRule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'location' => ['required', 'string', new LocationRule()],
            'g-recaptcha-response' => [new RecaptchaRule],
        ])->validate();

        $username = generateSlug("{$input['first_name']} {$input['last_name']}");
        if(DB::table('users')->where('username', $username)->exists()) {
            $username .= rand();
        }
        return User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'username' => $username,
            'email' => $input['email'],
            'location' => $input['location'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
