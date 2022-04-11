<?php

include_once("base.php");

if($_SESSION['logado'] == false) {
    header('Location: login.html');
} 

$id = $_POST['id'];
$arquivo = $_FILES['arquivo'];

if ($arquivo !== null) {

    //Gera o nome do arquivo   
    preg_match("/\.(bmp|png|jpg|jpeg){1}$/i", $arquivo["name"], $extensao);

    if ($extensao == true){

        $nome_arquivo = md5(uniqid(time())) . "." . $extensao[1];

        $caminho_arquivo = "../anexos/" . $nome_arquivo;

        move_uploaded_file($arquivo["tmp_name"], $caminho_arquivo);

        $sql = "UPDATE extrato SET anexo = '$nome_arquivo' WHERE id='$id' ";
        $inserir = mysqli_query($conexao,$sql);
        $linhas = mysqli_affected_rows($conexao);
    }
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
                    
                    if(mysqli_affected_rows($conexao)){
                        echo "<p style='color:green; font-size: 18px'>Cadastro Efetuado com Sucesso !!!</p><br><br>";
                        echo "<a type='button' class='btn btn-primary' href='extrato.php'>Voltar</a>";
                                        
                    }else{
                        echo "<p style='color:red; font-size: 18px'>Tipo de Arquivo não Suportado</p><br><br>";
                        echo "<a type='button' class='btn btn-primary' href='extrato.php'>Voltar</a>";
                    }
                
                ?>       
            </div> 
        </div>

        
    </div>
   
</body>

</html>