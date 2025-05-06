<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EncryptCookies
{
    public function handle(Request $request, Closure $next)
    {
        // Enkripsi cookies yang masuk
        foreach ($request->cookies as $key => $value) {
            if (!is_null($value)) {
                $request->cookies->set($key, Crypt::encrypt($value));
            }
        }

        // Lanjutkan ke request berikutnya
        $response = $next($request);

        // Dekripsi cookies yang keluar
        foreach ($response->headers->getCookies() as $cookie) {
            if (!is_null($cookie->getValue())) {
                $response->headers->setCookie(
                    cookie(
                        $cookie->getName(),
                        Crypt::decrypt($cookie->getValue()),
                        $cookie->getExpiresTime(),
                        $cookie->getPath(),
                        $cookie->getDomain(),
                        $cookie->isSecure(),
                        $cookie->isHttpOnly()
                    )
                );
            }
        }

        return $response;
    }
}