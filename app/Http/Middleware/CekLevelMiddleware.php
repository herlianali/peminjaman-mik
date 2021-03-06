<?php

namespace App\Http\Middleware;

use Closure;

class CekLevelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (session('role') === $role) {
            return $next($request);
        }
        return back();
    }
}
