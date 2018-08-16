<?php

/**
 * Admin Routes, Authorized Admin User
 *
 */
$app->router->group([
        'namespace' => 'App\Http\Controllers\Admin',
    ], function ($router) {
        require __DIR__.'/../routes/admin.php';
    });

/**
 * API Only Routes
 *
 */
$app->router->group([
        'namespace' => 'App\Http\Controllers\Api',
    ], function ($router) {
        require __DIR__.'/../routes/api.php';
    });

/**
 * Unrestricted Routes
 *
 */
$app->router->group([
        'namespace' => 'App\Http\Controllers\Unrestricted',
    ], function ($router) {
        require __DIR__.'/../routes/unrestricted.php';
    });

/**
 * Authorized User Routes
 *
 */
$app->router->group([
        'namespace' => 'App\Http\Controllers\User',
    ], function ($router) {
        require __DIR__.'/../routes/user.php';
    });