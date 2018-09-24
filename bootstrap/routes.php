<?php

/**
 * Web
 * @Publicly Available Routes
 *
 * These routes are available to anyone on the internet.
 */
$app->router->group([
    'namespace' => 'App\Http\Controllers\Web',
], function ($router) {
    require __DIR__.'/../routes/web.php';
});


/**
 * External
 * @External API Routes
 *
 * The API is split into to different segments, external and internal.
 *
 * The external API is available to all API credentials. It physically limits the number of routes available to
 * the users on the Prion Platform. These routes provide the user access to data, but provides an easy way to add
 * protection for routes that should only be used by the Prion Platform
 */
$app->router->group([
    'namespace' => 'App\Http\Controllers\Api',
    'middleware' => ['external'],
], function ($router) {
    require __DIR__.'/../routes/external.php';
});


/**
 * External User
 * @External User API Routes
 *
 * The API is split into to different segments, external and internal.
 *
 * The external user routes require valid API credentials and for a user to be logged into the API.
 * A user id is associated with an API Token when a user logs in with a valid request.
 */
$app->router->group([
    'namespace' => 'App\Http\Controllers\User',
    'middleware' => ['external','external.user'],
], function ($router) {
    require __DIR__.'/../routes/external-user.php';
});


/**
 * Internal
 * @Internal API Credentials
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
 * Internal User
 * @Internal User Admin API
 *
 * The API is split into to different segments, external and internal.
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
    'middleware' => ['internal','admin'],
    'prefix' => 'admin',
], function ($router) {
    require __DIR__.'/../routes/admin.php';
});