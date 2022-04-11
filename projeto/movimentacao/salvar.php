<?php

include_once("base.php");

if($_SESSION['logado'] == false) {
    header('Location: login.html');
} 

?>

<body>

    <div class="container">

        <div class="row">
            <div class="col">
              <h4>Controle Financeiro</h4>
            </div>
        </div><br><br>

        <div class="row">
            <div class="col">

                <?php
                
                    $dia= $_POST['dia'];
                    $saida = $_POST['saida'];
                    $valor1 = $_POST['valor1'];
                    $entrada = $_POST['entrada'];              
                    $pago = $_POST['pago'];
                    
                    $sql = "INSERT INTO movimentacao (dia,saida,valor1,entrada,valor2,pago) VALUES ('$dia','$saida','$valor1','$entrada','$valor1','$pago')";
                    
                    $salvar = mysqli_query($conexao, $sql);
                    
                    $linhas = mysqli_affected_rows($conexao);

                    if(mysqli_affected_rows($conexao)){
                        echo "<p style='color:green; font-size: 18px'>Cadastro Efetuado com Sucesso !!!</p><br><br>";
                        echo "<a type='button' class='btn btn-primary' href='extrato.php'>Voltar</a>";
                                        
                    }else{
                        echo "<p style='color:red; font-size: 18px'>Não Alterado Valores</p><br><br>";
                        echo "<a type='button' class='btn btn-primary' href='extrato_mov.php'>Voltar</a>";
                    }
            
                ?>       
            </div>
        </div>

        
    </div>
          
</body>

</html>