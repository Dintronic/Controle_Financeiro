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
              <h4>Salva Movimentação</h4>
            </div>
        </div><br><br>

        <div class="row">

            <div class="col">

                <?php
        
                    $id = $_POST['id'];
                    $dia= $_POST['dia'];
                    $saida = $_POST['saida'];
                    $valor1 = $_POST['valor1'];
                    $entrada = $_POST['entrada'];              
                    $pago = $_POST['pago'];
                    
                    $sql = "UPDATE movimentacao SET dia='$dia', saida='$saida', valor1='$valor1', entrada='$entrada', valor2='$valor1', pago='$pago'WHERE id='$id'";
                
                    $salvar = mysqli_query($conexao, $sql);
                

                    if(mysqli_affected_rows($conexao)){
                        echo "<p style='color:green; font-size: 18px'>Cadastro Editado com Sucesso !!!</p><br><br>";
                        echo "<a type='button' class='btn btn-primary' href='extrato.php'>Voltar</a>";
                                    
                    }else{
                        echo "<p style='color:red; font-size: 18px'>Não Alterado Valores</p><br><br>";
                        echo "<a type='button' class='btn btn-primary' href='extrato.php'>Voltar</a>";
                    }
                
                ?>       
            </div> 
        </div>

        
    </div>
      
</body>

</html>