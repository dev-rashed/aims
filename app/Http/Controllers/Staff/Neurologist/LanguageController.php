<?php

namespace App\Http\Controllers\Staff\Neurologist;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('show_language');
        if (request()->ajax()) {
            $languages = Language::query();

            return DataTables::eloquent($languages)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.language.edit', $data->id), 'type' => 'edit', 'can' => 'edit_language'],
                        ['url' => route('staff.language.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_language'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.neurologist.language.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_language');

        return view('staff.neurologist.language.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create_language');
        $request->validate(['name' => 'required|string|max:255|unique:languages']);
        Language::create([
            'name' => $request->name,
            'slug' => generateSlug($request->name),
        ]);

        return response()->json(['message' => translate('added_message', ['text' => 'language'])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        $this->authorize('edit_language');

        return view('staff.neurologist.language.form', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Language $language)
    {
        $this->authorize('edit_language');
        $request->validate(['name' => 'required|string|max:255|unique:languages,name,'.$language->id]);
        $language->update([
            'name' => $request->name,
            'slug' => generateSlug($request->name),
        ]);

        return response()->json(['message' => translate('updated_message', ['text' => 'Language'])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language)
    {
        $this->authorize('delete_language');
        $language->delete();

        return response()->json(['message' => translate('deleted_message', ['text' => 'Language'])]);
    }
}
