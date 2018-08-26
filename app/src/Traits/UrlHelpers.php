<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 21/08/2018
 * Time: 11:05
 */

namespace App\Traits;


use function base64_decode;
use function urldecode;

trait UrlHelpers {
    public function urlB64EncodeString(string $str) {
        return  urldecode(base64_encode($str));
    }

    public function urlB64DecodeString(string $str) {
        return urldecode(base64_decode($str));
    }

    /**
     * @param string $str
     * @return array
     */
    public function urlB64DecodeToArray(string $str) {
        $res = [];
        parse_str($this->urlB64DecodeString ($str),$res);
        return $res;
    }

}
