<?php

namespace App\Http\Middleware;

use App\Utills\APP_CONSTS;
use Closure;

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
    //   if logged in user is admin
        if (auth()->user()->is_admin == APP_CONSTS::YES){
            return $next($request);
        }
        return redirect()->back();
//        return redirect()->route("access.denied");
//        return response()->redirect()->back();
    }
}
