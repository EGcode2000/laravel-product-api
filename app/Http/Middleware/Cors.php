<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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
        //return response()->json(["ELAD"=>"ASD"], 404);
        $response = $next($request);
        $response->header('Access-Control-Allow-Origin', 'http://localhost');
        $response->header('Access-Control-Allow-Methods', 'HEAD, GET, POST, PUT, PATCH, OPTIONS');
        $response->header('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept, Authorization' /*$request->header('Access-Control-Request-Headers')*/);
        $response->header('Access-Control-Allow-Credentials', true);

        //return response()->json(["ELAD"=>"ASD"], 401);
        return $response;

        /*
        return $response
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'HEAD, GET, POST, PUT, PATCH, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Content-Type ,Authorization')
        ;*/
    }
}
