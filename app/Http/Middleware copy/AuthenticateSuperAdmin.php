<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next, $role)
    {
        if(auth()->user()->type==17 || $role == 'admin'){

            return $next($request); 
            
       }

       return back();
    }
}
