<?php
namespace App\Resource;


abstract class AbstractAdapter
{

    abstract public function setEndpoint($value);
    abstract public function export();
}
