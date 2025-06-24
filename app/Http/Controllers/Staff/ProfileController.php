<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('staff.profile.index');
    }

    /**
     * update authenticated user profile
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:staff,email,'.auth('staff')->id(),
            'phone' => 'required|string|max:255',
            'address' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpep,png,bmp,webp,svg|max:512',
        ]);

        $input = $request->all();
        if ($request->hasFile('image')) {
            $input['image'] = fileUpload($request->image, 'staff', auth('staff')->user()->image);
        }

        Staff::find(auth('staff')->id())->update($input);

        return response()->json(['message' => translate('profile_updated')]);
    }

    /**
     * index
     */
    public function showPasswordUpdateForm()
    {
        return view('staff.profile.password');
    }

    /**
     * update password
     */
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required|string|max:255',
            'password' => 'required|min:8|confirmed',
        ]);

        $staff = Auth::guard('staff')->user();
        if (Hash::check($request->current_password, $staff->password)) {

            if (! Hash::check($request->password, $staff->password)) {

                $auth = Staff::find($staff->id);
                $auth->update([
                    'password' => Hash::make($request->password),
                ]);

                Auth::guard('staff')->logout();

                return response()->json(['message' => 'Password updated successfully']);

            } else {
                return response()->json(['message' => 'New password can not be same as current password'], 302);
            }
        } else {
            return response()->json(['message' => 'Password does not match'], 302);
        }
    }
}
