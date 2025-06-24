<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('show_article_category');
        if (request()->ajax()) {
            $categories = ArticleCategory::query();

            return DataTables::eloquent($categories)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.article-category.edit', $data->id), 'type' => 'edit', 'can' => 'edit_article_category'],
                        ['url' => route('staff.article-category.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_article_category'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.insight.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_article_category');

        return view('staff.insight.category.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create_article_category');
        $request->validate(['name' => 'required|string|max:255|unique:article_categories']);
        ArticleCategory::create([
            'name' => $request->name,
            'slug' => generateSlug($request->name),
        ]);

        return response()->json(['message' => translate('added_message', ['text' => 'category'])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ArticleCategory $articleCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ArticleCategory $articleCategory)
    {
        $this->authorize('edit_article_category');

        return view('staff.insight.category.form', compact('articleCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ArticleCategory $articleCategory)
    {
        $this->authorize('edit_article_category');
        $request->validate(['name' => 'required|string|max:255|unique:article_categories,name,'.$articleCategory->id]);
        $articleCategory->update([
            'name' => $request->name,
            'slug' => generateSlug($request->name),
        ]);

        return response()->json(['message' => translate('updated_message', ['text' => 'Category'])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArticleCategory $articleCategory)
    {
        $this->authorize('delete_article_category');
        $articleCategory->delete();

        return response()->json(['message' => translate('deleted_message', ['text' => 'Category'])]);
    }
}
