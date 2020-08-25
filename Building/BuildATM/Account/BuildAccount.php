<?php

namespace Build\BuildATM\Account;

use Build\BuildATM\Account\ReadCSV;
use Build\BuildATM\Account\RegisterAcess;
use Build\BuildATM\SecretRules\RuleAccount;

class BuildAccount extends RegisterAcess{

    /**
     * Recebe o número o codigo do card para acessar a conta
     *
     * @param int $code
     */
    public function accessAccount(int $code)
    {
       
        $this->VerifyAccess($code);
        
    }

    /**
     * retorna caracter unica sem repetição de forma aleatório
     *
     * @return void
     *
     */
    private static function SESSION(){

        $set = BuildAccount::GetClass();
        $set->Card(18);
    
    }

    /**
     * Retorna os dados da sessão iniciada
     *
     * @return \Build\BuildATM\Account\BuildAccount
     *
     */
    public static function getFromSession()
	{

		$user = new BuildAccount();

		if (isset($_SESSION[BuildAccount::SESSION()])) {

			$user->setData($_SESSION[BuildAccount::SESSION()]);

		}

		return $user;

	}

    /**
     * Anula os dados carregados na sessão
     *
     * @return void null
     *
     */
    public static function LoginNull(){

        $_SESSION[BuildAccount::SESSION()] = NULL;
    
    }


    /**
     * Carrega os metódos da class para serem usado a qualquer momento
     *
     * @return \Build\BuildATM\SecretRules\RuleAccount
     *
     */
    public static function GetClass(){
       return new RuleAccount();
    }

    /**
     * Lê e carrega todos os dados 
     * 
     * 
     * @method ReturnCSV
     * @return array 
     */
    public function ReadData()
    {
        $red = new ReadCSV();
        $as = $red->ReturnCSV();
        return $as;
    }

    
    
    /**
     * Verifica se o usuário esta logado 
     * 
     * 
     * @return mixed
     * 
     * @return exit sai da conta
     * @return else  fica da logado
     * 
     * 
     */
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


    /**
     * Fazer o login na conta 
     * 
     * @param mixed $code
     * @return mixed
     * 
     * @return true quando o codigo inserido corresponde o codigo registrado
     * @return false  quando o codigo inserido não corresponde o codigo registrado
     * 
     */
    public function VerifyAccess($code){
        
        
        $datacc = $this->ReadData();
        foreach($datacc as $key => $view){
        
            foreach ($view as  $value) {
                
                $card = $value["Code"];
                
					$set = BuildAccount::GetClass();
					$verify = $set->DescretPin($card);
				
                            if ($code == $verify) {
                                $bool = $verify++;
 
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