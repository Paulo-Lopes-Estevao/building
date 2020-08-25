<?php

namespace Build\BuildATM\Begin;
use Build\BuildATM\Begin\ReusedCredit;


class BuildRemoveMoney{

    /**
     * Construtor do tipo protegido previne que uma nova instância da
     * Classe seja criada através do operador `new` de fora dessa classe.
     */

    private function __construct()
    {
        
    }


    /**
     * Método clone do tipo privado previne a clonagem dessa instância
     * da classe
     *
     * @return void
     */
    private function __clone()
    {
        
    }


    /**
     * Método unserialize do tipo privado para prevenir a desserialização
     * da instância dessa classe.
     *
     * @return void
     */
    private function __wakeup()
    {
        
    }
    

    /**
     * Retorna o levantamento do dinheiro
     *
     * 
     * @param mixed $amount
     * @return int|float|void
     * 
     *
     * @return BuildRemoveMoney A Instância única.
     * 
     */

    public static function removeMoney($amount)
    {
  
            error_reporting(E_ALL & ~E_ERROR & ~E_NOTICE);
            
            try {
                
                $return = new ReusedCredit();
                $vl = $return->setNowCredit($amount);
                $num1 = current($vl);
                $num2 = next($vl);
                $result = $num2 - $num1;
                if (isset($num2) && $num2 > $num1) {
                  
                    return  $result;
                  
                }
                throw new \Exception("your balance is less than {$num1} | Saldo inferior a {$num1}", 10);

                
                

            } catch (\Exception $e) {

                echo json_encode(array(
                    "code"=>$e->getCode(),
                    "message"=>$e->getMessage(),
                    "line"=>$e->getLine()
                ));

                //options close count
                //header("location: index.php");
                //exit;
                 
            }


    }

   

}

?>