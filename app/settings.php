<?php

use Monolog\Logger;

return [
    'settings' => [
        'displayErrorDetails' => getenv('IS_DEBUG'),
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/views/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../log/app.log',
            'level' => Logger::DEBUG,
        ],
    ],
];
