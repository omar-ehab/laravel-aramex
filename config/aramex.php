<?php

return [
    'mode' => env('ARAMEX_MODE', 'test'),

    'base_live_url' => env('BASE_LIVE_URL', 'https://ws.aramex.net/shippingapi.v2'),
    'base_test_url' => env('BASE_TEST_URL', 'https://ws.dev.aramex.net/shippingapi.v2'),

    'live_endpoints' => [
        'location' => '/location/service_1_0.svc?wsdl',
        'shipping' => '/shipping/service_1_0.svc?wsd',
        'pickup' => '/shipping/service_1_0.svc?wsd',
        'tracking' => '/tracking/Service_1_0.svc?wsdl',
    ],

    'test_endpoints' => [
        'location' => '/location/service_1_0.svc?wsdl',
        'shipping' => '/shipping/service_1_0.svc?wsd',
        'pickup' => '/shipping/service_1_0.svc?wsd',
        'tracking' => '/tracking/Service_1_0.svc?wsdl',
    ],

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
