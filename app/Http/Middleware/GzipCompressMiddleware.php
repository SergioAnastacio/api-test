<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GzipCompressMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response=$next($request);
        //* Gzip compress implementation
        if ($response instanceof Response && $request->header('Accept-Encoding') &&
            strpos($request->header('Accept-Encoding'), 'gzip') !== false) {
            $response->headers->set('Content-Encoding', 'gzip');
            $response->setContent(gzencode($response->getContent(), 8, FORCE_GZIP));
        }
        return $response; //! respone 1:3 of the original size
    }
}
