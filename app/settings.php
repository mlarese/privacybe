<?php

/**
 *  Abilitare per update in database locale
 */
// return require 'settings_local.php';

return [
    'settings' => [
        'label' => 'production',
        'applications' => [
            'apps' => [
                'doctrine_upgrade' => function ($path){return $path == 'upgrade';},
                'doctrine_privacy' => function ($path){return true;},
            ]
        ],
        'MailOne' => [
            'entrypoint' => 'http://www.mail-one.it/mailone/xml.php',
            'mmuser' => 'admin',
            'mmpassword' => '80c90326274099981dc47961023fb56924901085',
        ],
        // monolog settings
        'logger' => [
            'name' => 'app',
            'path' => __DIR__ . '/../log/app.log',
        ],
        'auth' => [
            'secret' => '##scr##mm#prv##tk##str@@secret@**'
        ],
        'session' => [
            // Session cookie settings
            'name'           => 'slim_session',
            'lifetime'       => 240,
            'path'           => '/',
            'domain'         => null,
            'secure'         => true,
            'httponly'       => true,

            // Set session cookie path, domain and secure automatically
            'cookie_autoset' => true,

            // Path where session files are stored, PHP's default path will be used if set null
            'save_path'      => null,

            // Session cache limiter
            'cache_limiter'  => 'nocache',

            // Extend session lifetime after each user activity
            'autorefresh'    => true,

            // Encrypt session data if string is set
            'encryption_key' => 'eShVmYq3t6w9z$C&F)J@McQfTjWnZr4u',

            // Session namespace
            'namespace'      => 'privacy_app'
        ],
        'doctrine_config' => [
            'encryption_key' => 'o71aD2Ep.Gj4I<5KL6MN7OP_qR98>-UW',
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
                'host'     => '10.0.28.1',
                'dbname'   => 'privacy_config',
                'user'     => 'prvcfg',
                'password' => '7d4UXHCeRhyeWbPe',
            ]
        ],
        'doctrine_privacy' => [
            'encryption_key' => 'o71aD2Ep.Gj4I<5KL6MN7OP_qR98>-UW',
            'meta' => [
                'entity_path' => [
                    'app/src/Entity/Privacy'
                ],
                'auto_generate_proxies' => true,
                'proxy_dir' =>  __DIR__.'/../cache/proxies',
                'cache' => null,
            ],
            'dynamic_db' => [
                'db'       => 'privacy',
                'user'     => 'prvusr',
                'password' => 'fm7bKMWAHVD3thGn',
            ],
            'connection' => [
                'driver'   => 'pdo_mysql',
                'host'     => '10.0.28.1',
                'dbname'   => 'privacy',
                'user'     => 'prvcfg',
                'password' => '7d4UXHCeRhyeWbPe',
            ]
        ],
        'doctrine_upgrade' => [
            'meta' => [
                'entity_path' => [
                    'app/src/Entity/Upgrade'
                ],
                'auto_generate_proxies' => true,
                'proxy_dir' =>  __DIR__.'/../cache/proxies',
                'cache' => null,
            ],
            'connection' => [
                'driver'   => 'pdo_mysql',
                'host'     => '10.0.28.1',
                'dbname'   => 'gdpr_upgrade',
                'user'     => 'gdprupgrade',
                'password' => 'JGXMOHFnj4EPfnYP',
            ]
        ]
    ],
];
