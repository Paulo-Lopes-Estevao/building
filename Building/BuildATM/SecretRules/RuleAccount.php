<?php

namespace Build\BuildATM\SecretRules;




class RuleAccount{


    private function Secret(){

        define('SECRET_IV', pack('a16', 'buildatm'));
        define('SECRET', pack('a16', 'buildatm'));
    }

   public function SecretPin(int $num){
        return openssl_encrypt($num,'AES-128-CBC',SECRET,0,SECRET_IV);
    }

   public function DescretPin($numhash){
       return openssl_decrypt($numhash, 'AES-128-CBC', SECRET, 0, SECRET_IV);
    }

    public static function Card(int $length=4){
        return substr(uniqid(mt_rand()),0,$length);
    }



}


?>