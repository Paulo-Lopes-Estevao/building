<?php

namespace Build\BuildATM\SecretRules;


class RuleAccount{

    /**
     * Retorno das funções
     * | Return of functions
     * 
     * @return void
     * 
     */
    private function Secret(){
	    error_reporting(E_ALL && ~E_NOTICE);
        define('SECRET_IV', pack('a16', 'buildatm'));
        define('SECRET', pack('a16', 'buildatm'));
    }


    /**
     * Criptografa o `Code`
     * | Encrypts the `Code`
     * @param int $num
     * 
     *@return string|false
     * 
     */
   public function SecretPin(int $num){
        $this->Secret();
        return openssl_encrypt($num,'AES-128-CBC',SECRET,0,SECRET_IV);
    }


    /**
     * Descriptografa o `Code`
     * | Decrypts the `code`
     * 
     * @param mixed $numhash
     * 
     *@return string|false
     * 
     */
   public function DescretPin($numhash){
       $this->Secret();
       return openssl_decrypt($numhash, 'AES-128-CBC', SECRET, 0, SECRET_IV);
    }

    
    /**
     * Retorna um número aleatório único
     * | Returns a single random number
     * 
     * @param int $length
     * 
     *@return string|false
     * 
     */
    public static function Card(int $length=4){
        return substr(uniqid(mt_rand()),0,$length);
    }



}


?>