<?php

/*
|---------------------------------------------------------------
|   Internal User API Middleware
|---------------------------------------------------------------
|
|   This handles API requests from external sources. It is
|   setup by the user and the API credentials used are:
|    - internal = 1
|
|   A user must be logged into the API Token to have
|   access to this route
|
*/

namespace App\Http\Middleware;

use Closure;
use Auth;

use App\Helpers\Error;
use App\Exceptions;

class InternalUser
{

    /**
     * A valid API Connection is required, credentials must be marked
     * for internal use.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //
        // TODO: Check if API Credentials Are Valid, Also check if a user is logged in
        //

        // Make Sure Credentials are internally valid
        if (!$token OR !Token::token()->credentials->internal)
            throw new Exceptions\ReturnException(515);

        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

    }

}