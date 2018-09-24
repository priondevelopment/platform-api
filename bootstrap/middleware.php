<?php

/**
|--------------------------------------------------------------------------
| Register Middleware on All Routes
|--------------------------------------------------------------------------
|
| Register global middleware. These items are called on every request.
|
 */

$app->middleware([
    App\Http\Middleware\ApiStatus::class,
    App\Http\Middleware\Cors::class,
    App\Http\Middleware\JsonRequest::class,
    App\Http\Middleware\LogRequests::class,
    App\Http\Middleware\SetLocale::class,
]);


/**
|--------------------------------------------------------------------------
| Register Route Middleware
|--------------------------------------------------------------------------
|
| This middleware is only called on specific routes. The middleware must
| be specified in the routes file or in /bootstrap/routes.php when loading
| the route files.
|
 */

$app->routeMiddleware([
    'external' => App\Http\Middleware\Access\External::class,
    'external.user' => App\Http\Middleware\Access\ExternalUser::class,
    'internal' => App\Http\Middleware\Access\Internal::class,
    'internal.user' => App\Http\Middleware\Access\InternalUser::class,
    'internal.admin' => App\Http\Middleware\Access\Admin::class,
    'admin' => App\Http\Middleware\Access\Admin::class,
]);