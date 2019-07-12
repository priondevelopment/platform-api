<?php

namespace App\Http\Controllers;

class HeartBeatController extends Controller
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

    /**
     * Can We Access the Site Itselt?
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function index()
    {
        return response(['status' => 1]);
    }

    /**
     * Test the DB Connections
     */
    public function db()
    {

    }

    /**
     * Is the cache running and available?
     */
    public function cache()
    {

    }
}
