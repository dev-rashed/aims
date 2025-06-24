<?php

namespace App\Http\Controllers\Staff\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AimsAdvisorController extends Controller
{
    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        return view('staff.frontend.advisor.edit');
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
            'items.*.designation' => ['nullable','string','max:255'],
            'items.*.image' => array_merge(['nullable'], imageFileValidationRule(true)),
            'items.*.description' => ['nullable','string'],
        ]);

        $advisor_items = (array) json_decode(setting('advisor_items'));
        $items = $request->items;
        foreach ($items as $key => $item) {
            $image = isset($advisor_items[$key], $advisor_items[$key]->image) ? $advisor_items[$key]->image : null;
            $items[$key]['image'] = $request->hasFile("items.$key.image") ? fileUpload($request->file("items.$key.image"), 'advisor', $image) : $image;
        }

        Setting::updateOrCreate(['key' => 'advisor_title'], ['value' => $request->title]);
        Setting::updateOrCreate(['key' => 'advisor_description'], ['value' => $request->description]);
        Setting::updateOrCreate(['key' => 'advisor_items'], ['value' => json_encode($items)]);

        return response()->json(['message' => translate('updated_message', ['text' => 'Advisor'])]);
    }
}
