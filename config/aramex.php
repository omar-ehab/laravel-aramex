<?php

return [
    'mode' => env('ARAMEX_MODE', 'test'),

    'test' => [
        'country_code' => env('ARAMEX_TEST_COUNTRY_CODE'),
        'entity' => env('ARAMEX_TEST_ENTITY'),
        'number' => env('ARAMEX_TEST_NUMBER'),
        'pin' => env('ARAMEX_TEST_PIN'),
        'username' => env('ARAMEX_TEST_USERNAME'),
        'password' => env('ARAMEX_TEST_PASSWORD')
    ],

    'live' => [
        'country_code' => env('ARAMEX_LIVE_COUNTRY_CODE'),
        'entity' => env('ARAMEX_LIVE_ENTITY'),
        'number' => env('ARAMEX_LIVE_NUMBER'),
        'pin' => env('ARAMEX_LIVE_PIN'),
        'username' => env('ARAMEX_LIVE_USERNAME'),
        'password' => env('ARAMEX_LIVE_PASSWORD'),
    ],

    'shipper' => [
        'name' => '',
        'email' => '',
        'mobile' => '',
        'company' => '',
        'address' => [
            'line1' => '',
            'line2' => ' ',
            'post_code' => '',
            'city' => '',
            'country_code' => '',
            'state_or_province_code' => ''
        ]
    ],

    'third_party' => [
        'name' => '',
        'email' => '',
        'mobile' => '',
        'company' => '',
        'address' => [
            'line1' => '',
            'line2' => '',
            'post_code' => '',
            'city' => '',
            'country_code' => '', //should be same account country code
            'state_or_province_code' => ''
        ]
    ],

    'kit' => [
        'height' => '',
        'width' => '',
        'length' => '',
        'weight' => ''
    ]
];
