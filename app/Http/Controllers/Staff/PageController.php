<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\PageRequest;
use App\Models\Page;
use Yajra\DataTables\Facades\DataTables;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('show_page');
        if (request()->ajax()) {
            $pages = Page::select();

            return DataTables::of($pages)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.page.show', $data->id), 'type' => 'show', 'id' => false, 'can' => 'show_page'],
                        ['url' => route('staff.page.edit', $data->id), 'type' => 'edit', 'id' => false, 'can' => 'edit_page'],
                        ['url' => route('staff.page.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_page'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.page.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_page');

        return view('staff.page.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request)
    {
        $this->authorize('create_page');
        $input = $request->all();
        $input['slug'] = generateSlug($request->name);
        $input['status'] = $request->boolean('status');

        Page::create($input);

        return response()->json(['message' => translate('added_message', ['text' => 'page'])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        $this->authorize('show_page');

        return view('staff.page.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        $this->authorize('edit_page');

        return view('staff.page.form', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageRequest $request, Page $page)
    {
        $this->authorize('edit_page');
        $input = $request->all();
        $input['slug'] = generateSlug($request->name);
        $input['status'] = $request->boolean('status');

        $page->update($input);

        return response()->json(['message' => translate('updated_message', ['text' => 'Page'])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $this->authorize('delete_page');
        $page->delete();

        return response()->json(['message' => translate('page_message', ['text' => 'Page'])]);
    }
}
