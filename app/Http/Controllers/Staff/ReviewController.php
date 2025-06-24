<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\ReviewRequest;
use App\Models\Review;
use Yajra\DataTables\Facades\DataTables;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('show_review');
        if (request()->ajax()) {
            $reviews = Review::query();

            return DataTables::eloquent($reviews)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.review.edit', $data->id), 'type' => 'edit', 'can' => 'edit_review'],
                        ['url' => route('staff.review.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_review'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.review.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_review');

        return view('staff.review.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReviewRequest $request)
    {
        $this->authorize('create_review');
        $input = $request->all();
        $input['image'] = fileUpload($request->image, 'review');
        Review::create($input);

        return response()->json(['message' => translate('added_message', ['text' => 'testimonial'])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        $this->authorize('edit_review');

        return view('staff.review.form', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReviewRequest $request, Review $review)
    {
        $this->authorize('edit_review');
        $input = $request->all();
        if ($request->hasFile('image')) {
            $input['image'] = fileUpload($request->image, 'review', $review->image);
        }

        $review->update($input);

        return response()->json(['message' => translate('updated_message', ['text' => 'Testimonial'])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $this->authorize('delete_review');
        deleteUploadedFile($review->image);
        $review->delete();

        return response()->json(['message' => translate('deleted_message', ['text' => 'Testimonial'])]);
    }
}
