<?php
/**
 * Created by PhpStorm.
 * User: stanislav
 * Date: 21.03.17
 * Time: 21:27
 */

namespace App\Http\Middleware;


use Closure;

class HttpsProtocol
{
    public function handle($request, Closure $next) {
        if (!$request->secure()) {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}