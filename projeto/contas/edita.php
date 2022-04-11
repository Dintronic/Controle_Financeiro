<?php

include_once("base.php");

if($_SESSION['logado'] == false) {
    header('Location: login.html');
} 

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM extrato WHERE id = '$id'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

?>

<body>

    <div class="container">

        <div class="row">
            <div class="col-11">
            <?php
                $receita = $row_usuario['receita'];
                
                if($receita == "0.00"){
                    print "<h4>Edita Despesas</h4>";

                }else{
                    print "<h4>Edita Receitas</h4>";
                }
                ?>
            </div>
        </div><br>

            <div class="row">
                <div class="col-3">
                </div>

                <div class="col-5">

                <form method="post" action="salvar_edicao.php">
                
                <input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">

                    <div class="input-group flex-nowrap">
                        <span class="input-group-text col-3" id="addon-wrapping">Vencimeto:</span>
                        <input type="date" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" name="vencimento" value="<?php echo $row_usuario['vencimento']; ?>">
                    </div>
                </div>
            </div><br>

            <div class="row"> 
                <div class="col-3">
                </div>

                <div class="col-5">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text col-3" id="addon-wrapping">Descrição:</span>
                        <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" name="descricao" value="<?php echo $row_usuario['descricao']; ?>">
                    </div>
                </div>
            </div><br>

            <div class="row"> 
                <div class="col-3">
                </div>

                <div class="col-5">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text col-3" id="addon-wrapping">Valor R$:</span>

                        <?php
                        $receita = $row_usuario['receita'];
                        $despesa = $row_usuario['despesa'];

                        if($receita == "0.00"){
                            
                            print "<input type='number' step='.01' class='form-control' aria-label='Username' name='despesa' aria-describedby='addon-wrapping' value='$despesa'>";

                        }else{

                            print "<input type='number' step='.01' class='form-control blue' aria-label='Username' name='receita' aria-describedby='addon-wrapping' value='$receita'>";
                        }                    
                    ?>  
                    </div>
                </div>
            </div><br>

            <div class="row">
                <div class="col-3">
                </div>
                
                <div class="col-5">
                <div class="input-group flex-nowrap">
                        <label class="input-group-text col-3" for="inputGroupSelect01">Categoria</label>
                        <select class="form-select" id="inputGroupSelect01" name="categoria">
                            <option value="<?php echo $row_usuario['categoria']; ?>"> <?php echo $row_usuario['categoria']; ?></option>                            
                            <option value="Pets">Pets</option>
                            <option value="Juros">Juros</option>
                            <option value="Saúde">Saúde</option>
                            <option value="Vendas">Vendas</option>
                            <option value="Moradia">Moradia</option>
                            <option value="Mercado">Mercado</option>   
                            <option value="Diversos">Diversos</option>                         
                            <option value="Serviços">Serviços</option>
                            <option value="Diversão">Diversão</option>
                            <option value="Transporte">Transporte</option>
                            <option value="Alimentação">Alimentação</option>
                        </select>
                    </div>
                </div>
            </div><br>

            <div class="row"> 
                <div class="col-3">
                </div>

                <div class="col-5">
                <div class="input-group flex-nowrap">
                        <label class="input-group-text col-3" for="inputGroupSelect01">Carteria</label>
                        <select class="form-select" id="inputGroupSelect01" name="carteira">
                            <option value="<?php echo $row_usuario['carteira']; ?>"> <?php echo $row_usuario['carteira']; ?></option>
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
                <div class="col-3">
                </div>

                <div class="col-5">
                <div class="input-group flex-nowrap">
                        <label class="input-group-text col-3" for="inputGroupSelect01">Pago:</label>
                        <select class="form-select" id="inputGroupSelect01" name="pago">
                            <option value="<?php echo $row_usuario['pago']; ?>"> <?php echo $row_usuario['pago']; ?></option>
                            <option value="Não">Não</option>
                            <option value="Sim">Sim</option>
                        </select>
                    </div>  
                </div>

            </div><br>

            <div class="row">

            <div class="col-11">
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