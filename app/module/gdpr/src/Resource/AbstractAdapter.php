<?php
namespace GDPR\Resource;


abstract class AbstractAdapter
{

    abstract public function setEndpoint($value);
    abstract public function export();
}
