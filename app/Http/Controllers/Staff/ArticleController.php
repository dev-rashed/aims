<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\ArticleRequest;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Counsellor;
use Yajra\DataTables\Facades\DataTables;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('show_article');
        if (request()->ajax()) {
            $articles = Article::query()->with('counsellor:id,first_name,last_name');

            return DataTables::eloquent($articles)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.article.show', $data->id), 'type' => 'show', 'id' => false, 'can' => 'show_article'],
                        ['url' => route('staff.article.edit', $data->id), 'type' => 'edit', 'id' => false, 'can' => 'edit_article'],
                        ['url' => route('staff.article.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_article'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.insight.article.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_article');
        $data['counsellors'] = Counsellor::latest('id')->get(['id', 'first_name', 'last_name']);
        $data['categories'] = ArticleCategory::latest('id')->get(['id', 'name']);

        return view('staff.insight.article.form', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $input = $request->all();
        $input['counsellor_id'] = $request->counsellor;
        $input['slug'] = generateSlug($request->title);
        $input['image'] = fileUpload($request->image, 'article');

        Article::create($input)->categories()->sync($request->input('categories'));

        return response()->json(['message' => translate('added_message', ['text' => 'insight'])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $this->authorize('show_article');

        return view('staff.insight.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $this->authorize('edit_article');
        $data['counsellors'] = Counsellor::latest('id')->get(['id', 'first_name', 'last_name']);
        $data['categories'] = ArticleCategory::latest('id')->get(['id', 'name']);

        return view('staff.insight.article.form', compact('data', 'article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $this->authorize('edit_article');
        $input = $request->all();
        $input['counsellor_id'] = $request->counsellor;
        $input['slug'] = generateSlug($request->title);
        $input['language_id'] = $request->language;
        if ($request->hasFile('image')) {
            $input['image'] = fileUpload($request->image, 'article', $article->image);
        }

        $article->update($input);
        $article->categories()->sync($request->input('categories'));

        return response()->json(['message' => translate('updated_message', ['text' => 'Insight'])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete_article');
        deleteUploadedFile($article->image);
        $article->delete();

        return response()->json(['message' => translate('deleted_message', ['text' => 'Insight'])]);
    }
}
