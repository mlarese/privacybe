<?php
// DIC configuration
use App\Action\Emails\PlainTemplateBuilder;
use App\Batch\DeferredPrivacyBatch;
use App\Batch\EmailSender;
use App\Batch\EntityManagerBuilder;
use App\DoctrineEncrypt\Encryptors\OpenSslEncryptor;
use App\Service\AttachmentsService;
use App\Service\DeferredPrivacyService;
use GuzzleHttp\Client;
use Slim\App;

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
    $couponService = new \App\Action\SendOneCoupon();
    $settings = $container->get('settings');

    if(isset($settings['StoreOne']) && isset($settings['StoreOne']['url'])){
        $couponService->setUrl($settings['StoreOne']['url']);
    }

    return $couponService;
};

$container['couponStoreOne'] = function ($container) {
    $couponService = new \App\Action\StoreOneCoupon();
    $settings = $container->get('settings');

    if(isset($settings['StoreOne']) && isset($settings['StoreOne']['url'])){
        $couponService->setUrl($settings['StoreOne']['url']);
    }

    return $couponService;
};

$container['csv'] = function ($container) {

    $exportService = new \App\Resource\MailOneCsvExport();

    return $exportService;
};


$container['mailone'] = function ($container) {
    $settings = $container->get('settings');
    $exportService = new \App\Resource\MailOneDirectExport($container);

    return $exportService;
};

$container['email_client'] = function ($container) {
    $settings = $container->get('settings');
    $options = $settings['mailservice'];
    $exportService = new Client($options);

    return $exportService;
};



$container['csv_direct'] = function ($container) {

    $exportService = new \App\Resource\MailOneDirectExportAdapter(null);

    return $exportService;
};

$container['encryptor'] = function ($container) {
    $settings = $container->get('settings');
    $options = $settings['doctrine_privacy'];

    $enc = new OpenSslEncryptor($options['encryption_key']);
    return $enc;
};


$container['mailone_direct'] = function ($container) {

    $exportService = new \App\Resource\MailOneDDirectExportAdapter(null);

    return $exportService;
};


$container['direct'] = function ($container) {

    $exportService = new \App\Resource\MailOneDDirectExportAdapter(null);

    return $exportService;
};


$container['direct_handler'] = function ($container) {

    $exportService = new \App\Resource\MailOneDirectExportHandler();

    return $exportService;
};


$container['mailone_direct_service'] = function ($container) {


    return null;
};


$container['direct_service'] = function ($container) {
    $settings = $container->get('settings');

    $exportService = \App\Service\MailOneService::getInstance($settings['MailOne'],true);

    return $exportService;
};

$container['deferred_privacy_service'] = function  ($container) use($app){
    $s = new DeferredPrivacyService();
    $s->config($app);

    return $s;
};

$container['slim_app'] = function  ($container) use($app){
    return $app;
};

$container['entity-manager_builder'] = function ($container) {
    return new EntityManagerBuilder($container);
};

$container['email_sender'] = function ($container) {
    return new EmailSender($container);
};
$container['dbl_optin_template_builder'] = function ($container) {
    $bld = new PlainTemplateBuilder();
    $bld->setTemplateName('double-optin');
    return $bld;
};

$container['deferred_privacy_batch'] = function ($container) {
    /** @var EntityManagerBuilder $emb */
    $emb = $container->get('entity-manager_builder');
    /** @var EmailSender $emsnd */
    $emsnd= $container->get('email_sender');

    return new DeferredPrivacyBatch($emb,$container,$emsnd);
};

$container['action_handler'] = function ($container) {
    $actionHandler = new \App\Action\ActionHandler($container);
    return $actionHandler;
};

$container['attachmentsService'] = function ($container) {
    $obj = new AttachmentsService($container);
    return $obj;
};

