<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        'routesFile' => [
          '/api' => __DIR__ . '/../routes/api.routes.php',
          '/' => __DIR__ . '/../routes/web.routes.php'
        ],

        // Renderer settings
        'view' => [
            'template_path' => __DIR__ . '/../templates',
            'cache_path' => __DIR__ . '/../cache/templates'
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
    ],
];
