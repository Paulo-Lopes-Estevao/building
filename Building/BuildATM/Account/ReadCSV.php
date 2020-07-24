<?php

namespace Build\BuildATM\Account;
use Build\BuildATM\SecretRules\RuleCreateFile;

class ReadCSV{


    private function FileCSV(){
        return new RuleCreateFile();
    }

    private function cardCSV()
    {
       $hist = $this->FileCSV();
       return $hist->ReadFile("card");
    }

    private function MoneyCSV()
    {
       $hist = $this->FileCSV();
       return $hist->ReadFile("money");
    }

    private function accountCSV()
    {
       $hist = $this->FileCSV();
       return $hist->ReadFile("account");
    }
    
    public function ReturnCSV()
    {
       $card = $this->cardCSV();
       $account = $this->accountCSV();
       $credit = $this->MoneyCSV();
        
          $Read = [];
          array_push($Read,$account,$card,$credit);
          return $Read;

    }



}


?>