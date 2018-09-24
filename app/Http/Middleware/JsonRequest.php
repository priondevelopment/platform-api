<?php

namespace App\Http\Middleware;

use Closure;

class JsonRequest
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (in_array($request->method(), ['POST']) AND $request->isJson()) {
            $data = $request->json()->all();
            $request->request->replace(is_array($data) ? $data : []);
        }

        return $next($request);
    }

}
