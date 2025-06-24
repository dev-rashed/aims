<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Yajra\DataTables\Facades\DataTables;

class BookingController extends Controller
{
    /**
     * index
     */
    public function index()
    {
        if (request()->ajax()) {
            $bookings = Booking::query()->with('event:id,date,time', 'payment:id,relation_id,subtotal,discount,total');

            return DataTables::eloquent($bookings)
                ->addIndexColumn()
                ->filter(fn ($query) => $query->where('user_id', auth()->id()), true)
                ->editColumn('event.date', fn ($data) => formatDate($data->event->date))
                ->addColumn('action', function ($data) {
                    return $this->buttonGroup([
                        ['url' => route('auth.booking.show', $data->invoice), 'type' => 'show', 'id' => false],
                    ]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('frontend.auth.booking.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $booking = Booking::with('event', 'payment')->where('invoice', $slug)->where('user_id', auth()->id())->firstOrFail();

        return view('frontend.auth.booking.show', compact('booking'));
    }
}
