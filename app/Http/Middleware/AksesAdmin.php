<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AksesAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role1 = null)
    {
        if (Auth::user()->level == 'kasir' && $role1 = 'kasir') {
            return $next($request);
        } else if(Auth::user()->level == 'admin') {
        return $next($request);
        }

        return abort(403);
    }
}
