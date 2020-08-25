<?php

namespace Build\BuildATM\Account;
use Build\BuildATM\SecretRules\RuleCreateFile;

class ReadCSV{


   /**
     * Instancia da class da base
     *
     * @return \Build\BuildATM\SecretRules\RuleCreateFile
     * 
     */
    private function FileCSV(){
        return new RuleCreateFile();
    }


    /**
     * retorna os dados da base `card`
     *
     * @return array
     * 
     */
    private function cardCSV()
    {
       $hist = $this->FileCSV();
       return $hist->ReadFile("card");
    }


    /**
     * retorna os dados da base `money`
     *
     * @return array
     * 
     */
    private function MoneyCSV()
    {
       $hist = $this->FileCSV();
       return $hist->ReadFile("money");
    }


    /**
     * retorna os dados da base `account`
     *
     * @return array
     * 
     */
    private function accountCSV()
    {
       $hist = $this->FileCSV();
       return $hist->ReadFile("account");
    }


    /**
     * retorna os dados da base `status`
     *
     * @return array
     * 
     */
    private function StatusCSV()
    {
       $hist = $this->FileCSV();
       return $hist->ReadFile("status");
    }
    


    /**
     * junta todos da base e mostra um unico retorno delas
     *
     * @return array
     * 
     */
    public function ReturnCSV()
    {
       $card = $this->cardCSV();
       $account = $this->accountCSV();
       $credit = $this->MoneyCSV();
       $status = $this->StatusCSV();
        
          $Read = [];
          array_push($Read,$account,$card,$status,$credit);
          return $Read;

    }



}


?>