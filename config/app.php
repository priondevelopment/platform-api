<?php

return [

    /**
    |--------------------------------------------------------------------------
    | Check the API Status
    |--------------------------------------------------------------------------
    |
    | This allows us to easily turn on/off the API
    |
    */

    'status' => env('API_STATUS', true),


    /**
    |--------------------------------------------------------------------------
    | Name and URL of API
    |--------------------------------------------------------------------------
    |
    | This allows us to easily turn on/off the API
    |
    */

    'site_title' => "Prion Platform",
    'site_url' => env('SITE_URL', "https://www.prionplatform.com"),


    /**
    |--------------------------------------------------------------------------
    | API Company Address
    |--------------------------------------------------------------------------
    |
    | This allows us to easily turn on/off the API
    |
    */

    'street' => "The Street Address",
    'city' => "Gold Coast",
    'state' => "Queensland",
    'zip' => "12345",


    /*
    |--------------------------------------------------------------------------
    | Default Country
    |--------------------------------------------------------------------------
    |
    | This allows us to easily turn on/off the API
    |
    */

    'default_country' => env('COUNTRY_DEFAULT', 1),


    /*
    |--------------------------------------------------------------------------
    | Default Language
    |--------------------------------------------------------------------------
    |
    | This allows us to easily turn on/off the API
    |
    */

    'language' => env('LANGUAGE', 'EN'),


    /*
    |--------------------------------------------------------------------------
    | Default Webmaster Email
    |--------------------------------------------------------------------------
    |
    | This allows us to easily turn on/off the API
    |
    */

    'webmaster' => [
        'email' => "it@prionplatform.com",
    ],

    'users' => [
        'email' => "it@prionplatform.com",
        'name' => "Prion Platform",
    ],

];