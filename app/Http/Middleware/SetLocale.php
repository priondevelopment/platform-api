<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale
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

        $lang = config('app.language');

        if (app('auth')->check() AND app('auth')->user()->language)
            $lang = app('auth')->user()->language;

        $lang = strtolower($lang);
        app('translator')->setLocale($lang);

        return $next($request);

    }

}
