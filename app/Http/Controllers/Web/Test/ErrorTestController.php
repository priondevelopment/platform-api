<?php

namespace App\Http\Controllers\Web\Test;

use App\Http\Controllers;
use Error\Exceptions;

class ErrorTestController extends Controllers\Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function test()
    {
        $json = [
           'message' => "Here is a message",
        ]
        throw new Exceptions\JsonException( json_encode($json) );
    }
}
