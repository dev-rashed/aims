<?php

namespace App\Http\Controllers\Staff\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PaymentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $this->authorize('show_payment');
        if (request()->ajax()) {
            $payments = Payment::query()->with('user:id,first_name,last_name');

            return DataTables::eloquent($payments)->addIndexColumn()->toJson();
        }

        return view('staff.frontend.payment.index');
    }
}
