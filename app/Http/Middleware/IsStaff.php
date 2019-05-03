<?php

namespace App\Http\Middleware;
use Auth;

use Closure;

class IsStaff
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
        if(Auth::check() && Auth::user()->staff == "1"){
            return $next($request);
        }
        return redirect('user');
    }

}
