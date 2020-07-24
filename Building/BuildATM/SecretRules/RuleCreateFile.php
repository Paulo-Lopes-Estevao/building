<?php

namespace Build\BuildATM\SecretRules;

use Build\BuildATM\Facade;

class RuleCreateFile{

    private $resgister =[];
    private $datatime; 

    private function GetDate(){
        
        $data = date("d/m/Y H:i:s");
       return $this->datatime = $data;
    }

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

    public function CreateCredit(int $cad,int $money,int $deposit, int $outcredit)
    {

      $date =[];
      $this->GetDate();
      $code = $cad;
      array_push($date,$money,$code,$deposit,$outcredit,$this->datatime);
      $newfile = fopen("Account/Bank/money.csv","a");
      fwrite($newfile,implode(", ",$date) . "\r\n");
      fclose($newfile);
    }

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