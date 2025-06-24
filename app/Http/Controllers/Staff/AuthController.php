<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showLoginView()
    {
        return view('auth.staff-login');
    }

    /**
     * authenticated staff login
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = ['email' => $request->email, 'password' => $request->password];

        $remember = (! empty($request->remember_me)) ? true : false;

        if (Auth::guard('staff')->attempt($credentials, $remember)) {
            return response()->json(['message' => translate('logged_in')]);
        } else {
            return response()->json(['message' => translate('credentials_not_match')], 401);
        }
    }

    /**
     * authenticated staff logout
     */
    public function logout()
    {
        Auth::guard('staff')->logout();

        return response()->json(['message' => translate('logged_out')]);
    }
}
