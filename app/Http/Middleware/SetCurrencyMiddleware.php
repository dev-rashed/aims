<?php

namespace App\Http\Middleware;

use App\Models\Currency;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetCurrencyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currency = session()->get('currency');
        if ($currency == null) {
            $currency = Currency::query()->where('id', setting('currency_symbol'))->first();
            session()->put('currency', $currency);
        }
        return $next($request);
    }
}
