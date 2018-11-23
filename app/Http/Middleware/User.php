<?php

namespace App\Http\Middleware;

use App\Utills\APP_CONSTS;
use Closure;

class User
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
        // If logged in user is not admin
        if (auth()->user()->is_admin == APP_CONSTS::NO){
            return $next($request);
        }
        return redirect()->back();
    }
}
