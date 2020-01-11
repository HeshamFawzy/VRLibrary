<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class BasicAdmin
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
       if(auth()->user() && auth()->user()->email == 'BasicAdmin@BasicAdmin.com'){
            return $next($request);
        } else {
          abort(404);
        }
    }
}