<?php

namespace Build\BuildATM\Begin\BankFace;

interface BankAccount
{
    public function deposit(int $amount);

    public function getBalance(): int;
}


?>