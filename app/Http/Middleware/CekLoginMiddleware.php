<?php

namespace App\Http\Middleware;

use Closure;

class CekLoginMiddleware
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
        if (session()->has('role') === false) {
            return back()->with('pesan', "anda harus login dulu");
        }
        return $next($request);
    }
}
