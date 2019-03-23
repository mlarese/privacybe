<?php
// DIC configuration
use RKA\SessionMiddleware;

use GDPR\Action\Emails\PlainTemplateBuilder;
use GDPR\Batch\DeferredPrivacyBatch;
use GDPR\Batch\EmailSender;
use GDPR\Batch\EntityManagerBuilder;
use GDPR\DoctrineEncrypt\Encryptors\OpenSslEncryptor;
use GDPR\Helpers\StringTemplate\Engine;
use GDPR\Service\AttachmentsService;
use GDPR\Service\DeferredPrivacyService;
use Tuupola\Middleware\CorsMiddleware;
use Slim\Http\Request;
use Slim\Http\Response;

use GuzzleHttp\Client;

$container = $app->getContainer();

// -----------------------------------------------------------------------------
// Service factories
// -----------------------------------------------------------------------------

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings');
    $logger = new \Monolog\Logger($settings['logger']['name']);
    $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
    $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['logger']['path'], \Monolog\Logger::DEBUG));
    return $logger;
};

$container['dyn-privacy-db'] = function ($c) {
    $settings = $c->get('settings');
    return $settings['doctrine_privacy']['dynamic_db'];
};

// Doctrine
$container['em-config'] = function ($c) {
    $settings = $c->get('settings');

    $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
        $settings['doctrine_config']['meta']['entity_path'],
        $settings['doctrine_config']['meta']['auto_generate_proxies'],
        $settings['doctrine_config']['meta']['proxy_dir'],
        $settings['doctrine_config']['meta']['cache'],
        false
    );

    $subscriber = new \App\DoctrineEncrypt\Subscribers\DoctrineEncryptSubscriber(
        new \Doctrine\Common\Annotations\AnnotationReader(),
        new \App\DoctrineEncrypt\Encryptors\OpenSslEncryptor($settings['doctrine_config']['encryption_key'])
    );


    $em = \Doctrine\ORM\EntityManager::create($settings['doctrine_config']['connection'], $config);
    $eventManager = $em->getEventManager();
    $eventManager->addEventSubscriber($subscriber);

    return $em;
};


/**
 * Super user privacy entity manager
 * @param $c
 *
 * @return \Doctrine\ORM\EntityManager
 */
$container['em-su-privacy'] = function ($c) {
    $settings = $c->get('settings');
    $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
        $settings['doctrine_privacy']['meta']['entity_path'],
        $settings['doctrine_privacy']['meta']['auto_generate_proxies'],
        $settings['doctrine_privacy']['meta']['proxy_dir'],
        $settings['doctrine_privacy']['meta']['cache'],
        false
    );

    $subscriber = new \App\DoctrineEncrypt\Subscribers\DoctrineEncryptSubscriber(
        new \Doctrine\Common\Annotations\AnnotationReader(),
        new \App\DoctrineEncrypt\Encryptors\OpenSslEncryptor($settings['doctrine_privacy']['encryption_key'])
    );
    $em = \Doctrine\ORM\EntityManager::create($settings['doctrine_privacy']['connection'], $config);
    $eventManager = $em->getEventManager();
    $eventManager->addEventSubscriber($subscriber);

    return $em;
};

$container['em-privacy'] = function ($c) {
    $settings = $c->get('settings');
    $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
        $settings['doctrine_privacy']['meta']['entity_path'],
        $settings['doctrine_privacy']['meta']['auto_generate_proxies'],
        $settings['doctrine_privacy']['meta']['proxy_dir'],
        $settings['doctrine_privacy']['meta']['cache'],
        false
    );


    $subscriber = new \App\DoctrineEncrypt\Subscribers\DoctrineEncryptSubscriber(
        new \Doctrine\Common\Annotations\AnnotationReader(),
        new \App\DoctrineEncrypt\Encryptors\OpenSslEncryptor($settings['doctrine_privacy']['encryption_key'])
    );
    $em = \Doctrine\ORM\EntityManager::create($settings['doctrine_privacy']['connection'], $config);
    $eventManager = $em->getEventManager();
    $eventManager->addEventSubscriber($subscriber);

    return $em;
};

$container['session'] = function ($container) {
    return new \Adbar\Session(
        $container->get('settings')['session']['namespace']
    );
};


