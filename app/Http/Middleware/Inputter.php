<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Inputter
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
        //return $next($request);
        if (Auth::check() && Auth::user()->divisi == 'Inputter') {
            return $next($request);
        }
        else {
            abort(403, 'Unauthorized action.');
        }
    }
}
