<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Buyerrole
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
        if(Auth::user()->role!='buyer'){
            return redirect()->back();
        }
        return $next($request);
    }
}