$container['sendCoupon'] = function ($container) {
    $couponService = new \GDPR\Action\SendOneCoupon();
    $settings = $container->get('settings');

    if (isset($settings['StoreOne']) && isset($settings['StoreOne']['url'])) {
        $couponService->setUrl($settings['StoreOne']['url']);
    }

    return $couponService;
};

$container['couponStoreOne'] = function ($container) {
    $couponService = new \GDPR\Action\StoreOneCoupon();
    $settings = $container->get('settings');

    if (isset($settings['StoreOne']) && isset($settings['StoreOne']['url'])) {
        $couponService->setUrl($settings['StoreOne']['url']);
    }

    return $couponService;
};

$container['email_client'] = function ($container) {
    $settings = $container->get('settings');
    $options = $settings['mailservice'];
    $exportService = new Client($options);

    return $exportService;
};


$container['encryptor'] = function ($container) {
    $settings = $container->get('settings');
    $options = $settings['doctrine_privacy'];

    $enc = new OpenSslEncryptor($options['encryption_key']);
    return $enc;
};


$container['csv'] = function ($container) {

    $exportService = new \GDPR\Resource\MailOneCsvExport();

    return $exportService;
};


$container['mailone'] = function ($container) {
    $settings = $container->get('settings');
    $exportService = new \GDPR\Resource\MailOneDirectExport($container);

    return $exportService;
};


$container['mailup'] = function ($container) {

    $settings = $container->get('settings');
    $exportService = new \GDPR\Resource\MailUpDirectExport($container);

    return $exportService;
};


$container['csv_direct'] = function ($container) {

    $exportService = new \GDPR\Resource\MailOneDirectExportAdapter(null);

    return $exportService;
};

$container['mailone_direct'] = function ($container) {

    $exportService = new \GDPR\Resource\MailOneDDirectExportAdapter(null);

    return $exportService;
};

$container['mailup_direct'] = function ($container) {

    $exportService = new \GDPR\Resource\MailUpDirectExportAdapter(null);

    return $exportService;
};


$container['direct'] = function ($container) {

    $exportService = new \GDPR\Resource\MailOneDDirectExportAdapter(null);

    return $exportService;
};


$container['direct_handler'] = function ($container) {

    $exportService = new \GDPR\Resource\MailOneDirectExportHandler();

    return $exportService;
};


$container['mailone_direct_service'] = function ($container) {


    return null;
};


$container['mailup_direct_service'] = function ($container) {

    $settings = $container->get('settings');

    $exportService = \GDPR\Service\MailUpService::getInstance($settings['MailUp'], true);

    return $exportService;
};

$container['direct_service'] = function ($container) {
    $settings = $container->get('settings');

    $exportService = \GDPR\Service\MailOneService::getInstance($settings['MailOne'], true);

    return $exportService;
};

$container['deferred_privacy_service'] = function ($container) use ($app) {
    $s = new DeferredPrivacyService();
    $s->config($app);

    return $s;
};

$container['slim_app'] = function ($container) use ($app) {
    return $app;
};

$container['entity-manager_builder'] = function ($container) {
    return new EntityManagerBuilder($container);
};

$container['email_sender'] = function ($container) {
    return new EmailSender($container);
};

$container['template_builder'] = function ($container) {
    $bld = new PlainTemplateBuilder();
    return $bld;
};

$container['dbl_optin_template_builder'] = function ($container) {
    $bld = new PlainTemplateBuilder();
    $bld->setTemplateName('double_optin');
    return $bld;
};
$container['news_unsub_email_notif_template_builder'] = function ($container) {
    $bld = new PlainTemplateBuilder();
    $bld->setTemplateName('news_unsub_email_notif');
    return $bld;
};
$container['deferred_privacy_batch'] = function ($container) {
    /** @var EntityManagerBuilder $emb */
    $emb = $container->get('entity-manager_builder');
    /** @var EmailSender $emsnd */
    $emsnd = $container->get('email_sender');

    return new DeferredPrivacyBatch($emb, $container, $emsnd);
};

$container['action_handler'] = function ($container) {
    $actionHandler = new \GDPR\Action\ActionHandler($container);
    return $actionHandler;
};

$container['attachments_service'] = function ($container) {
    $obj = new AttachmentsService($container);
    return $obj;
};

