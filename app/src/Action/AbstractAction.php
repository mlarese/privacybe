<?php

namespace App\Action;


use Doctrine\ORM\EntityManager;
use Exception;
use function print_r;
use Slim\Container;
use Slim\Http\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class AbstractAction
{
    protected $container;

    protected $session;

    protected $context;

    public function toJson($obj) {

        $on = new ObjectNormalizer();
        $on->setCircularReferenceLimit(1);
        $on->setCircularReferenceHandler(function ($object) { return $object->getId(); });

        $dtn = new DateTimeNormalizer('Y-m-d');
        $s = new Serializer(array($dtn, $on), array(new JsonEncoder()) );

        return $s->normalize($obj,'json');
    }

    /**
     * @param $name
     * @param $collection
     *
     * @return mixed
     * @throws Exception
     */
    protected function getAttribute($name, $collection, $mandatory=false) {
        if(isset($collection[$name])) {
            return $collection[$name];
        }

        if($mandatory) {
            throw new Exception("$name not found");
        } else {
            return null;
        }
    }
    /**
     * AbstractAction constructor.
     * @param $container Container
     */
    public function __construct( $container) {
        $this->container = $container;
        $this->session = $container->get('session');
        $this->context = $container->get('settings')['applicationContext'];
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
     * @param $ownerId
     * @return EntityManager
     * @throws \Doctrine\ORM\ORMException
     */
    public function getEmPrivacy($ownerId)
    {
        return $this->buildEntityManager($ownerId);
    }

    /**
     * @param $request Request
     * @return array
     */
    public function getToken ($request) {
        return $token = $request->getAttribute("token");
    }

    /**
     * @param $request Request
     * @return \stdClass
     */
    public function getUserData ($request) {
        $token = $this->getToken($request);
        return  $token['user'];
    }

    /**
     * @param $request Request
     * @return string
     */
    public function getOwnerId ($request) {
        $user = $this->getUserData($request);
        return $user->ownerId;
    }
    /**
     * @return EntityManager
     * @throws \Doctrine\ORM\ORMException
     */
    private function buildEntityManager($ownerId) {
        $settings = $this->container['settings'];

        $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
            $settings[$this->context]['meta']['entity_path'],
            $settings[$this->context]['meta']['auto_generate_proxies'],
            $settings[$this->context]['meta']['proxy_dir'],
            $settings[$this->context]['meta']['cache'],
            false
        );


        $connection = array(
            'driver'   => $settings[$this->context]['connection']['driver'],
            'host'     => $settings[$this->context]['connection']['host'],
            'dbname'   => $settings[$this->context]['connection']['dbname'],
            'user'     => $settings[$this->context]['connection']['user'],
            'password' => $settings[$this->context]['connection']['password']
        );
        if($ownerId!==null) {
            $connection['dbname'] =  $settings[$this->context]['connection']['dbname'] . "_$ownerId";
        }

        $em = \Doctrine\ORM\EntityManager::create($connection , $config);

        return $em;

    }

    protected function success () {
        return ["success"=>true];
    }

    /**
     * @param $sql
     * @return bool
     * @throws \Doctrine\DBAL\DBALException
     */
    protected function executeConfigSql($sql) {
        $stmt = $this->getEmConfig()->getConnection()->prepare($sql);
        return $stmt->execute();
    }
}
