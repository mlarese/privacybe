<?php
/**
 * Created by PhpStorm.
 * User: mauroadmin
 * Date: 27/03/18
 * Time: 16:05
 */

namespace App\Action;


use App\Entity\Config\Owner;
use Slim\Http\Request;
use Slim\Http\Response;

class Home extends AbstractAction
{

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     */
    public function welcome($request, $response, $args) {
        $ow=new Owner();
        $ow->setName('mauro')
        ->setEmail('test@gmail.com');

        $this->emConfig->persist($ow);
        $this->emConfig->flush();

        return $response->withJson(['response'=>'welcome']);
    }

    public function welcomepost($request, $response, $args) {
        return $response->withJson(['response'=>'welcomepost']);
    }

}