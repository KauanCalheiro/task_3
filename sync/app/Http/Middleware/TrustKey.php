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
         if ($request->isMethod('OPTIONS')) {
            return response()->make('', 200, [
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS',
                'Access-Control-Allow-Headers' => 'Content-Type, X-Requested-With, Authorization, Accept, Origin, X-CSRF-Token',
                'Access-Control-Max-Age' => '3600',
            ]);
        }

        try {
            $token = $request->bearerToken();

            if (empty($token)) {
                throw new Exception('Token is required');
            }

            $trustKey = base64_decode($_ENV['TRUST_KEY']);
            $token    = base64_decode($token);

            if ( $trustKey != $token ) {
                throw new Exception('Invalid token');
            }

            $response = $next($request);
            
            return $response;
        }
        catch (Exception $e) {
            return response()->json([ 'error' => $e->getMessage(), 'trace' => $e->getTrace()], Response::HTTP_BAD_REQUEST);
        }
    }
}
