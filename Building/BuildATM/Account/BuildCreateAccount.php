<?php

namespace Build\BuildATM\Account;
use Build\BuildATM\SecretRules\RuleAccount;
use Build\BuildATM\SecretRules\RuleCreateFile;


class BuildCreateAccount {


    /**
     * Instancia da class
     * 
     * @return RuleCreateFile
     * 
     */
    private $RCF;


    /**
     * Instancia da class
     * 
     * @return RuleAccount
     * 
     */
    private $Ra;


    /**
     * Carrega os dados da base 
     * 
     * @var array
     * 
     */
    private $acess;


    /**
     * retorna os do card para serem comparados
     * 
     * @return mixed 
     * 
     */
    private $verify;


     /**
     * Saida dos dados do input name
     * 
     * @return string $Name
     * @var null $Code
     * 
     */
    private $Name,$Code;


    /**
     * Guarda os dados na base após a insersão 
     * 
     * @return false quando os dados inseridos já estão registrados
     * 
     */
    private function Guard()
    {
        $this->RClass();

        $gercode= $this->Ra->Card();
        $geriban= $this->Ra->Card(9);

        $empdata = $this->Ra->SecretPin($gercode);

        $Data=array($this->Name,$empdata,$geriban);

        $datasecurity = array($Data);

        $revert = $datasecurity;

        $verifypin = $this->verify;
	
	
			if(!empty($this->Name)){
				
			if ($verifypin == $gercode)
		{ 
            echo("Actualiza a Pagina");
        }
        else {
            
            $this->RCF->CreateFile($revert);
            $card = $this->RCF->CreateCard($this->Ra);
			
			header("Location: index.php?cd=".$gercode);
			exit;
            
        }
			}
		
		
       
        
       
        
    }

    private function RClass(){
        $this->RCF = new RuleCreateFile();
        $this->Ra = new RuleAccount();
    }

    
    /**
     * Carrega os dados da base para serem verificados com dados da insersão 
     * 
     * 
     */
    public function Verify(){
        
        $this->RClass();
        
        $read = $this->RCF->readfile("account");

        $this->acess = $read;

        

        $date = $this->acess;

        foreach ($date as $key => $value) {

            $pinhash = $value["Code"];
            
            $verify = $this->Ra->DescretPin($pinhash);
            
			
            if($verify) {

               $bool = $verify ++;
               
               if ($bool) {
                
                $this->verify = $bool;

               }
               
            }
            
            

        }
        
        

    }


    /**
     * Verifica se o usuário esta logado 
     * 
     * @return else  fica da logado
     * 
     */
    public function Create(string $name)
    { 
        $this->Name = $name;
       $this->Verify();
       $this->Guard(); 

    } 


}
