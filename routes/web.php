<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return response()->json([
        'name' => "Prion Platform API",
        'message' => "Welcome to the Prion Platform API. Please visit prionplatform.com to sign up for a free trial and to view our documentation.",
    ]);
});

/*
|--------------------------------------------------------------------------
| Heartbeat
|--------------------------------------------------------------------------
|
|   Is the Prion Platform API alive? Are our systems working?
|
*/
$router->group([
    'prefix' => 'heartbeat',
], function () use ($router) {
    $router->get('/', 'HeartBeatController@index');
    $router->get('db', 'HeartBeatController@db');
    $router->get('cache', 'HeartBeatController@cache');
    $router->
});


/*
|--------------------------------------------------------------------------
| Test Settings Package
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('test/error', "Test\ErrorTestController@test");
$router->get('test/setting/{value}', "SettingTestController@getTest");
