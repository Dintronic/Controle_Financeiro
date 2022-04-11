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
                    
                    $id = $_POST['id'];
                    $vencimento= $_POST['vencimento'];
                    $descricao = $_POST['descricao'];
                    $despesa = $_POST["despesa"];
                    $categoria = $_POST['categoria'];
                    $carteira = $_POST['carteira'];
                    $pago = $_POST['pago'];
                    
                    $sql = "UPDATE pagamentos SET vencimento='$vencimento', descricao='$descricao', despesa='$despesa', categoria='$categoria', carteira='$carteira', pago='$pago' WHERE id='$id'";
                    
                    $salvar = mysqli_query($conexao, $sql);
                    

                    if(mysqli_affected_rows($conexao)){

                        echo "<p style='color:green; font-size: 18px'>Cadastro Editado com Sucesso !!!</p><br>";
                        echo "<a type='button' class='btn btn-primary' href='extrato.php'>Voltar</a><br><br><br>";
                                        
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