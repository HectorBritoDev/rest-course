<?php

namespace App\Http\Middleware;

use Closure;

class SignatureMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $headers = 'X-name')
    {
        $response = $next($request);

        $response->headers->set($headers, config('app.name'));

        return $response;
    }
}
