<?php

return [
    'credentials' => [
        'merchant_id' => env('PAYTR_MERCHANT_ID'),
        'merchant_salt' => env('PAYTR_MERCHANT_SALT'),
        'merchant_key' => env('PAYTR_MERCHANT_KEY'),
    ],
    'options' => [
        'base_uri' => env('PAYTR_BASE_URI', 'https://www.paytr.com'),
        'timeout' => env('PAYTR_TIMEOUT', 0),
        'success_url' => env('PAYTR_SUCCESS_URL'),
        'fail_url' => env('PAYTR_FAIL_URL'),
        'test_mode' => env('PAYTR_TEST_MODE', true),
        'debug_mode' => env('PAYTR_DEBUG_MODE', true),
    ]
];