<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $header = getallheaders();
        if (array_key_exists("Authorization",$header)){
            return response()->json(['message' => "Sorry!! you don\'t have permission to access this request"], 500);
        }

        return $next($request);
    }
}