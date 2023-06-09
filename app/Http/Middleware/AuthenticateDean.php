<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AuthenticateDean
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
        if(auth()->user()->type== 14 || Session::get('currentPortal') == 14){

            return $next($request); 

        }

        return back();
    }
}
