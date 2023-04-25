<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AuthenticatePrincipal
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
        if(auth()->user()->type==2 || Session::get('currentPortal') == 2){

            $response = $next($request);

            return $response;

       }

       return back();
    }
}
