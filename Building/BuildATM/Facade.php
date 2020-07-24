<?php

namespace Build\BuildATM;

use Build\BuildATM\Account\RegisterAcess;
use Build\BuildATM\Account\BuildAccount;
use Build\BuildATM\Account\BuildCreateAccount;
use Build\BuildATM\Begin\ProxyBank\BuildDepositProxy;
use Build\BuildATM\SecretRules\RuleCreateFile;
use Build\BuildATM\SecretRules\RuleAccount;
use Build\BuildATM\Begin\BuildRemoveMoney;

class Facade extends RegisterAcess{

    private $account;
    private $bankAccount;
    private $createFileCSV;

public function __construct()
{
    
   $this->GetDecison();
    
}


public static function ChecktAccount(){

   return BuildAccount::VerifyLogin();
}
public static function NullAccount(){

   return BuildAccount::LoginNull();
 }

 public static function UserLogin()
 {
     return BuildAccount::getFromSession();
 }


private function GetDecison()
{   
    $this->SetClass();
    $this->SetMethod();

    $key = key($this->getValue());
    $us = self::UserLogin();
    $uscode = $us->getCode();
    switch ($key) {

        case "deposit":

                
                
                $setdeposit = $this->getdeposit();
                $this->bankAccount->deposit($setdeposit);
                $money = $this->bankAccount->getBalance();
                $this->createFileCSV->CreateCredit($uscode,$money,$setdeposit,0);
                header("Location: index.php");
                exit;

            break;

            case "code":
                $this->account->accessAccount($this->getcode());
                header("Location: iConta.php");
                exit;
            break;

            case 'ribbon':
                
                    $rel[] = $this->getribbon();

                    $remove = BuildRemoveMoney::removeMoney($rel);
                    $this->createFileCSV->CreateCredit($uscode,$remove,0,$rel[0]);
                    header("Location: index.php");
                    exit;
                    
                    
                break;

        
        default:
            echo $key;
            break;
    }
    

        
}


private function SetClass(){

    $this->account = new BuildAccount();
    $this->bankAccount = new BuildDepositProxy();
    $this->createFileCSV = new RuleCreateFile;
    
}

private function SetMethod()
{
   $this->setData($_POST);
}



}



?>