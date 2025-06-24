<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\LocationRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Propaganistas\LaravelPhone\Rules\Phone;

class ProfileController extends Controller
{
    /**
     * index
     */
    public function index()
    {
        return view('user.profile');
    }

    /**
     * update authenticated user profile
     */
    public function update(Request $request)
    {
        $location = $request->filled('location') ? getLocation($request->input('location'), true) : null;
        $countryCode = $location->countryCode ?? 'GB';

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique(User::class)->ignore(auth()->id())],
            'phone' => ['required','string', (new Phone)->countryField($countryCode), Rule::unique(User::class)->ignore(auth()->id())],
            'location' => ['required', 'string', new LocationRule()],
            'avatar' => array_merge(['nullable'], imageFileValidationRule(true)),
            'password' => ['nullable', 'string', 'min:8'],
        ]);

        $validated['password'] = ! empty($request->password) ? bcrypt($request->password) : auth()->user()->password;
        $validated['avatar'] = $request->hasFile('avatar') ? fileUpload($request->file('avatar'), 'user') : $request->user()->avatar;

        $request->user()->fill($validated)->save();

        return response()->json(['message' => translate('profile_updated')]);
    }

    /**
     * index
     */
    public function showPasswordUpdateForm()
    {
        return view('frontend.auth.profile.password');
    }

    /**
     * update password
     */
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => ['required', 'string', 'max:255'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $user = Auth::guard()->user();
        if (Hash::check($request->current_password, $user->password)) {

            if (! Hash::check($request->password, $user->password)) {

                $auth = User::find($user->id);
                $auth->update([
                    'password' => Hash::make($request->password),
                ]);

                Auth::guard()->logout();

                return response()->json(['message' => 'Password updated successfully']);

            } else {
                return response()->json(['message' => 'New password can not be same as current password'], 302);
            }
        } else {
            return response()->json(['message' => 'Password does not match'], 302);
        }
    }

    /**
     * update authenticated user profile
     */
    public function updateRenewType(Request $request)
    {
        $request->user()?->therapist()?->update(['auto_renew' => $request->auto_renew]);

        return response()->json(['message' => 'Membership type updated successfully.']);
    }
}
