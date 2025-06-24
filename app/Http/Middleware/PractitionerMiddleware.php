<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PractitionerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return auth()->user()->isPractitioner() ? $next($request) : abort(404);
    }
}
