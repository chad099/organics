<?php

namespace App\Http\Middleware;

use Closure, Auth;

class adminRole
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
      if ( Auth::user()->role) {
            return redirect('/profile');
        }

      return $next($request);
    }
}
