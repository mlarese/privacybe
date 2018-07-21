<?php

require_once "../../vendor/autoload.php";

use App\DoctrineEncrypt\Encryptors\OpenSslEncryptor;
use App\Service\DeferredPrivacyService;


$privacy = '{"termId":"695b81a4-3d94-435a-9cef-14be3523ed30","paragraphs":[{"text":"test","treatments":[{"code":"dati_personali","restrictive":false,"mandatory":true,"text":"test dati","selected":true},{"code":"newsletter","restrictive":false,"mandatory":false,"text":"test news","selected":false}],"scrolled":false,"title":"Test","scrollText":""}],"language":"it","ownerId":34,"referrer":"http://localhost:3000/owners/users/add"}';
$privacy = json_decode($privacy,true);

$flags = '[{"code":"dati_personali","selected":true,"mandatory":true,"termId":"695b81a4-3d94-435a-9cef-14be3523ed30"},{"code":"newsletter","selected":true,"mandatory":false,"termId":"695b81a4-3d94-435a-9cef-14be3523ed30"}]';
$flags = json_decode($flags,true);



$enc = new OpenSslEncryptor('o29aH2Bp.Sj2I<0DL2CR7UZ_dG98>-FB');

$nenc = $enc->encrypt("mauro larese");
$denc = $enc->decrypt($nenc);

echo "$nenc = $denc";

die(0);


$ds = new DeferredPrivacyService();

$dflags = $ds->emptyFlags($flags);
$dprivacy = $ds->emptyPrivacy($privacy);

print_r($flags);
print_r($privacy);
print_r($dflags);
print_r($dprivacy);
