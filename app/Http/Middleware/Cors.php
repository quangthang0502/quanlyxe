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
//	    $header = [
//		    'Access-Control-Allow-Origin' => '*',
//		    'Access-Control-Allow-Methods'=> 'GET, POST, PUT, DELETE, OPTIONS',
//		    'Access-Control-Allow-Headers'=> 'X-Requested-With, Content-Type, X-Auth-Token, Origin, Authorization',
//		    'Access-Control-Request-Headers' => '*',
//		    'Access-Control-Allow-Credentials' => 'true',
//		    'content-type' => 'application/json'
//	    ];
//	    return $next( $request )->withHeaders($header);
	    header("Access-Control-Allow-Origin: *");
	    $headers = [
		    'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, PUT, DELETE',
		    'Access-Control-Allow-Headers'=> 'Content-Type, X-Auth-Token, Origin'
	    ];
	    if($request->getMethod() == "OPTIONS") {

		    return response()->make('OK', 200, $headers);
	    }

	    $response = $next($request);
	    foreach($headers as $key => $value)
		    $response->header($key, $value);
	    return $response;
    }
}
