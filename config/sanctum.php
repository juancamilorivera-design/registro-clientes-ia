<?php

use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Laravel\Sanctum\Http\Middleware\AuthenticateSession;

return [

    /*
    |----------------------------------------------------------------------
    | Stateful Domains
    |----------------------------------------------------------------------
    */

    'stateful' => explode(',', env(
        'SANCTUM_STATEFUL_DOMAINS',
        'localhost:3000,localhost'
    )),

    /*
    |----------------------------------------------------------------------
    | Guards
    |----------------------------------------------------------------------
    */

    'guard' => ['web'],

    /*
    |----------------------------------------------------------------------
    | Expiration
    |----------------------------------------------------------------------
    */

    'expiration' => null,

    /*
    |----------------------------------------------------------------------
    | Middleware
    |----------------------------------------------------------------------
    */

    'middleware' => [
        'authenticate_session' => AuthenticateSession::class,
        'encrypt_cookies' => EncryptCookies::class,
        'validate_csrf_token' => ValidateCsrfToken::class,
    ],

];
