<?php

namespace App\Http\Middleware;

use Closure;

class RegisterMiddleware
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
        if ($request->key != env('APP_KEY')) {
            return redirect('/fail');
        }
        return $next($request);
    }
}
