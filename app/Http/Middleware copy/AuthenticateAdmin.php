<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AuthenticateAdmin
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

       if(auth()->user()->type==6 || Session::get('currentPortal') == 6){

            return $next($request); 
            
       }

    //    return back();
       
     
    }
}
