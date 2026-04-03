<?php
return [
    'bkash' => [
        'api_key' => env('BKASH_API_KEY'),
        'api_secret' => env('BKASH_API_SECRET'),
        'callback_url' => env('BKASH_CALLBACK_URL')
    ],
    'ssl' => [
        'store_id' => env('SSL_STORE_ID'),
        'store_password' => env('SSL_STORE_PASSWORD'),
        'base_url' => env('SSL_BASE_URL'),
        'callback_url' => env('SSL_CALLBACK_URL')
    ],
];
