<?php

require_once __DIR__.'/../vendor/autoload.php';

try {
    (new Dotenv\Dotenv(__DIR__.'/../'))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //
}

/**
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that serves as the central piece of this framework. We'll use this
| application as an "IoC" container and router for this framework.
|
*/

$app = new Laravel\Lumen\Application(
    realpath(__DIR__.'/../')
);

// $app->withFacades();

$app->withEloquent();

/**
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Now we will register a few bindings in the service container. We will
| register the exception handler and the console kernel. You may add
| your own bindings here if you like or you can make another file.
|
*/

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    Error\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);


/**
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Next, we will register the middleware with the application. These can
| be global middleware that run before and after each request into a
| route or middleware that'll be assigned to some specific routes.
|
*/

require_once __DIR__.'/../bootstrap/middleware.php';


/**
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/

// $app->register(App\Providers\AppServiceProvider::class);
 $app->register(App\Providers\AuthServiceProvider::class);
// $app->register(App\Providers\EventServiceProvider::class);
$app->register(\Illuminate\Notifications\NotificationServiceProvider::class);


/**
|--------------------------------------------------------------------------
| Configure Redis
|--------------------------------------------------------------------------
|
| Configure redis to work with our platform.
|
*/

$app->register(Illuminate\Redis\RedisServiceProvider::class);


/**
|--------------------------------------------------------------------------
| Load Configuration Files
|--------------------------------------------------------------------------
|
| Include all configuration files. Please note, we might be loading
| configuration files twice. One from composer.json and the other from
| the code below.
|
 */

$app->configure('app');
$app->configure('database');


/**
|--------------------------------------------------------------------------
| Load Additional Service Providers
|--------------------------------------------------------------------------
|
| Let's load additional service providers.
|
*/

$app->register(Geography\GeographyServiceProvider::class);
$app->register(Setting\SettingServiceProvider::class);
$app->register(Error\ErrorServiceProvider::class);
$app->register(Api\ApiServiceProvider::class);


/**
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.
|
*/

require_once __DIR__.'/../bootstrap/routes.php';

return $app;