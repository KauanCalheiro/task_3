<?php

namespace App\Http\Middleware;

use App\Services\ApiService;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class RequestLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $body = [
                'request_path'    => $request->fullUrl(),
                'request_method'  => $request->method(),
                'request_body'    => json_encode($request->all()),
                'request_headers' => json_encode($request->headers->all()),
                'request_params'  => json_encode($request->query->all()),
            ];

            $response = Http::withHeader('Authorization', "Bearer {$_ENV['TRUST_KEY']}")
                ->withBody(json_encode($body))
                ->post('http://php-log:80/api');

            if (!$response->successful()) {
                throw new Exception('Failed to log request');
            }

            return $next($request);
        }
        catch (Exception $e) {
            return ApiService::responseError($e);
        }
    }
}
