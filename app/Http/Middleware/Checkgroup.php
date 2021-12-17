<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Checkgroup
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (\Auth::user()->group == 1 
            || \Auth::user()->group == 2) {
            return $next($request);
        }

        return redirect('/'); // If user is not an admin.
    }
}
