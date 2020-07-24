<?php
session_start();
session_regenerate_id();
session_id();

require_once("../../vendor/autoload.php");
use Build\BuildATM\Facade;
$user=Facade::UserLogin();
Facade::ChecktAccount();
$run = new Facade();
$run;



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="Title">
        <h1>conta : <?= $user->getNome() ?></h1>
    </div>

<section>

<table>
 <tr>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
</tr>

<tr>
    <td>
        <div class="one">
        <div>
            <button id="Dinheiro" class="bt ba-b">Tirar Dinheiro</button>
        </div>
        <div>
            <button id="Consultar" class="bt ba-b">Consultar</button>
        </div>
        <div>
            <button id="deposito" class="bt ba-b">Fazer depósito</button>
        </div>
        <div>
            <button id="zero" class="bt ba-b">0</button>
        </div>
        </div>
    </td>
    <td>
        <div>
            
        </div>
    </td>
    <td>
        <div class="tableform" id="tableform" style="display: none;">

            <form action="" method="POST" id="form">
               
            <div id="bank" style="display: none;">
                <div class="pan">
                    <input type="text" class="input" title="Name proprietary" placeholder="<?= $user->getNome() ?>">
                </div>
                <div class="pan">
                    <input type="number" class="input" title="IBAN" placeholder="<?= $user->getIban() ?>">
                </div>
                <div class="pan">
                    <input type="number" class="input" placeholder="Digit Valor" name="deposit" required>
                </div>
            </div>
            
            
                <button class="bt ba-b" id="okconfirm" style="display:none;">Confirmar</button>
              

            </form>
            <button id="okcorrect" class="bt ba-a" style="font-size: 20px;margin-top:50px;">OK</button>
        </div>
    </td>
    <td>
        <div>
            
        </div>
    </td>
    <td>
        <div class="two" id="two">
        <div>
            <button disabled id="Transferência" class="bt ba-b">Transferência</button>
        </div>
        <div>
            <button id="Estrato" class="bt ba-b">Estrato Bancario</button>
        </div>
        <div>
            <button id="Conta" class="bt ba-b">Minha Conta</button>
        </div>
        <div>
            
            <button id="sair" class="bt ba-b"><a style="font-size: 30px;text-decoration: none;font-family: Arial, Helvetica, sans-serif;color: #fff;" href="index.php">Sair</a></button>
        </div>
        </div>

    </td>
    
</tr>


</table>

</section>

</body>
</html>
<script src="assets/js/script.js"></script>