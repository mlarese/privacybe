<?php
namespace GDPR\Resource;


interface ICsvExport
{

    public function setName($name);

    public function setFilename($name);

    public function setHeader($values);

    public function setData($values);

    public function saveFile();

}
