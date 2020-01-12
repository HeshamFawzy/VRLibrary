<?php

namespace App\Http\Middleware;

use Closure;

class Comman
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
        if(auth()->user()->role == 'BasicAdmin' or auth()->user()->role == 'Admin'){
            return $next($request);
        } else {
          abort(404);
        }
    }
}
