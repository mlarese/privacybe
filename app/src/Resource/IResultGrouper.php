<?php

namespace App\Resource;


interface IResultGrouper
{
    public function group(&$list, $criteria);
}
