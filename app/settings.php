<?php

/**
 *  Decommentare per update del database  locale
 */
// return require 'settings_local.php';

return [
    'settings' => [
        'attachments' => [
          'users' => [
              'path' => '/repository/dataone/owners/{ownerId}/privacy/{privacyId}',
              'spf_path' => '/home/dataone/attachments/repository/dataone/owners/%s/users/%s/attachments',
              'ftp_server' => '10.0.20.201',
              'ftp_user_name' => 'dataone-upload',
              'ftp_user_pass' => 'DeonjuKod9Jity'
          ]
        ],
        "dataone_emails" => [
            '_options_' => [
                'dev' => [
                    'fe_address' => 'http://localhost:3000'
                ],
                'prod' => [
                    'fe_address' => 'https://privacy.dataone.online'
                ],
                "callcenter_email" => "beatrice.breseghello@mm-one.com"
            ],
            'subscription_info_email' => [
                'all' => [
                    "dictionary" => [
                        "email_subject" => [
                            "it" => "Le tue preferenze",
                            "en" => "Your preferences",
                            "de" => "Ihre Vorlieben"
                        ]
                    ]
                ],
            ],

            'notify_unsub_news_executed' => [
                'all' => [
                    "dictionary" => [
                        "email_subject" => [
                            "it" => "Disiscrizione da newsletter",
                            "en" => "Newsletters unsubscribe"
                        ]
                    ]
                ]
            ],
            'news_unsub_email_notif' => [
                'all' => [
                    "dictionary" => [
                        "email_subject" => [
                            "it" => "Richiesta di disiscrizione da newsletter",
                            "en" => "Newsletters unsubscribe request"
                        ]
                    ]
                ],
                'dev' => [
                    'confirm_link' => 'http://localhost:3000/#/surfer/newsunsubemailnotif'
                ],
                'prod' => [
                    'confirm_link' => 'https://privacy.dataone.online/#/surfer/newsunsubemailnotif'
                ]
            ],
            'notify_privacy_mod_executed' => [
                'all' => [
                    "dictionary" => [
                        "email_subject" => [
                            "it" => "Modifiche privacy"
                        ]
                    ]
                ]
            ],
            'notify_mod_accepted' => [
                'all' => [
                    "dictionary" => [
                        "email_subject" => [
                            "it" => "Richiesta di modifiche privacy"
                        ]
                    ]
                ]
            ],
            'change_password' => [
                'all' => [
                    "dictionary" => [
                        "email_subject" => [
                            "it" => "Cambio password account dataone"
                        ]
                    ]
                ]
            ],
            'double_optin' => [
                'all' => [
                    "dictionary" => [
                        "email_subject" => [
                            "it" => "Conferma le tue preferenze",
                            "en" => "Confirm your preferences",
                            "de" => "Bestätigen Sie Ihre Präferenzen"
                        ]
                    ]
                ],
                'dev' => [
                    'confirm_link' => 'http://localhost:3000/#/surfer/confirmdeferred'
                ],
                'prod' => [
                    'confirm_link' => 'https://privacy.dataone.online/manager/#/surfer/confirmdeferred'
                ]
            ],
            'mailup/error' => [
                'all' => [
                    "dictionary" => [
                        "email_subject" => [
                            "it" => "Mail up integration warning"
                        ]
                    ]
                ]
            ],
        ],

        'label' => 'production',
        'applications' => [
            'apps' => [
                'doctrine_upgrade' => function ($path){return $path == 'upgrade';},
                'doctrine_privacy' => function ($path){return true;},
            ]
        ],
        'mailservice' => [
            'base_uri' => 'https://servicehub.abs-one.com/ecommerce/send-email',
            'timeout' => 3,
        ],
        'MailOne' => [
            'entrypoint' => 'http://www.mail-one.it/mailone/xml.php',
            'mmuser' => 'admin',
            'mmpassword' => '80c90326274099981dc47961023fb56924901085',
        ],
        'MailUp' => [
            'entrypoint' => 'mailup/entrypoint'
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
        'doctrine_bi' => [
            'meta' => [
                'entity_path' => [
                    'app/src/Entity/Bi'
                ],
                'auto_generate_proxies' => true,
                'proxy_dir' =>  __DIR__.'/../cache/dconfig/proxies',
                'cache' => null,
            ],
            'connection' => [
                'driver'   => 'pdo_mysql',
                'host' => '10.30.0.11',
                'port' => '3306',
                'dbname' => 'abs_datamart',
                'user'    => 'root',
                'password' => 'sZ2YgBnkR9',
                'charset'  => 'utf8',
            ]
        ],
        'doctrine_config' => [
            'encryption_key' => 'o71aD2Ep.Gj4I<5KL6MN7OP_qR98>-UW',
            'meta' => [
                'entity_path' => [
                    'app/src/Entity/Config'
                ],
                'auto_generate_proxies' => true,
                'proxy_dir' =>  __DIR__.'/../cache/dconfig/proxies',
                'cache' => null,
            ],
            'connection' => [
                'driver'   => 'pdo_mysql',
                'host'     => '10.0.28.110',
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
                'proxy_dir' =>  __DIR__.'/../cache/dprivacy/proxies',
                'cache' => null,
            ],
            'dynamic_db' => [
                'db'       => 'privacy',
                'user'     => 'prvusr',
                'password' => 'fm7bKMWAHVD3thGn',
            ],
            'connection' => [
                'driver'   => 'pdo_mysql',
                'host'     => '10.0.28.110',
                'dbname'   => 'privacy_64',
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
                'proxy_dir' =>  __DIR__.'/../cache/dup/proxies',
                'cache' => null,
            ],
            'connection' => [
                'driver'   => 'pdo_mysql',
                'host'     => '10.0.28.110',
                'dbname'   => 'gdpr_upgrade',
                'user'     => 'gdprupgrade',
                'password' => 'JGXMOHFnj4EPfnYP',
            ]
        ]
    ],
];
