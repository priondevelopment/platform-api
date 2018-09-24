<?php

namespace App\Http\Middleware;

use Closure;
use File;
use Carbon\Carbon;

class LogRequests
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

        $date = Carbon::now();
        $log_path = storage_path('logs/request-'. $date->format("Y-m-d") .'.log');
        $content = json_encode([
            'url' => $request->url(),
            'data' => $request->except(['cc','credit_card','password','ccv']),
        ]);

        $bytesWritten = file_put_contents($log_path, $date->toDateTimeString() . "\n", FILE_APPEND);
        $bytesWritten = file_put_contents($log_path, $content . "\n", FILE_APPEND);

        return $next($request);

    }

}
