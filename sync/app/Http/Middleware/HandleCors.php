<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HandleCors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Adicionar os cabeçalhos CORS
        $response = $next($request);

        // Permitir acesso de qualquer origem (ajuste conforme necessário)
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, Authorization, Accept, Origin, X-CSRF-Token');
        
        // Se for uma requisição OPTIONS (pré-vôo), já retornar 200
        if ($request->isMethod('OPTIONS')) {
            return response()->make('', 200, [
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS',
                'Access-Control-Allow-Headers' => 'Content-Type, X-Requested-With, Authorization, Accept, Origin, X-CSRF-Token',
                'Access-Control-Max-Age' => '3600',
            ]);
        }

        return $response;
    }
}
