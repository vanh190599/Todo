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

    'facebook' => [
        'client_id' => '1092111527826829',  //client face của bạn
        'client_secret' => '217cc7c5fc5dfb21e67905edcd4723c8',  //client app service face của bạn
        'redirect' => 'http://localhost:8080/eshoper/public/callback' //callback trả về
    ],

    'google' => [
        'client_id' => '179609030877-gj2qgn6cj3c5qjktq4nqbjdknqesh7v6.apps.googleusercontent.com',
        'client_secret' => 'H70usRW0IYGN-FiepKua0u4q',
        'redirect' => 'http://localhost:8080/eshoper/public/google-callback' //callback trả về
    ],
];
