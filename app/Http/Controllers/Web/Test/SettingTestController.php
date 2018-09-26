<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers;

class SettingTestController extends Controllers\Controller
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

    public function set($value)
    {
        $key = 'test';
    }
}
