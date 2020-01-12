<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use DB;

class Admin
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

        if(auth()->user()->role == 'Admin'){
            return $next($request);
        } else {
          abort(404);
        }
    }
}
