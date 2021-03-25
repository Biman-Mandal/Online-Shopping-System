<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
    'client_id' => '618826989366-q0v7f77j6o23do6rlfvag67mmtn38hmo.apps.googleusercontent.com',
    'client_secret' => '',
    'redirect' => 'http://localhost:8000/Google/auth/callback',
    ],

    'facebook' => [
    'client_id' => '',
    'client_secret' => 'e06aa894b60f1f59eff352dac9f1b969',
    'redirect' => 'http://localhost:8000/facebook/auth/callback',
    ],

];
