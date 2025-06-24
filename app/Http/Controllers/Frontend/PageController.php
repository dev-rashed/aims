<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * details
     */
    public function details($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        return view('frontend.page', compact('page'));
    }
}
