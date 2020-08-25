<?php

namespace Build\BuildATM\Begin;
use Build\BuildATM\Account\BuildAccount;
class ReusedCredit{

    /**
     * Recebe o codigo da sessão iniciada  
     *
     * @var mixed $code
     * 
     */
    private $code;


    /**
     * Objecto da class `BuildAccount` 
     *
     * @var mixed $adbuil
     * 
     */
    private $adbuil;

    /**
     *  Recebe o 
     *
     * @var mixed $descode
     * @return \Build\BuildATM\SecretRules\RuleAccount que esta no method `GetClass` da class `BuildAccount`
     */
	private $descode;


    /**
     * Carrega todos class e funçãos
     *
     * @return void
     * 
     */
    private function Code(){

        error_reporting(E_ALL && ~E_NOTICE);

       $this->code=BuildAccount::getFromSession()->getCode();
	   $this->descode=BuildAccount::GetClass();
       $this->adbuil = new BuildAccount();
    }


    /**
     * Retorna as dados das movimentações feita na conta
     *
     * @return mixed
     * 
     */
    public function getNowStatus(){
        $this->Code();

                $data = $this->adbuil->ReadData();
                
                foreach ($data[2] as $key => $value) {
                   
                    foreach ($value as $vl) {
						
						$deshash = $this->descode->DescretPin($value["Code"]);
						$descd = $this->descode->DescretPin($this->code);
                        if ($descd == $deshash) {
                           $xw =explode("$this->code",$vl);
                            $vw = implode("",$xw);
                        $bool = $this->adbuil->VerifyAccess($descd);
                      echo isset($bool)? $vw : 0/*BuildAccount::LoginNull()*/;

                            
                        };
                        
                    }

                  
                }
            
                                        
               
    }

    /**
     * Retorna o valor do crédito da actual conta
     *
     * @return mixed
     * 
     */
    public function getNowCredit(){
        $this->Code();
                
                $data = $this->adbuil->ReadData();

                foreach ($data[3] as $key => $value) {
                   

					$deshash = $this->descode->DescretPin($value["Code"]);
						$descd = $this->descode->DescretPin($this->code);

                       if ($descd == $deshash || $descd == $value["Code"]) {
                        $credAtual = $value["Credit"];
						
                       }
                    
    
                }
           
               $bool = $this->adbuil->VerifyAccess($descd);
              return isset($bool) ? $credAtual : 0/*BuildAccount::LoginNull()*/;
    }

    /**
     * Recebe o valor depositado e retorna um array junto com crédito actual
     *
     * @param array $money
     * 
     * @return array|int
     * 
     */
    public function setNowCredit(array $money){

        $this->Code();

            $data = $this->adbuil->ReadData();
            
            foreach ($data[3] as $key => $value) {
                
				
				$deshash = $this->descode->DescretPin($value["Code"]);
					$descd = $this->descode->DescretPin($this->code);

                   if ($descd == $deshash || $descd == $value["Code"]) {
					
                    $credAtual = $value["Credit"];
                      

                   }
				
       

            }
                          
           $bool = $this->adbuil->VerifyAccess($descd);
           $cal = array();
           $money = $money[0];
           array_push($cal,$money,$credAtual);
           return isset($bool) ? ($cal) : 0/*BuildAccount::LoginNull()*/;
    }





}





?>