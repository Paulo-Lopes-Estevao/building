<?php

namespace Build\BuildATM\SecretRules;

use Build\BuildATM\Facade;

class RuleCreateFile{

  /**recebe os dados
   * 
   * @var array $resgister
   * 
   */
    private $resgister =[];
    
    
    /** recebe a data e hora
     * 
     * 
     */
    private $datatime; 


    /**
     * Retorno da hora e data da maquina
     * | Return of functions
     * 
     * @return string|false
     * 
     */
    private function GetDate(){
        
        $data = date("d/m/Y H:i:s");
       return $this->datatime = $data;
    }

    /**
     * Cadastrar um novo usuário
     *
     * 
     *@param mixed $resgister recebe todos os dados para o registro
     *
     *@return void
     * 
     */
    public function CreateFile($resgister)
    {
        $this->resgister = $resgister;
        $this->GetDate();
        $newfile = fopen("Account/Bank/account.csv","a");
        array_push($resgister[0],$this->datatime);
        $value = array_values($resgister[0]);
        fwrite($newfile,implode(", ",$value) . "\r\n");
        fclose($newfile);

    }


    /**
     * Cadastrar um novo usuário
     *
     * 
     *@param \Build\BuildATM\SecretRules\RuleAccount $cad
     *
     *@return void
     * 
     */
    public function CreateCard(RuleAccount $cad)
    {  
       $result = [0=>$cad->Card()];
      
       for ($i=0; $i <= 10; $i++) { 
            
        $data = [$i=>$this->resgister];

       }
    
       $date =[];
       $pin = $data[10][0][1];
       $code = $result[0];
      array_push($date,$code,$pin);
      $newfile = fopen("Account/Bank/card.csv","a");
      fwrite($newfile,implode(", ",$date) . "\r\n");
      fclose($newfile);

    }


    /**
     * Depositar dinheiro na conta
     *
     * 
     *
     *@param mixed $cad recebe o `Code`
     *
     *@param int $money recebe o valor da soma do crédito e deposito
     *
     *@param int $deposit recebe o deposito
     *
     *@param int $outcredit mostra o valor que saiu na conta
     *
     *@return void
     * 
     * 
     */
    public function CreateCredit($cad,int $money,int $deposit, int $outcredit=0)
    {

      $date =[];
      $this->GetDate();
      $code = $cad;
      array_push($date,$money,$code,$deposit,$outcredit,$this->datatime);
      $newfile = fopen("Account/Bank/money.csv","a");
      fwrite($newfile,implode(", ",$date) . "\r\n");
      fclose($newfile);
    }



    /**
     * Guarda as movimentações na conta
     *
     * 
     *
     *@param mixed $cad recebe o `Code`
     *
     *@param int $trans mostra o valor transferido
     *
     *@param int $deposit recebe o deposito
     *
     *@param int $outcredit mostra o valor que saiu na conta
     *
     *@return void
     * 
     * 
     */
    public function CreateStatusBank($cad,int $deposit,int $trans = 0,int $outcredit){

      $date =[];
      $this->GetDate();
      $code = $cad;
      array_push($date,$code,$deposit,$trans,$outcredit,$this->datatime);
      $newfile = fopen("Account/Bank/status.csv","a");
      fwrite($newfile,implode(", ",$date) . "\r\n");
      fclose($newfile);
        
    }


    /**
     * Lê os dados guardados
     *
     * 
     *@param string $whatfile
     *
     *@return array
     * 
     */
    public function ReadFile(string $whatfile)
    {
        $visfile = fopen("Account/Bank/{$whatfile}.csv","r+");

        $headers = explode(",", fgets($visfile));

	    $data = array();

	    while ($row = fgets($visfile)) {

		$rowData = explode(",", $row);
		$linha = array();

		for ($i=0; $i < count($headers); $i++) { 
			
			$linha[$headers[$i]] = $rowData[$i];

		}

		array_push($data, $linha);

	    }

	    fclose($visfile);

	    return($data);

    }




}




?>