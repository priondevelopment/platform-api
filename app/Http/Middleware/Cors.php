<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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
        if ($request->isMethod('options')) {
            return response()->json([])
                ->header('Access-Control-Allow-Origin', config('app.site_url'))
                ->header('Access-Control-Allow-Headers', 'Content-Type, Content-Length, Authorization, X-Requested-With, Cache-Control, Accept, Origin, X-Session-ID')
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE');
        }

        return $next($request)
            ->header('Access-Control-Allow-Origin', config('app.site_url'))
            ->header('Access-Control-Allow-Headers', 'Content-Type, Content-Length, Authorization, X-Requested-With, Cache-Control, Accept, Origin, X-Session-ID')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE');
    }
}