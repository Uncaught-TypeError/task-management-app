<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TrackTimeMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('start_time')) {
            session()->put('start_time', now());
        }

        return $next($request);
    }
}
