<?php session_start();
?>

<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM</title>
    <link rel="stylesheet" href="assets/css/style.css">

   

</head>
<body>

    <div class="Title">
        <h1>Entrar</h1>
    </div>


    <Section id="access">
        <div>
            <h2 class="heading2">Inserir o cartão</h2>
            <div>
                <form action="" method="POST" id="form">
                       
                       <div class="pan" id="bink">
                           <input type="number" class="input verifylength" placeholder="Card" name="code">
                        </div>
                       <button class="bt ba-a">Entrar</button>
                </form>
            </div>
        </div>
    </Section>


    <section id="creat" style="display: none;">

    <div class="stati">
        <a href="">Back</a>
    </div>
    <div class="create">
        
            <form action="" method="post">
                
                <div class="pan">
                  <input type="text " class="input verifylength" placeholder="Full name" name="nome" required>
                </div>
                <!--div class="pan">
                  <input type="number" class="input verifylength" placeholder="Pin" name="code" required>
                </div-->
                
                
                <button class="bt ba-a">Create</button>
            </form>
    </div>

    </section>

    
 
    
</body>
</html>
<script src="assets/js/Indexscript.js"></script>

<?php

require_once("../../vendor/autoload.php");
use Build\BuildATM\Facade;

Facade::NullAccount();
$run = new Facade();
return $run;


?>
