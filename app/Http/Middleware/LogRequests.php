<?php

namespace App\Http\Middleware;

use Closure;
use File;
use Carbon\Carbon;

class LogRequests
{

    protected $skip = [
        'cc',
        'credit_card',
        'password',
        'ccv'
    ];

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
        $this->logRequest($request);
        return $next($request);
    }


    /**
     * Log an API Request
     *
     */
    protected function logRequest($request)
    {
        $date = Carbon::now();
        $log_path = storage_path('logs/request-'. $date->format("Y-m-d") .'.log');
        $content = json_encode([
            'url' => $request->url(),
            'data' => $request->except($this->skip),
        ]);

        $bytesWritten = file_put_contents($log_path, $date->toDateTimeString() . "\n", FILE_APPEND);
        $bytesWritten = file_put_contents($log_path, $content . "\n", FILE_APPEND);
    }

}
