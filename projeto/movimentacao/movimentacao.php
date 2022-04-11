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
              <h4>Movimentação</h4>
            </div>
        </div><br>

        <form method="post" action="salvar.php">

            <div class="row">
                <div class="col-4">
                </div>   
                <div class="col-4">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text col-3" id="addon-wrapping">Data:</span>
                        <input type="date" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" name="dia" required>
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
            <div class="col-4">
                </div>  
                <div class="col-4">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text col-3" id="addon-wrapping">Valor R$:</span>
                        <input type="number" step=".01" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" name="valor1" required>
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
            <div class="col-4">
                </div>  
                <div class="col-4">
                    <div class="input-group flex-nowrap">
                        <label class="input-group-text col-3" for="inputGroupSelect01">Pago:</label>
                        <select class="form-select" id="inputGroupSelect01" name="pago">
                        <option value="Não">Não</option>
                        <option value="Sim">Sim</option>
                        </select>
                    </div>  
                </div>
            </div><br><br>  

            <div class="row">

                    <div class="col-12">
                        <input type="submit"  class="btn btn-warning" id="button-addon1" value="Salvar">
                        <a href="extrato.php" type="button" class="btn btn-primary">Voltar</a>
                    </div>

            </div>
        </form>
    </div>

</body>

</html>