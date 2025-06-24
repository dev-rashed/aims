<?php

namespace App\Http\Controllers\Staff\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        return view('staff.frontend.about');
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'about_title' => ['required','string'],
            'about_description' => ['required','string'],
        ]);

        Setting::updateOrCreate(['key' => 'about_title'], ['value' => $request->about_title]);
        Setting::updateOrCreate(['key' => 'about_description'], ['value' => $request->about_description]);

        return response()->json(['message' => translate('updated_message', ['text' => 'About'])]);
    }
}
