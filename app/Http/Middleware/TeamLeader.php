<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class TeamLeader
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
        if (Auth::check() && Auth::user()->level == 'Team Leader') {
            return $next($request);
        }
        else {
            abort(403, 'Unauthorized action.');
        }
    }
}
