<?php

namespace App\Http\Controllers\Staff\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AmbassadorController extends Controller
{
    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        return view('staff.frontend.ambassador.edit');
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => ['required','string'],
            'description' => ['required','string'],
            'items' => ['nullable','array'],
            'items.*.name' => ['required','string','max:255'],
            'items.*.image' => array_merge(['nullable'], imageFileValidationRule(true)),
            'items.*.description' => ['nullable','string'],
        ]);

        $items = $request->items ?? [];
        foreach ($items as $key => $item) {
            $items[$key]['image'] = $request->hasFile("items.$key.image") ? fileUpload($request->file("items.$key.image"), 'advisor') : null;
        }

        Setting::updateOrCreate(['key' => 'ambassador_title'], ['value' => $request->title]);
        Setting::updateOrCreate(['key' => 'ambassador_description'], ['value' => $request->description]);
        Setting::updateOrCreate(['key' => 'ambassador_items'], ['value' => json_encode($items)]);

        return response()->json(['message' => translate('updated_message', ['text' => 'Ambassador'])]);
    }
}
