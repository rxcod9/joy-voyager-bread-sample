<?php

return [

    /*
     * If enabled for voyager-bread-sample package.
     */
    'enabled' => env('VOYAGER_BREAD_SAMPLE_ENABLED', true),

    /*
     * The config_key for voyager-bread-sample package.
     */
    'config_key' => env('VOYAGER_BREAD_SAMPLE_CONFIG_KEY', 'joy-voyager-bread-sample'),

    /*
     * The route_prefix for voyager-bread-sample package.
     */
    'route_prefix' => env('VOYAGER_BREAD_SAMPLE_ROUTE_PREFIX', 'joy-voyager-bread-sample'),

    /*
    |--------------------------------------------------------------------------
    | Controllers config
    |--------------------------------------------------------------------------
    |
    | Here you can specify voyager controller settings
    |
    */

    'controllers' => [
        'namespace' => 'Joy\\VoyagerBreadSample\\Http\\Controllers',
    ],

    /*
    |--------------------------------------------------------------------------
    | Database Config
    |--------------------------------------------------------------------------
    |
    | Here you can specify voyager database settings
    |
    */

    'database' => [
        'autoload_migrations' => env('VOYAGER_BREAD_SAMPLE_DATABASE_AUTOLOAD_MIGRATIONS', true),
    ],
];
