<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie', 'login', 'logout', '*'],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'http://localhost',
        'http://127.0.0.1',
        'http://localhost:80',
        'http://localhost:5500',
        'http://127.0.0.1:5500',
        'http://attendance-management-system.test',
        'http://192.168.1.9:5500',
        'http://192.168.1.9',
        'http://192.168.1.7:5500',
        'http://192.168.1.7',
        'http://192.168.1.3',
        'http://192.168.1.3:80',
    ],

    'allowed_origins_patterns' => [
        '*.ngrok.io',
        '*.ngrok-free.app',
        '*.ngrok.dev',
        '*.desiccative-approvingly-juanita.ngrok-free.dev'
    ],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,
];
