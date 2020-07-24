<?php

namespace Build\BuildATM\Begin;
use Build\BuildATM\Account\BuildAccount;

class ReusedCredit{



public function getNowCredit(array $money){

    error_reporting(E_ALL & ~E_NOTICE);


    $code=BuildAccount::getFromSession()->getCode();
            $ad = new BuildAccount();
            $data = $ad->ReadData();
            
            foreach ($data as $key => $value) {
                
                foreach($value as $codcred){

                   if ($code == $codcred["Code"]) {
                    $credAtual = $codcred["Credit"];
                   }
 
                }
                

            }
            
                    
           $bool = $ad->VerifyAccess($code);
           $cal = array();
           $money = $money[0];
           array_push($cal,$money,$credAtual);
          return isset($bool) ? ($cal) : BuildAccount::LoginNull();
}





}






?>