<?php

namespace App\Http\Middleware;

use App\Services\ApiService;
use App\Services\AuthService;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateToken
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
                throw new Exception("Token is required", Response::HTTP_BAD_REQUEST);
            }

            $isValidToken = AuthService::isValidToken($token);

            if (!$isValidToken) {
                throw new Exception("Invalid token", Response::HTTP_UNAUTHORIZED);
            }

            return $next($request);
        } catch (Exception $e) {
            return ApiService::responseError($e);
        }
    }
}
