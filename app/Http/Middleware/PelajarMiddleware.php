<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PelajarMiddleware
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
        if(auth()->user()->capaian_id == '5')
        {
            return $next($request);
        }
        abort(403);//xdk authorize
    }
}
