<?php

namespace Build\BuildATM\Account;

use Build\BuildATM\Account\ReadCSV;
use Build\BuildATM\Account\RegisterAcess;
use Build\BuildATM\SecretRules\RuleAccount;

class BuildAccount extends RegisterAcess{


    public $ruleAccount;

    public function accessAccount(int $code)
    {
       
        $this->VerifyAccess($code);
    }

    private static function SESSION(){

        $set = BuildAccount::GetClass();
        $set->Card(18);
    
    }

    public static function getFromSession()
	{

		$user = new BuildAccount();

		if (isset($_SESSION[BuildAccount::SESSION()])) {

			$user->setData($_SESSION[BuildAccount::SESSION()]);

		}

		return $user;

	}

    public static function LoginNull(){

        $_SESSION[BuildAccount::SESSION()] = NULL;
    
    }


    private static function GetClass(){
       return new RuleAccount();
    }

    public function ReadData()
    {
        $red = new ReadCSV();
        $as = $red->ReturnCSV();
        return $as;
    }

    
    

    public static function VerifyLogin()
    {
        if (
            !isset($_SESSION[BuildAccount::SESSION()])||
            !$_SESSION[BuildAccount::SESSION()]
        ) {

            header("Location: index.php");
            exit;
        }
        else{
            return $_SESSION[BuildAccount::SESSION()];
        }
    }


    public function VerifyAccess(int $code){
        
        
        $datacc = $this->ReadData();
        foreach($datacc as $key => $view){
        
            foreach ($view as  $value) {
                
                $card = $value["Code"];
                
                
                            if ($code == $card) {
                                $bool = $card++;
                                
                                if ($bool) {
                                    
                                    $us = new BuildAccount();
                                    $us->setData($value);
                                    
                                    
                                     $_SESSION[BuildAccount::SESSION()] = $us->getValue();
                                        
                                     return $us->getValue();
                                    
            
                                }
                                
                            }
                           
                    
                

            }
            
                     
        }

    }


}

?>