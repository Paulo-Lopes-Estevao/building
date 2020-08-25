<?php

namespace Build\BuildATM;

use Build\BuildATM\Account\RegisterAcess;
use Build\BuildATM\Account\BuildAccount;
use Build\BuildATM\Account\BuildCreateAccount;
use Build\BuildATM\Begin\ProxyBank\BuildDepositProxy;
use Build\BuildATM\SecretRules\RuleCreateFile;
use Build\BuildATM\Begin\BuildRemoveMoney;
use Build\BuildATM\Begin\ReusedCredit;

class Facade extends RegisterAcess{

    private $account;
    private $createAccount;
    private $bankAccount;
    private $createFileCSV;
    public $vwcredit;

   /** Inicia
    * 
    * @return void
    */
    public function __construct()
    {
    
         $this->GetDecison();
  
    }

/** 
 *Verifica se o usuário esta logado
 * 
 * @return mixed
 */
public static function ChecktAccount(){

   return BuildAccount::VerifyLogin();
   
}

/**
 * Anula os dados carregados na sessão
 * 
 *
 * @return void
 * 
 */
public static function NullAccount(){

   return BuildAccount::LoginNull();
 }


 /**
  * Retorna os dados da sessão iniciada
  * 
  * @return \Build\BuildATM\Account\BuildAccount
  */
 public static function UserLogin()
 {
     return BuildAccount::getFromSession();
     
 }

/**
 * 
 * 
 * @return void
 */
private function GetDecison()
{   error_reporting(E_ALL && ~E_NOTICE);
    $this->SetClass();
    $this->SetMethod();
    
    $key = key($this->getValue());

    $us = self::UserLogin();

    $uscode = $us->getCode();
    
    $getcode = $_GET["cd"];
	echo $getcode? "Conta criada com sucesso o seu Code é : <h1>{$getcode}</h1>" : "" ;
    
    switch ($key) {

        case "deposit":

                          
                $setdeposit = $this->getdeposit();

                $this->bankAccount->deposit($setdeposit);

                $money = $this->bankAccount->getBalance();
                $money == 0 ?$this->createFileCSV->CreateCredit($uscode,$setdeposit,$setdeposit,0) : $this->createFileCSV->CreateCredit($uscode,$money,$setdeposit,0); 

                $this->createFileCSV->CreateStatusBank($uscode,$setdeposit,0,0);
                
                header("Location: index.php");
                exit;

            break;

            case "nome":
               
                $this->createAccount->Create($this->getnome());
				
                
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
                    $this->createFileCSV->CreateStatusBank($uscode,0,0,$rel[0]);
                    
                    header("Location: index.php");
                    exit;
                   
                    
                    
                break;

        
        default:
            return false;
            break;
    }
    

        
}

/** Instancia das class
 * 
 * @return void
 */
private function SetClass(){

    $this->account = new BuildAccount();
    $this->bankAccount = new BuildDepositProxy();
    $this->createFileCSV = new RuleCreateFile;
    $this->vwcredit = new ReusedCredit();
    $this->createAccount = new BuildCreateAccount();
     
    
}


/** Recebe os dados dos formulário
 * 
 * @return void
 */
private function SetMethod()
{
   $this->setData($_POST);
}



}



?>