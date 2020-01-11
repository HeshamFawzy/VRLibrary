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
        $admin = DB::table('admins')
        ->where('admins.user_id' , '=' , auth()->user()->id);

        if(auth()->user() && $admin != null){
            return $next($request);
        } else {
          abort(404);
        }
    }
}
