<?php

namespace App\Action;


use App\Entity\Config\Enc;
use App\Helpers\UploadsManager;
use Exception;
use Psr\Http\Message\StreamInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\UploadedFile;

class Test extends AbstractAction
{
    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     */
    public function welcome($request, $response, $args) {

        $c = $request->getCookieParams();
        return $response->withJson(["result" => "welcome", 'c'=>$c]);
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     *
     * @return mixed
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function testEnc($request, $response, $args) {
        $e = new Enc();

        $e
            ->setName('Mauro')
            ->setForm('{"name":"mauro"}')
        ;


        $this->getEmConfig()->persist($e);
        $this->getEmConfig()->flush();



        return $response->withJson(["result" => "encrypted " . $e->getId()]);
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     *
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function testEncRead($request, $response, $args) {

        $r = $this->getEmConfig()->find(Enc::class,11);


        return $response->withJson(["result" => "encrypted ", "cl"=>  $this->toJson($r) ]);
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     */
    public function upload($request, $response, $args) {

        try {
            /** @var UploadedFile $f */

            $f = ($request->getUploadedFiles())['upload'];

            $fi = new UploadsManager( $f->file) ;

            return $response->withJson($this->success());
        } catch (Exception $e) {
            echo $e->getMessage()     ;
            return $response->withStatus(500, 'Error');
        }

    }
}
