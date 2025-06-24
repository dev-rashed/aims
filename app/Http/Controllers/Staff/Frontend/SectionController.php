<?php

namespace App\Http\Controllers\Staff\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        return view('staff.frontend.section');
    }

    /**
     * updated
     */
    public function update(Request $request)
    {
        $sections = [
            'service_section' => $request->has('service_section') ? true : false,
            'video_section' => $request->has('video_section') ? true : false,
            'insight_section' => $request->has('insight_section') ? true : false,
            'subscription_section' => $request->has('subscription_section') ? true : false,
            'testimonial_section' => $request->has('testimonial_section') ? true : false,
            'counsellor_section' => $request->has('counsellor_section') ? true : false,
        ];

        Setting::updateOrCreate(['key' => 'sections'], ['value' => json_encode($sections)]);

        Setting::updateOrCreate(['key' => 'embed_video'], ['value' => $request->embed_video]);

        return response()->json(['message' => translate('updated_message', ['text' => 'Section show/hide'])]);
    }
}
