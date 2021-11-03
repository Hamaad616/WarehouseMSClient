<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class logger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->has('email')&&$request->has('password') )
        {
            return $next($request);
        }
         return redirect('/');
    }
}
