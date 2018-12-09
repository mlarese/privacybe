<?php
namespace GDPR\Resource;


use Doctrine\ORM\EntityManager;
use Exception;

interface IExportAdapter {
    /**
     * @param EntityManager $entityManager
     *
     * @return mixed
     */
    public function setEntityManager(EntityManager $entityManager);

    public function setOwner($value);



    /**
     * @param $adapter IDirectExport
     * @param $ownerId
     * @param $request \Slim\Http\Request
     * @param $response \Slim\Http\Response
     * @param $args
     *
     * @return mixed
     * @throws Exception
     */
    public function handle($adapter, $ownerId, $request, $response, $args);
}
