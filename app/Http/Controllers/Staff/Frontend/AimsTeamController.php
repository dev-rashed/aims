<?php

namespace App\Http\Controllers\Staff\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AimsTeamController extends Controller
{
    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        return view('staff.frontend.team.edit');
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

        $team_items = (array) json_decode(setting('team_items'));
        $items = $request->items;
        foreach ($items as $key => $item) {
            $image = isset($team_items[$key], $team_items[$key]->image) ? $team_items[$key]->image : null;
            $items[$key]['image'] = $request->hasFile("items.$key.image") ? fileUpload($request->file("items.$key.image"), 'team', $image) : $image;
        }

        Setting::updateOrCreate(['key' => 'team_title'], ['value' => $request->title]);
        Setting::updateOrCreate(['key' => 'team_description'], ['value' => $request->description]);
        Setting::updateOrCreate(['key' => 'team_items'], ['value' => json_encode($items)]);

        return response()->json(['message' => translate('updated_message', ['text' => 'team'])]);
    }
}
