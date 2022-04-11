<?php

include_once("base.php");

if($_SESSION['logado'] == false) {
    header('Location: login.html');
} 

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$excluir = "DELETE FROM extrato WHERE id = '$id'";
$resultado_usuario = mysqli_query($conexao, $excluir);

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
                    
                    if(mysqli_affected_rows($conexao)){

                        echo "<p style='color:green; font-size: 18px'>Cadastro Deletado com Sucesso !!!</p><br><br>";
                        echo "<a type='button' class='btn btn-primary' href='extrato.php'>Voltar</a>";		
                        
                    }else{

                        echo "<p style='color:red; font-size: 18px'>Erro ao Conectar com o Banco</p><br><br>";
                        echo "<a type='button' class='btn btn-primary' href='extrato.php'>Voltar</a>";  

                    }
		
			    ?>
            </div>
        </div>

        
    </div>
 
</body>

</html>