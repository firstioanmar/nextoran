<?php

namespace App\Http\Middleware;

use Closure;

class adminMiddleware
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
        $user = $request->user();

        if ($user) {
          if ($user->iniAdmin()) {
            return $next($request);
          }
          if ($user->iniKasir()) {
            return redirect('/home');
          }

          return abort(503);
        }

        return abort(503);
    }
}
