<?php

namespace Build\BuildATM\Begin\ProxyBank;
use Build\BuildATM\Begin\BuildDepositHeavy;
use Build\BuildATM\Begin\BankFace\BankAccount;

class BuildDepositProxy extends BuildDepositHeavy implements BankAccount
{
    /**
     * Retorna o valor da soma do crédito actual e valor depositado
     * 
     * @var int $balance
     * 
     */
    private $balance = null;


    /**
     * Retorna o crédito 
     * 
     * @return int
     * 
     */
    public function getBalance(): int
    {
        // because calculating balance is so expensive,
        // the usage of BankAccount::getBalance() is delayed until it really is needed
        // and will not be calculated again for this instance

        if ($this->balance === null) {

            $this->balance = parent::getBalance();
    
        }

       return $this->balance;
       
    }
}

?>