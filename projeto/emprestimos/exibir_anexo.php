<?php

include_once("base.php");

if($_SESSION['logado'] == false) {
    header('Location: login.html');
} 

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$sql = "SELECT * FROM emprestimo WHERE id = '$id'";
$resultado_anexo = mysqli_query($conexao, $sql);
$row_anexo = mysqli_fetch_assoc($resultado_anexo);
$anexo = $row_anexo['anexo'];

?>

<body>

    <div class="container">

        <br>

        <div class="row">

            <div class="col-2">
            </div>

            <div class="col-5">

                <h5 class="preto">Anexo <?php 

                $descricao = $row_anexo['descricao'];           
                $vencimento = $row_anexo['vencimento'];        
                $vencimento_br = date('d/m/Y', strtotime($vencimento));            
                
                echo "{$descricao} - {$vencimento_br}";           
                
                ?></h5>  
            </div>

            <div class="col-1">
            <?php
                    if($anexo == ""){
                        ?>
                            <form action="edita_anexo.php" method="get">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">           
                                <button type="submit" class="btn btn-primary">Anexar</button>
                            </form>
                        <?php ;
                    }else{
                    ?>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir">Excluir</button>
                    <?php ;
                    }
                ?>               
            </div> 
            
            <div class="col-1">
                <a href="extrato.php" type="button" class="btn btn-primary">Voltar</a>
            </div>        

        </div><br>  

        <div class="row">
                <img class="anexo" src="..\anexos\<?php echo $anexo ?>">
        </div>

          <!-- Modal Exluir -->
          <div class="modal fade" id="excluir" tabindex="-1" aria-labelledby="excluirLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="preto" id="excluirLabel">Excluir Registro</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <h5 class="preto">Tem certeza que deseja excluir?</h5><br>
                            <?php                    
                                print "<a type='button' class='btn btn-danger' href='exclui_anexo.php?id=" . $id . "'>Confirma</a>";        
                            ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                        </div>
                        </div>
                    </div>
                </div>

    </div>
                    
</body>

</html>