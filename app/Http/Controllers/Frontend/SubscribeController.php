<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscribeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'required|string|email',
        ]);

        if (DB::table('subscribes')->where('email', $request->email)->exists()) {
            return response()->json(['message' => translate('already_subscribed')], 300);
        }

        Subscribe::create($request->all());

        return response()->json(['message' => translate('subscribed')]);
    }
}
