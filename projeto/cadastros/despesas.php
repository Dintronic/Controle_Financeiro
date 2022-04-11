<?php

include_once("base.php");

if($_SESSION['logado'] == false) {
    header('Location: login.html');
} 

?>

<body>

    <div class="container">

        <div class="row">
            <div class="col-11">
                <h4>Cadastro de Despesas</h4>
            </div>
        </div><br>

        <form method="post" action="../contas/salvar.php">

            <div class="row">
                <div class="col-3">
                </div>

                <div class="col-5">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text col-3" id="addon-wrapping">Vencimeto:</span>
                        <input type="date" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" name="vencimento" required>
                    </div>
                </div>
            </div><br>

            <div class="row"> 
                <div class="col-3">
                </div>

                <div class="col-5">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text col-3" id="addon-wrapping">Descrição:</span>
                        <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" name="descricao" required>
                    </div>
                </div>
            </div><br>

            <div class="row"> 
                <div class="col-3">
                </div>

                <div class="col-5">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text col-3" id="addon-wrapping">Valor R$:</span>
                        <input type="number" step=".01" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" name="despesa" required>
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
                            <option value="Inter">Inter</option>
                            <option value="NuBank">NuBank</option>        
                            <option value="Dinheiro" selected>Dinheiro</option>
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
                        <option value="Não">Não</option>
                        <option value="Sim">Sim</option>
                        </select>
                    </div>  
                </div>

            </div><br>

            <div class="row">

                <div class="col-11">
                    <input type="submit"  class="btn btn-danger" id="button-addon1" value="Salvar">
                    <a href="../contas/extrato.php" type="button" class="btn btn-primary">Voltar</a>
                </div>

            </div>
        </form>
        
    </div>

</body>

</html>