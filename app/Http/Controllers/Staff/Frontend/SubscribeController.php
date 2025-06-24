<?php

namespace App\Http\Controllers\Staff\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Yajra\DataTables\Facades\DataTables;

class SubscribeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        $this->authorize('show_payment');
        if (request()->ajax()) {
            return DataTables::eloquent(Subscribe::query())
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.subscriber.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_subscribe'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.frontend.subscriber.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscribe $subscribe)
    {
        $this->authorize('delete_subscribe');
        $subscribe->delete();

        return response()->json(['message' => translate('deleted_message', ['text' => 'Subscriber'])]);
    }
}
