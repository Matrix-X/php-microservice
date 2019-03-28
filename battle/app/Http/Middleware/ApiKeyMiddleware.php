<?php
namespace App\Http\Middleware;
use Closure;

class ApiKeyMiddleware
{
    const API_KEY = 'RSAy430_a3eGR';
    public function handle($request, Closure $next)
    {
//        var_dump($request->input('api_key'), self::API_KEY);
        if ($request->input('api_key') !== self::API_KEY) {
            die('API_KEY invalid');
        }
        return $next($request);
    }
}