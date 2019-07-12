<?php

namespace App\Http\Middleware;

use Closure;

class ApiStatus
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
        if (!$this->apiStatus()) {
            return $this->apiOffResponse();
        }

        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST');
    }


    /**
     * Reponse if the API is Off
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function apiOffResponse()
    {
        return response()
            ->json([
                'test' => config("app.status"),
                'status' => 0,
                'error' => 1,
                'code' => 503,
                'message' => "Resource is down for maintenance. Please check status.prionplatform.com for the status of maintenance",
            ], 503);
    }


    /**
     *  Check the API Status
     *
     */
    protected function apiStatus () {

        $config = config("app.status");
        if ($config) {
            return true;
        }

        return false;

    }

}
