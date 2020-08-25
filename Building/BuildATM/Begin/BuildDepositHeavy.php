<?php

namespace Build\BuildATM\Begin;
use Build\BuildATM\Begin\BankFace\BankAccount;
use Build\BuildATM\Begin\ReusedCredit;

class BuildDepositHeavy implements BankAccount
{
    /**
     * Recebe o valor depositado
     * 
     * @var array $money
     * 
     */
    private  $money = [];

    public function deposit(int $amount)
    {
        $this->money[] = $amount;
    }

    /**
     * Retorna o array [ crédito actual & depositado ] 
     * 
     * @return array|int
     * 
     */
    private function transactions(){
        
        $return = new ReusedCredit();

       return $return->setNowCredit($this->money);
    }

    /**
     * Soma o array [ crédito actual & depositado ]
     * 
     * @return int
     * 
     */
    public function getBalance(): int
    {
        // this is the heavy part, imagine all the transactions even from
        // years and decades ago must be fetched from a database or web service
        // and the balance must be calculated from it
        
        return (int) array_sum($this->transactions());
        
    }
}


?>