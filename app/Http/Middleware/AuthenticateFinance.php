<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AuthenticateFinance
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
        if(auth()->user()->type==4 || auth()->user()->type==15 || Session::get('currentPortal') == 4){
            return $next($request); 
        }
        
    }
}
