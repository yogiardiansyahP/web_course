<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\TokenMismatchException;

class VerifyCsrfToken
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->isMethod('post') || $request->isMethod('put') || $request->isMethod('delete')) {
            $token = $request->input('_token');
            if (!$token || $token !== request()->session()->token()) {
                throw new TokenMismatchException('CSRF token mismatch.');
            }
        }

        return $next($request);
    }
}