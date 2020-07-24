<?php

namespace Build\BuildATM\Account;
use Build\BuildATM\SecretRules\RuleAccount;
use Build\BuildATM\SecretRules\RuleCreateFile;


class BuildCreateAccount extends RegisterAcess{

    
    private $acess;
    private $verify;
    public $session;

    private function Guard()
    {

        $Ra = new RuleAccount();
        $RCF = new RuleCreateFile();
        $Ra->Card();
        $empdata = $Ra->SecretPin($this->getpin()); 
        $Data=array($this->getnome(),$empdata);
        $datasecurity = array($Data);
        $revert = $datasecurity;

        $verifypin = $this->verify;
        if ($this->getpin() == $verifypin) {
            
            echo("Codigo Já esta a ser usado".PHP_EOL);
        }
        else {
            
            //$RCF->CreateFile($revert);
            //$card = $RCF->CreateCard($Ra);
            
        }
       
        
    }

    

    public function Verify(){
        $RCF = new RuleCreateFile();
        $read = $RCF->readfile("account");
        $this->acess = $read;
        $Ra = new RuleAccount();
        $date = $this->acess;
        $pin = $this->getpin();  
        foreach ($date as $key => $value) {
            $pinhash = $value["Pin"];
            $verify = $Ra->DescretPin($pinhash);
            while ($pin == $verify) {
               $bool = $verify ++;
               
               if ($bool) {
                $this->verify = $bool;
                //$_SESSION[BuildCreateAccount::SESSION] = $value;
               }
               
            }
            
            

        }
        
        

    }

    public function Access()
    { 
        
       $this->Verify();
       $this->Guard(); 

    } 


}
