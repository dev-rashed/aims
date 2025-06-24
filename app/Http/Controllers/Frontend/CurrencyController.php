<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Review;
use App\Models\Service;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $id)
    {
        $currency = Currency::find($id);

        $request->session()->put('currency', $currency);

        return back();
    }
}
