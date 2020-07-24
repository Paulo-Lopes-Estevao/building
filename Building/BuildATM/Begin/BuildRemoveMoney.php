<?php

namespace Build\BuildATM\Begin;
use Build\BuildATM\Begin\ReusedCredit;
use Build\BuildATM\ErrorATM\HandlErro;


class BuildRemoveMoney{

    private $Remove;

    private function __construct()
    {
        
    }

    private function __clone()
    {
        
    }

    private function __wakeup()
    {
        
    }

    public static function removeMoney($amount)
    {
        
       

        set_error_handler(function($code, $message, $file, $line){


            try {

                $return = new ReusedCredit();
                $vl = $return->getNowCredit($amount);
                $num1 = current($vl);
                $num2 = next($vl);
                $result = $num2 - $num1;
                if (isset($num2) && $num2 > $num1) {
                  
                    return  $result;
                  
                }
                throw new \Exception("Houve um erro", 10);	
            
            } catch (\Exception $e) {
            
    
                echo json_encode(array(
                    "code"=>$e->getCode(),
                    "message"=>$e->getMessage(),
                    "line"=>$e->getLine()
                ));
               
        
                
                
                $erro = "O seu Crédito inferior $num1";
                exit;
            
            }
            

        });

        

            

            
        
        



    }

   

}

?>