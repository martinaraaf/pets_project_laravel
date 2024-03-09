<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth('api')->user();

       
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // If the user is authenticated, you can allow the request to continue to the next middleware or route handler
        return $next($request);
    }
}
