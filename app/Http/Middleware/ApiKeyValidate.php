<?php

namespace App\Http\Middleware;

use Closure;

class ApiKeyValidate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $key = $request->headers->get('api-key');

        // if(isset($key) == "prueba"){
        //     return $next($request);
        // } else {
        //     return response()->json([
        //         'error' => 'unauthorized'
        //     ], 401);
        // }

        if(isset($key) && $key === "NLPartners2022@*"){
            return $next($request);
        } else {
            return response()->json([
                'error' => 'unauthorized',
              ], 401);
        }
    }
}
