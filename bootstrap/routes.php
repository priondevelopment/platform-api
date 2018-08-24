<?php

/**
 * Unrestricted Routes
 *
 */
$app->router->group([
    'namespace' => 'App\Http\Controllers\Unrestricted',
    'middleware' => 'external',
], function ($router) {
    require __DIR__.'/../routes/unrestricted.php';
});


/**
 * API Only Routes
 *
 * The request must have valid API credetials to use these routes
 */
$app->router->group([
    'namespace' => 'App\Http\Controllers\Api',
    'middleware' => ['external'],
], function ($router) {
    require __DIR__.'/../routes/api.php';
});


/**
 * Authorized User Routes
 *
 * Only an authorized, active API request and a logged in user can user these routes
 */
$app->router->group([
    'namespace' => 'App\Http\Controllers\User',
    'middleware' => ['external','external.user'],
], function ($router) {
    require __DIR__.'/../routes/user.php';
});


/**
 * Internal API Credentials
 *
 * Internal is used for things like the main website, app, etc.
 * Only an authorized, active API marked for internal use have these routes available
 */
$app->router->group([
    'namespace' => 'App\Http\Controllers\Admin',
    'middleware' => ['internal'],
    'prefix' => 'admin',
], function ($router) {
    require __DIR__.'/../routes/internal.php';
});


/**
 * Internal API Credentials with Logged in User
 *
 * Internal is used for things like the main website, app, etc.
 * Request must be an autorized, interal API request with a logged in user
 */
$app->router->group([
    'namespace' => 'App\Http\Controllers\Admin',
    'middleware' => ['internal','internal.user'],
    'prefix' => 'admin',
], function ($router) {
    require __DIR__.'/../routes/internal-user.php';
});


/**
 * Admin Routes, Authorized Admin User
 *
 * API required internal authentication.
 * User must be logged in with admin access.
 */
$app->router->group([
    'namespace' => 'App\Http\Controllers\Admin',
    'middleware' => ['internal','internal.admin'],
    'prefix' => 'admin',
], function ($router) {
    require __DIR__.'/../routes/admin.php';
});