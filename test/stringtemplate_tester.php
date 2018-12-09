<?php
include '../vendor/autoload.php';
$eng = new GDPR\Helpers\StringTemplate\Engine();


$res = $eng->render("test {name} {surname}", ["name"=> "Mauro", "surname"=>"larese"]);

echo $res;
