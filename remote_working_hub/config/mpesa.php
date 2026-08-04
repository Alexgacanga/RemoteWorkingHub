<?php

return[
    'env' => env('MPESA_ENV', 'sandbox'),
    'customer' => env('MPESA_CONSUMER_KEY'),
    'secret' => env('MPESA_CONSUMER_SECRET'),
    'shortcode' => env('MPESA_SHORTCODE'),
    'validation_url' => env('MPESA_VALIDATION_URL'),
    'confirmation_url' => env('MPESA_CONFIRMATION_URL'),
];
