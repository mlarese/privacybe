<?php

namespace App\Resource\Privacy;


use App\DoctrineEncrypt\Encryptors\EncryptorInterface;
use function is_array;
use function trim;

class GeneralDataIntegrator
{
    /** @var EncryptorInterface */
    private $encryptor;

    /**
     * @return EncryptorInterface
     */
    public function getEncryptor(): EncryptorInterface {
        return $this->encryptor;
    }

    /**
     * @param EncryptorInterface $encryptor
     */
    public function setEncryptor(EncryptorInterface $encryptor): void {
        $this->encryptor = $encryptor;
    }
    public function integrate(&$record)
    {
        // $record['email'] = trim($record['email']);

        if(isset($record['domain']) && isset($record['site']))
           $record['page'] = $record['domain'].$record['site'] ;


        if(isset($record['page']))
            $record['referrer'] = $record['page'];

        if(isset($record['privacy']['referrer']))
            $record['referrer'] =  $record['privacy']['referrer'];



        $record['denomination'] = $record['surname'].' '.$record['name'] ;

        $record['_flags_'] = [];


        if(isset( $this->encryptor)) {
            if(!isset($record['properties'])) {
                $record['properties'] = [ "note"=>"nota base"];
            } else {
                if(  isset($record['properties']["note"]  )) {
                    $note = $record['properties']["note"];
                    if($note!=='')
                        $record['properties']["note"] = $this->encryptor->decrypt($note);
                }
            }
        }
        if(is_array($record['privacyFlags']))
            foreach ($record['privacyFlags'] as $pf) {
                $unsub = false;
                $user='';
                if(isset($pf['unsubscribe']))  $unsub = true;
                if(isset($pf['user']))  $user = $pf['user'];

                $record['_flags_'][] = ["code" => $pf['code'], "selected" => $pf['selected'], "user" => $user, "unsubscribe" => $unsub, "mandatory" => $pf['mandatory']];

            }

        return $record;
    }
}
