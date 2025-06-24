<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function index($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    /**
     * Create a new controller instance.
     */
    public function handleCallback($driver)
    {
        $id = $driver == 'facebook' ? 'facebook_id' : 'google_id';
        $user = Socialite::driver($driver)->user();
        $finduser = User::where($id, $user->id)->orWhere('email', $user->email)->first();

        if (! $finduser) {
            $first_name = isset($user->user['given_name']) ? $user->user['given_name'] : $user->name;
            $last_name = isset($user->user['family_name']) ? $user->user['family_name'] : null;
            $username = generateSlug("$first_name $last_name");

            if (DB::table('users')->where('username', $username)->exists()) {
                $username .= rand();
            }

            $finduser = User::create([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'username' => $username,
                'email' => $user->email,
                'phone' => $user?->phone,
                'avatar' => $user->avatar,
                $id => $user->id,
                'password' => encrypt(rand()),
            ]);
        }
        Auth::login($finduser);

        return redirect()->to(session()->has('previous_url') ? session()->get('previous_url') : '/auth/profile');
    }
}
