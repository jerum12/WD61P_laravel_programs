<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token_env = env('SECRET_TOKEN');
        $token_header = $request->header('Authorization');

        if($token_env !== $token_header){
            return response()->json(['message' => 'Unauthorized']);
        }


        return $next($request);
    }
}
