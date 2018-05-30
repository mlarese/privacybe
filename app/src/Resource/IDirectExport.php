<?php
namespace App\Resource;


interface IDirectExport
{

    public function setName($value);

    public function setEmail($email);

    public function setReplyEmail($email);

    public function setAction($action);

    public function setSource($data);

    public function export();
}