$container['string_template'] = function ($container) {
    $obj = new Engine();
    return $obj;
};
$container['middleware-jwt'] = function ($container) {


    /**
     * @var Collection $settings
     */
    $settings = $container->get('settings');

    $auth = $settings->get('auth');

    return new Tuupola\Middleware\JwtAuthentication([
        "path" => ["/api", "/api/auth"],
        "ignore" => [
            "/api/widgetreq",
            "/api/widgetcomp",
            "/api/widget",
            "/api/auth/login",
            "/api/auth/pwdres",
            "/api/test",
            "/api/surfer",
            "/api/import/dataone/upgrade",
            "/api/import/mailone/newsletter",
            "/api/import/abs/structure/reservation",
            "/api/import/abs/portal/reservation",
            "/api/import/abs/enquiry",
            "/api/import/abs/storeone",
            "/api/import/advancedimporter/preset",
            "/api/import/advancedimporter/import",
        ],
        "secret" => $auth['secret'],
        "secure" => false,
        "attribute" => "token",
        // "relaxed" => ["localhost"],
        "before" => function ($request, $arguments) {
            /** @var Request $request */
            // print_r($arguments);
            $isUpdate = $request->isDelete() || $request->isPatch() || $request->isPost() || $request->isPut();

            if ($isUpdate) {
                // print_r($arguments['decoded']['user']->acl);
                // die(  'end');
                // $user = $arguments['decoded']['user'] ;
                // print_r(user);

            }

            return $request;
        },
        "after" => function (Response $response, $arguments) {
            $canGoOn = true;
            if ($canGoOn) return $response;
            else return $response->withStatus(401);
        },
        "error" => function ($response, $arguments) {
            $data["status"] = "error";
            $data["message"] = $arguments["message"];
            return $response
                ->withHeader("Content-Type", "application/json")
                ->getBody()->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
        }
    ]);


};

$container['middleware-cors'] = function ($container) {
    return new CorsMiddleware(
        [
            "origin" => ["*"],
            "methods" => ["GET", "POST", "PUT", "PATCH", "DELETE", "OPTIONS"],
            "headers.allow" => [
                "Ref",
                "Language",
                "TermId",
                "Content-Type",
                "Authorization",
                "If-Match",
                "If-Unmodified-Since",
                "User-Agent",
                "Connection",
                "Pragma",
                "Accept",
                "Accept-Encoding",
                "Accept-Language",
                "Token",
                "OwnerId",
                "Domain",
                "Page"
            ],
            "headers.expose" => ["Etag"],
            "credentials" => true,
            "cache" => 86400,
            "error" => function ($request, $response, $arguments) {
                $data["status"] = "error";
                $data["message"] = $arguments["message"];
                return $response
                    ->withHeader("Content-Type", "application/json")
                    ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
            }
        ]
    );
};

$container['middleware-test'] = function ($container) {
    return function ($request, $response, $next) {
        $response->getBody()->write('It is now ');
        $response = $next($request, $response);
        $response->getBody()->write('. Enjoy!');

        return $response;
    };
};

$container['server-oauth2'] = function ($container) {
    $storage = $container->get('em-config');


    $clientStorage = $storage->getRepository('API\Entity\OAuthClient');
    $userStorage = $storage->getRepository('API\Entity\OAuthUser');
    $accessTokenStorage = $storage->getRepository('API\Entity\OAuthAccessToken');
    $authorizationCodeStorage = $storage->getRepository('API\Entity\OAuthAuthorizationCode');
    $refreshTokenStorage = $storage->getRepository('API\Entity\OAuthRefreshToken');


    $server = new \OAuth2\Server([
        'client_credentials' => $clientStorage,
        'user_credentials' => $userStorage,
        'access_token' => $accessTokenStorage,
        'authorization_code' => $authorizationCodeStorage,
        'refresh_token' => $refreshTokenStorage,
    ], [
        'auth_code_lifetime' => 30,
        'refresh_token_lifetime' => 30,
        'access_lifetime' => 3600,
    ]);


    $server->addGrantType(new OAuth2\GrantType\ClientCredentials($clientStorage));

    $server->addGrantType(new \OAuth2\GrantType\AuthorizationCode($authorizationCodeStorage));
    $server->addGrantType(new \OAuth2\GrantType\RefreshToken($refreshTokenStorage, [
        // the refresh token grant request will have a "refresh_token" field
        // with a new refresh token on each request
        'always_issue_new_refresh_token' => true,
    ]));

    return $server;

};
$container['middleware-oauth2'] = function ($container) {

    $server = $container->get('server-oauth2');


    return new  \Chadicus\Slim\OAuth2\Middleware\Authorization($server, $container);
};