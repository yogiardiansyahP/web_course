<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TrimStrings
{
    public function handle(Request $request, Closure $next)
    {
        foreach ($request->all() as $key => $value) {
            if (is_string($value)) {
                $request->offsetSet($key, trim($value));
            }
        }

        return $next($request);
    }
}