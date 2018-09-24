<?php

/*
|---------------------------------------------------------------
|   External User API Middleware
|---------------------------------------------------------------
|
|   This handles API requests from external sources. It is
|   setup by the user and the API credentials used are:
|    - internal != 1
|
|   A user must be logged into the API Token to have
|   access to this route
|
*/

namespace App\Http\Middleware\Access;

use Closure;

use App\Exceptions\ReturnException;
use App\Helpers\Error;
use App\Exceptions;

class ExternalUser
{

    /**
     * Request Requires a Valid API Connection. User is not required
     * to be logged into account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        //
        // TODO: Make sure API Credentials = Token Are Valid
        // TODO: Make sure User is Logged In (check the token for a valid user, log user in)
        //


        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

    }

}