<?php

include_once("base.php");

if($_SESSION['logado'] == false) {
    header('Location: login.html');
} 

$result_anexo = "SELECT * FROM pagamentos ORDER BY id DESC limit 1";
$resultado_anexo = mysqli_query($conexao, $result_anexo);
$row_anexo = mysqli_fetch_assoc($resultado_anexo);

?>

<body>

    <div class="container">

        <div class="row">

            <div class="col-3">
            </div>

            <div class="col-5">
                
                    <form action="salvar_anexo.php" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?php echo $row_anexo['id']; ?>">

                        <div class="mb-12">
                            <H4>Selecione a Imagem</H4>
                        </div><br>

                        <div class="mb-12">
                            <h6>Extensões PNG ou JPG</h6>
                        </div><br>

                        <div class="mb-12">
                            <input class="form-control" type="file" id="formFileMultiple" name="arquivo" placeholder="Formato PNG ou JPG" ><br>

                            <button type="submit" class="btn btn-success">Enviar</button>
                            <a href="pagamentos.php" type="button" class="btn btn-primary">Voltar</a>
                        </div>

                    </form>
            </div>
            
        </div>

        
    </div>   
                    
</body>

</html>