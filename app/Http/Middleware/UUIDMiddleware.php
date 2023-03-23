<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UUIDMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->has('uuid')) {
            return response() -> json([
                'error' => 'Not authenticate'
            ], Response::HTTP_UNAUTHORIZED);  
        }

        $user = User::where('uuid', $request->uuid)->exists();

        if (!$user) {
            return response() -> json([
                'error' => 'Not authenticate'
            ], Response::HTTP_UNAUTHORIZED);  
        }

        return $next($request);
    }
}
