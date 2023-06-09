<?php

namespace App\Http\Middleware;

use Closure;
use Hash;

class AuthenticateDefaultPass
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $nextt
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if(Hash::check('123456789', auth()->user()->password)){

            return response()->view('resetpass');

        }
        else{

            return $next($request);

        }


     
    }
}
