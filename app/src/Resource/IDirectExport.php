<?php
namespace App\Resource;


interface IDirectExport
{

    public function setOwner($value);

    public function setName($value); // nome della campagna

    public function setEmail($email); // mail di invio della campagna

    public function setReplyEmail($email); // mail di risposta della campagna

    public function setAction($action); // create,delete,add

    public function setSource($data); // è la contaclist

    public function export();
}
