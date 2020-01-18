<?php

namespace App\Http\Middleware;

use Closure;

class Comman2
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
        if(auth()->user()->role == 'Admin' or auth()->user()->role == 'Employee'){
            return $next($request);
        } else {
          abort(404);
        }
    }
}
