<?php

namespace GDPR\Resource;


interface IResultGrouper
{
    public function group(&$list, $criteria);
}
