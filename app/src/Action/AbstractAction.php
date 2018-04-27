<?php

namespace App\Action;


use Doctrine\ORM\EntityManager;
use Slim\Container;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class AbstractAction
{
    protected $container;
    protected $session;

    public function toJson($obj) {
        $on = new ObjectNormalizer();
        $on->setCircularReferenceLimit(1);
        $on->setCircularReferenceHandler(function ($object) { return $object->getId(); });
        $dtn = new DateTimeNormalizer('Y-m-d');
        $s = new Serializer(array($dtn, $on), array(new JsonEncoder()) );

        return $s->normalize($obj,'json');
    }

    /**
     * AbstractAction constructor.
     * @param $container Container
     */
    public function __construct( $container) {
        $this->container = $container;
        $this->session = $container->get('session');
    }

    /**
     * @return mixed
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @return EntityManager
     */
    public function getEmConfig(): EntityManager
    {
        return $this->container['em-config'];
    }

    /**
     * @return EntityManager
     */
    public function getEmPrivacy($ownerId)
    {
        return $this->buildEntityManager($ownerId);
    }

    /**
     * @return EntityManager
     * @throws \Doctrine\ORM\ORMException
     */
    private function buildEntityManager($ownerId) {
        $settings = $this->container['settings'];

        $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
            $settings['doctrine_privacy']['meta']['entity_path'],
            $settings['doctrine_privacy']['meta']['auto_generate_proxies'],
            $settings['doctrine_privacy']['meta']['proxy_dir'],
            $settings['doctrine_privacy']['meta']['cache'],
            false
        );

        $connection = array(
            'driver'   => $settings['doctrine_privacy']['connection']['driver'],
            'host'     => $settings['doctrine_privacy']['connection']['host'],
            'dbname'   => $settings['doctrine_privacy']['connection']['dbname'] . "_$ownerId",
            'user'     => $settings['doctrine_privacy']['connection']['user'],
            'password' => $settings['doctrine_privacy']['connection']['password']
        );

        $em = \Doctrine\ORM\EntityManager::create($connection , $config);

        return $em;

    }

}