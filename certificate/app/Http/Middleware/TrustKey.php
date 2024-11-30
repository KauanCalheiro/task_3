<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrustKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $token = $request->bearerToken();

            if (empty($token)) {
                throw new Exception('Token is required 1');
            }

            $trustKey = base64_decode($_ENV['TRUST_KEY']);
            $token    = base64_decode($token);

            if ( $trustKey != $token ) {
                throw new Exception('Invalid token');
            }

            return $next($request);
        }
        catch (Exception $e) {
            return response()->json([ 'error' => $e->getMessage(), 'trace' => $e->getTrace()], Response::HTTP_BAD_REQUEST);
        }
    }
}
