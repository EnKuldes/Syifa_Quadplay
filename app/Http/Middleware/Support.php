<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Support
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
        if (Auth::check() && Auth::user()->level == 'Support') {
            return $next($request);
        }
        else {
            abort(403, 'Unauthorized action.');
        }
    }
}
