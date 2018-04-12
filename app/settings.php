<?php
return [
    'settings' => [
        // monolog settings
        'logger' => [
            'name' => 'app',
            'path' => __DIR__ . '/../log/app.log',
        ],
        'auth' => [
            'secret' => '##scr##mm#prv##tk##str@@'
        ],
        'doctrine_config' => [
            'meta' => [
                'entity_path' => [
                    'app/src/Entity/Config'
                ],
                'auto_generate_proxies' => true,
                'proxy_dir' =>  __DIR__.'/../cache/proxies',
                'cache' => null,
            ],
            'connection' => [
                'driver'   => 'pdo_mysql',
                'host'     => '127.0.0.1',
                'dbname'   => 'privacy_config',
                'user'     => 'root',
                'password' => '',
            ]
        ],
        'doctrine_privacy' => [
            'meta' => [
                'entity_path' => [
                    'app/src/Entity/Privacy'
                ],
                'auto_generate_proxies' => true,
                'proxy_dir' =>  __DIR__.'/../cache/proxies',
                'cache' => null,
            ],
            'connection' => [
                'driver'   => 'pdo_mysql',
                'host'     => '127.0.0.1',
                'dbname'   => 'privacy',
                'user'     => 'root',
                'password' => '',
            ]
        ]
    ],
];
