<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use stdClass;

class ArticleController extends Controller
{
    /**
     * Display a listing of the education page
     */
    public function index(Request $request)
    {
        $articles = Article::query();
        if ($request->has('categories') && count($request->categories) > 0) {
            $articles = $articles->whereHas('categories', fn ($q) => $q->whereIn('slug', $request->categories));
        }
        $articles = $articles->latest('id')->paginate(6);

        if ($request->ajax()) {
            return view('frontend.article.data', compact('articles'));
        }

        $data = new stdClass;
        $data->categories = ArticleCategory::latest('id')->get(['name', 'slug']);

        return view('frontend.article.index', compact('data', 'articles'));
    }

    /**
     * Display the specified resource.
     */
    public function details($slug)
    {
        $article = Article::with('categories:id,name', 'counsellor:id,first_name,last_name')->where('slug', $slug)->firstOrFail();
        $articles = Article::whereNot('id', $article->id)->latest('id')->take(3)->get();

        return view('frontend.article.details', compact('article', 'articles'));
    }
}
