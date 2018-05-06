<?php

namespace App\Action;


use App\Entity\Config\Enc;
use Slim\Http\Request;
use Slim\Http\Response;

class Test extends AbstractAction
{
    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     */
    public function welcome($request, $response, $args) {
        return $response->withJson(["result" => "welcome"]);
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
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
     */
    public function testEncRead($request, $response, $args) {



        $r = $this->getEmConfig()->find(Enc::class,11);



        return $response->withJson(["result" => "encrypted ", "cl"=>  $this->toJson($r) ]);
    }
}
