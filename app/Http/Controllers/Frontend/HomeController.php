<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Profession;
use App\Models\Service;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $articles = Article::latest('id')->take(3)->get();
        $professions = Profession::get();
        $services = Service::latest('id')->get();
        $events = Event::where('date', '>=', date('Y-m-d'))->latest('id')->take(6)->get();

        return view('frontend.home', compact('articles', 'professions', 'services', 'events'));
    }
}
