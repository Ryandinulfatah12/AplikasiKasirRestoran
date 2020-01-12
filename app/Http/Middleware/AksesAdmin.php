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
    public function handle($request, Closure $next, $role1 = null, $role2 = null, $role3 = null, $role4 = null)
    {
        if (Auth::user()->level == 'pelanggan' && $role4 = 'pelanggan') {
            return $next($request);
        } else if (Auth::user()->level == 'owner' && $role3 = 'owner') {
            return $next($request);
        } else if (Auth::user()->level == 'waiter' && $role2 = 'waiter') {
            return $next($request);
        } else if (Auth::user()->level == 'kasir' && $role1 = 'kasir') {
            return $next($request);
        } else if(Auth::user()->level == 'admin') {
        return $next($request);
        }

        return abort(404);
    }
}
