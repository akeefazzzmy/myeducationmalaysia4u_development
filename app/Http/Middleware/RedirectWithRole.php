<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectWithRole
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
        // dd($request);
        if(Auth::user()->capaian_id == 1)
        {
            // dd('masuk admin');
            return redirect()->route('admin-dashboard:dashboard');
        }
        else if(Auth::user()->capaian_id == 2)
        {
            return redirect()->route('bem-dashboard:dashboard');
        }
        else if(Auth::user()->capaian_id == 3)
        {
            return redirect()->route('em-dashboard:dashboard');
        }
        else if(Auth::user()->capaian_id == 4)
        {
            return redirect()->route('kedutaan-dashboard:dashboard');
        }
        else if(Auth::user()->capaian_id == 5)
        {
            // return redirect()->route('pelajar-dashboard:dashboard');
            return redirect()->route('pelajar-profil:index');
        }

        return $next($request);
    }
}
