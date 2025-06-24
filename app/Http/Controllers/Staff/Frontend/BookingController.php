<?php

namespace App\Http\Controllers\Staff\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('show_enroll');
        if (request()->ajax()) {
            $bookings = Booking::query()->with('user:id,first_name,last_name', 'payment:id,relation_id,subtotal,discount,total', 'event:id,title');

            return DataTables::eloquent($bookings)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('staff.booking.show', $data->id), 'type' => 'show', 'id' => false, 'can' => 'show_booking'],
                        ['url' => route('staff.booking.destroy', $data->id), 'type' => 'delete', 'can' => 'delete_booking'],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('staff.frontend.booking.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        $booking->load('user', 'event', 'payment');

        return view('staff.frontend.booking.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $this->authorize('delete_booking');
        $booking->delete();

        return response()->json(['message' => translate('deleted_message', ['text' => 'Booking'])]);
    }
}
