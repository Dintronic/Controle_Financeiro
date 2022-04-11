<?php

include_once("base.php");

if($_SESSION['logado'] == false) {
    header('Location: login.html');
} 

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_movimentacao = "SELECT * FROM movimentacao WHERE id = '$id'";
$resultado_movimentacao = mysqli_query($conexao, $result_movimentacao);
$row_movimentacao = mysqli_fetch_assoc($resultado_movimentacao);

?>

<body>

    <div class="container">

        <div class="row">
            <div class="col">
              <h4>Movimentação</h4>
            </div>
        </div><br>

        <form method="post" action="salvar_edicao.php">

        <input type="hidden" name="id" value="<?php echo $row_movimentacao['id']; ?>">

            <div class="row">
                <div class="col-4">
                </div>   
                <div class="col-4">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text col-3" id="addon-wrapping">Data:</span>
                        <input type="date" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" name="dia" value="<?php echo $row_movimentacao['dia']; ?>">
                    </div>
                </div>
            </div><br>

            <div class="row">     
            <div class="col-4">
                </div>    
                <div class="col-4">
                    <div class="input-group flex-nowrap">
                        <label class="input-group-text col-3" for="inputGroupSelect01">Saída</label>
                        <select class="form-select" id="inputGroupSelect01" name="saida">
                        <option value="<?php echo $row_movimentacao['saida']; ?>"> <?php echo $row_movimentacao['saida']; ?></option> 
                            <option value="Inter">Inter</option>
                            <option value="NuBank">NuBank</option>        
                            <option value="Dinheiro">Dinheiro</option>
                            <option value="Poupança">Poupança</option>
                            <option value="Santander">Santander</option>
                            <option value="Investimentos">Investimentos</option>
                            <option value="Fundos Diversos">Fundos Diversos</option>
                        </select>
                    </div>
                </div>
            </div><br> 
            
            <div class="row">  
            <div class="col-4">
                </div>  
                <div class="col-4">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text col-3" id="addon-wrapping">Valor R$:</span>
                        <input type="number" step=".01" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" name="valor1" value="<?php echo $row_movimentacao['valor1']; ?>">
                    </div>
                </div>
            </div><br>    

            <div class="row">  
            <div class="col-4">
                </div>  
                <div class="col-4">
                    <div class="input-group flex-nowrap">
                        <label class="input-group-text col-3" for="inputGroupSelect01">Entrada</label>
                        <select class="form-select" id="inputGroupSelect01" name="entrada">
                            <option value="<?php echo $row_movimentacao['entrada']; ?>"> <?php echo $row_movimentacao['entrada']; ?></option> 
                            <option value="Inter">Inter</option>
                            <option value="NuBank">NuBank</option>        
                            <option value="Dinheiro">Dinheiro</option>
                            <option value="Poupança">Poupança</option>
                            <option value="Santander">Santander</option>
                            <option value="Investimentos">Investimentos</option>
                            <option value="Fundos Diversos">Fundos Diversos</option>
                        </select>
                    </div>
                </div>
            </div><br>

            <div class="row">
            <div class="col-4">
                </div>  
                <div class="col-4">
                    <div class="input-group flex-nowrap">
                        <label class="input-group-text col-3" for="inputGroupSelect01">Pago:</label>
                        <select class="form-select" id="inputGroupSelect01" name="pago">
                        <option value="<?php echo $row_movimentacao['pago']; ?>"> <?php echo $row_movimentacao['pago']; ?></option> 
                        <option value="Não">Não</option>
                        <option value="Sim">Sim</option>
                        </select>
                    </div>  
                </div>
            </div><br><br>  

            <div class="row">

                    <div class="col-12">
                        <input type="submit"  class="btn btn-success" id="button-addon1" value="Salvar">
                        <a href="extrato.php" type="button" class="btn btn-primary">Voltar</a>

                       <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir">Excluir</button>
                    </div>

            </div>
        </form>

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
                                print "<a type='button' class='btn btn-danger' href='exclui.php?id=" . $id . "'>Confirma</a>";        
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