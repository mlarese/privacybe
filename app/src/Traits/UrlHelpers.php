<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 21/08/2018
 * Time: 11:05
 */

namespace App\Traits;


use App\DoctrineEncrypt\Encryptors\EncryptorInterface;
use function base64_decode;
use Slim\Container;
use function urldecode;
use function urlencode;

trait UrlHelpers {
    public function urlB64EncodeString(string $str, EncryptorInterface $encryptor = null) {
        if(isset($encryptor)) {
            $str = $encryptor->encrypt($str);
        }
        return  urlencode(base64_encode($str));
    }

    public function urlB64DecodeString(string $str, EncryptorInterface $encryptor = null) {
        $res = urldecode(base64_decode($str));
        if(isset($encryptor)) {
            $res = $encryptor->decrypt($res);

        }
        return $res;
    }

    /**
     * @param string $str
     * @return array
     */
    public function urlB64DecodeToArray(string $str, EncryptorInterface $encryptor = null) {
        $res = [];

        if(isset($encryptor)) {
            $str =$this->urlB64DecodeString ($str, $encryptor);
        } else {
            $str =$this->urlB64DecodeString ($str);
        }

        parse_str($str,$res);
        return $res;
    }

}
