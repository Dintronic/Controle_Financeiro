<?php

include_once("base.php");

if($_SESSION['logado'] == false) {
    header('Location: login.html');
} 

?>

<body>

    <div class="container-fluid">

        <div class="row">

            <div class="col-2">
            </div>

            <div class="col-2">
                <div class="card" style="width: 12rem; height: 16rem;">
                    <img src="..\img\img.png" class="card-img-top">
                    <div class="card-body">

                    <?php
                        $sql_receita = "SELECT sum(receita) FROM extrato WHERE carteira LIKE 'Dinheiro' AND pago ='Sim'";
                        $consulta_receita = mysqli_query($conexao, $sql_receita);
                        $exibir_receita = mysqli_fetch_array($consulta_receita);

                        $sql_despesa = "SELECT sum(despesa) FROM extrato WHERE carteira LIKE 'Dinheiro' AND pago ='Sim'";
                        $consulta_despesa = mysqli_query($conexao, $sql_despesa);
                        $exibir_despesa = mysqli_fetch_array($consulta_despesa);

                        $sql_mov_saida = "SELECT sum(valor1) FROM movimentacao WHERE saida LIKE 'Dinheiro' AND pago ='Sim'";
                        $consulta_mov_saida = mysqli_query($conexao, $sql_mov_saida);
                        $exibir_mov_saida = mysqli_fetch_array($consulta_mov_saida);

                        $sql_mov_entrada = "SELECT sum(valor2) FROM movimentacao WHERE entrada LIKE 'Dinheiro' AND pago ='Sim'";
                        $consulta_mov_entrada = mysqli_query($conexao, $sql_mov_entrada);
                        $exibir_mov_entrada = mysqli_fetch_array($consulta_mov_entrada);

                        $sql_emp_receita = "SELECT sum(receita) FROM emprestimo WHERE carteira LIKE 'Dinheiro' AND pago ='Sim'";
                        $consulta_emp_receita = mysqli_query($conexao, $sql_emp_receita);
                        $exibir_emp_receita = mysqli_fetch_array($consulta_emp_receita);

                        $sql_emp_despesa = "SELECT sum(despesa) FROM emprestimo WHERE carteira LIKE 'Dinheiro' AND pago ='Sim'";
                        $consulta_emp_despesa = mysqli_query($conexao, $sql_emp_despesa);
                        $exibir_emp_despesa = mysqli_fetch_array($consulta_emp_despesa);

                        $sql_pagamentos = "SELECT sum(despesa) FROM pagamentos WHERE carteira LIKE 'Dinheiro' AND pago ='Sim'";
                        $consulta_pagamentos = mysqli_query($conexao, $sql_pagamentos);
                        $exibir_pagamentos = mysqli_fetch_array($consulta_pagamentos);

                        $result = $exibir_receita[0] - $exibir_despesa[0] - $exibir_mov_saida[0] - $exibir_emp_despesa[0] - $exibir_pagamentos[0] + $exibir_emp_receita[0] + $exibir_mov_entrada[0];

                        $real = number_format($result, 2, ',', '.');

                        print "<h4>R$ $real</h4>";
                        ?>
                        
                    </div>
                    <div class="card-body">
                        <p class="card-text">Dinheiro</p>
                    </div>
                </div>               
            </div>      

            <div class="col-2"> 
                <div class="card" style="width: 12rem; height: 16rem;">
                    <img src="..\img\img.png" class="card-img-top">
                    <div class="card-body">
                        
                    <?php

                        $sql_receita = "SELECT  sum(receita) FROM extrato WHERE carteira LIKE 'Santander' AND pago ='Sim'";
                        $consulta_receita = mysqli_query($conexao, $sql_receita);
                        $exibir_receita = mysqli_fetch_array($consulta_receita);

                        $sql_despesa = "SELECT  sum(despesa) FROM extrato WHERE carteira LIKE 'Santander' AND pago ='Sim'";
                        $consulta_despesa = mysqli_query($conexao, $sql_despesa);
                        $exibir_despesa = mysqli_fetch_array($consulta_despesa);

                        $sql_mov_saida = "SELECT sum(valor1) FROM movimentacao WHERE saida LIKE 'Santander' AND pago ='Sim'";
                        $consulta_mov_saida = mysqli_query($conexao, $sql_mov_saida);
                        $exibir_mov_saida = mysqli_fetch_array($consulta_mov_saida);

                        $sql_mov_entrada = "SELECT sum(valor2) FROM movimentacao WHERE entrada LIKE 'Santander' AND pago ='Sim'";
                        $consulta_mov_entrada = mysqli_query($conexao, $sql_mov_entrada);
                        $exibir_mov_entrada = mysqli_fetch_array($consulta_mov_entrada);

                        $sql_emp_receita = "SELECT sum(receita) FROM emprestimo WHERE carteira LIKE 'Santander' AND pago ='Sim'";
                        $consulta_emp_receita = mysqli_query($conexao, $sql_emp_receita);
                        $exibir_emp_receita = mysqli_fetch_array($consulta_emp_receita);

                        $sql_emp_despesa = "SELECT sum(despesa) FROM emprestimo WHERE carteira LIKE 'Santander' AND pago ='Sim'";
                        $consulta_emp_despesa = mysqli_query($conexao, $sql_emp_despesa);
                        $exibir_emp_despesa = mysqli_fetch_array($consulta_emp_despesa);

                        $sql_pagamentos = "SELECT sum(despesa) FROM pagamentos WHERE carteira LIKE 'Santander' AND pago ='Sim'";
                        $consulta_pagamentos = mysqli_query($conexao, $sql_pagamentos);
                        $exibir_pagamentos = mysqli_fetch_array($consulta_pagamentos);

                        $result = $exibir_receita[0] - $exibir_despesa[0] - $exibir_mov_saida[0] - $exibir_emp_despesa[0] - $exibir_pagamentos[0] + $exibir_emp_receita[0] + $exibir_mov_entrada[0];

                        $real = number_format($result, 2, ',', '.');

                        print "<h4> R$ $real</h4>";
                    ?>

                    </div>
                    <div class="card-body">
                        <p class="card-text">Santander</p>
                    </div>
                </div>  
            </div>

            <div class="col-2"> 
                <div class="card" style="width: 12rem; height: 16rem;">
                    <img src="..\img\img.png" class="card-img-top">
                    <div class="card-body">
                        
                    <?php

                        $sql_receita = "SELECT  sum(receita) FROM extrato WHERE carteira LIKE 'NuBank' AND pago ='Sim'";
                        $consulta_receita = mysqli_query($conexao, $sql_receita);
                        $exibir_receita = mysqli_fetch_array($consulta_receita);

                        $sql_despesa = "SELECT  sum(despesa) FROM extrato WHERE carteira LIKE 'NuBank' AND pago ='Sim'";
                        $consulta_despesa = mysqli_query($conexao, $sql_despesa);
                        $exibir_despesa = mysqli_fetch_array($consulta_despesa);

                        $sql_mov_saida = "SELECT sum(valor1) FROM movimentacao WHERE saida LIKE 'NuBank' AND pago ='Sim'";
                        $consulta_mov_saida = mysqli_query($conexao, $sql_mov_saida);
                        $exibir_mov_saida = mysqli_fetch_array($consulta_mov_saida);

                        $sql_mov_entrada = "SELECT sum(valor2) FROM movimentacao WHERE entrada LIKE 'NuBank' AND pago ='Sim'";
                        $consulta_mov_entrada = mysqli_query($conexao, $sql_mov_entrada);
                        $exibir_mov_entrada = mysqli_fetch_array($consulta_mov_entrada);

                        $sql_emp_receita = "SELECT sum(receita) FROM emprestimo WHERE carteira LIKE 'Nubank' AND pago ='Sim'";
                        $consulta_emp_receita = mysqli_query($conexao, $sql_emp_receita);
                        $exibir_emp_receita = mysqli_fetch_array($consulta_emp_receita);

                        $sql_emp_despesa = "SELECT sum(despesa) FROM emprestimo WHERE carteira LIKE 'NuBank' AND pago ='Sim'";
                        $consulta_emp_despesa = mysqli_query($conexao, $sql_emp_despesa);
                        $exibir_emp_despesa = mysqli_fetch_array($consulta_emp_despesa);

                        $sql_pagamentos = "SELECT sum(despesa) FROM pagamentos WHERE carteira LIKE 'Nubank' AND pago ='Sim'";
                        $consulta_pagamentos = mysqli_query($conexao, $sql_pagamentos);
                        $exibir_pagamentos = mysqli_fetch_array($consulta_pagamentos);

                        $result = $exibir_receita[0] - $exibir_despesa[0] - $exibir_mov_saida[0] - $exibir_emp_despesa[0] - $exibir_pagamentos[0] + $exibir_emp_receita[0] + $exibir_mov_entrada[0];

                        $real = number_format($result, 2, ',', '.');

                        print "<h4> R$ $real</h4>";
                    ?>

                    </div>
                    <div class="card-body">
                        <p class="card-text">Nubank</p>
                    </div>
                </div>  
            </div>

            <div class="col">
                <div class="card" style="width: 12rem; height: 16rem;">
                    <img src="..\img\img.png" class="card-img-top">
                    <div class="card-body"> 
                    
                    <?php

                        $sql_receita = "SELECT  sum(receita) FROM extrato WHERE carteira LIKE 'Inter' AND pago ='Sim'";
                        $consulta_receita = mysqli_query($conexao, $sql_receita);
                        $exibir_receita = mysqli_fetch_array($consulta_receita);

                        $sql_despesa = "SELECT  sum(despesa) FROM extrato WHERE carteira LIKE 'Inter' AND pago ='Sim'";
                        $consulta_despesa = mysqli_query($conexao, $sql_despesa);
                        $exibir_despesa = mysqli_fetch_array($consulta_despesa);

                        $sql_mov_saida = "SELECT sum(valor1) FROM movimentacao WHERE saida LIKE 'Inter' AND pago ='Sim'";
                        $consulta_mov_saida = mysqli_query($conexao, $sql_mov_saida);
                        $exibir_mov_saida = mysqli_fetch_array($consulta_mov_saida);

                        $sql_mov_entrada = "SELECT sum(valor2) FROM movimentacao WHERE entrada LIKE 'Inter' AND pago ='Sim'";
                        $consulta_mov_entrada = mysqli_query($conexao, $sql_mov_entrada);
                        $exibir_mov_entrada = mysqli_fetch_array($consulta_mov_entrada);

                        $sql_emp_receita = "SELECT sum(receita) FROM emprestimo WHERE carteira LIKE 'Inter' AND pago ='Sim'";
                        $consulta_emp_receita = mysqli_query($conexao, $sql_emp_receita);
                        $exibir_emp_receita = mysqli_fetch_array($consulta_emp_receita);

                        $sql_emp_despesa = "SELECT sum(despesa) FROM emprestimo WHERE carteira LIKE 'Inter' AND pago ='Sim'";
                        $consulta_emp_despesa = mysqli_query($conexao, $sql_emp_despesa);
                        $exibir_emp_despesa = mysqli_fetch_array($consulta_emp_despesa);

                        $sql_pagamentos = "SELECT sum(despesa) FROM pagamentos WHERE carteira LIKE 'Inter' AND pago ='Sim'";
                        $consulta_pagamentos = mysqli_query($conexao, $sql_pagamentos);
                        $exibir_pagamentos = mysqli_fetch_array($consulta_pagamentos);

                        $result = $exibir_receita[0] - $exibir_despesa[0] - $exibir_mov_saida[0] - $exibir_emp_despesa[0] - $exibir_pagamentos[0] + $exibir_emp_receita[0] + $exibir_mov_entrada[0];

                        $real = number_format($result, 2, ',', '.');

                        print "<h4> R$ $real</h4>";
                    ?>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Inter</p>
                    </div>
                </div>     
            </div> 

           

            </div>

        <div class="row">

        <div class="col-2">
        </div>  

        <div class="col-2">
                <div class="card" style="width: 12rem; height: 16rem;">
                    <img src="..\img\img.png" class="card-img-top">
                    <div class="card-body">
                        
                    <?php

                        $sql_receita = "SELECT  sum(receita) FROM extrato WHERE carteira LIKE 'Poupança' AND pago ='Sim'";
                        $consulta_receita = mysqli_query($conexao, $sql_receita);
                        $exibir_receita = mysqli_fetch_array($consulta_receita);

                        $sql_despesa = "SELECT  sum(despesa) FROM extrato WHERE carteira LIKE 'Poupança' AND pago ='Sim'";
                        $consulta_despesa = mysqli_query($conexao, $sql_despesa);
                        $exibir_despesa = mysqli_fetch_array($consulta_despesa);

                        $sql_mov_saida = "SELECT sum(valor1) FROM movimentacao WHERE saida LIKE 'Poupança' AND pago ='Sim'";
                        $consulta_mov_saida = mysqli_query($conexao, $sql_mov_saida);
                        $exibir_mov_saida = mysqli_fetch_array($consulta_mov_saida);

                        $sql_mov_entrada = "SELECT sum(valor2) FROM movimentacao WHERE entrada LIKE 'Poupança' AND pago ='Sim'";
                        $consulta_mov_entrada = mysqli_query($conexao, $sql_mov_entrada);
                        $exibir_mov_entrada = mysqli_fetch_array($consulta_mov_entrada);

                        $sql_emp_receita = "SELECT sum(receita) FROM emprestimo WHERE carteira LIKE 'Poupança' AND pago ='Sim'";
                        $consulta_emp_receita = mysqli_query($conexao, $sql_emp_receita);
                        $exibir_emp_receita = mysqli_fetch_array($consulta_emp_receita);

                        $sql_emp_despesa = "SELECT sum(despesa) FROM emprestimo WHERE carteira LIKE 'Poupança' AND pago ='Sim'";
                        $consulta_emp_despesa = mysqli_query($conexao, $sql_emp_despesa);
                        $exibir_emp_despesa = mysqli_fetch_array($consulta_emp_despesa);

                        $sql_pagamentos = "SELECT sum(despesa) FROM pagamentos WHERE carteira LIKE 'Poupança' AND pago ='Sim'";
                        $consulta_pagamentos = mysqli_query($conexao, $sql_pagamentos);
                        $exibir_pagamentos = mysqli_fetch_array($consulta_pagamentos);

                        $result = $exibir_receita[0] - $exibir_despesa[0] - $exibir_mov_saida[0] - $exibir_emp_despesa[0] - $exibir_pagamentos[0] + $exibir_emp_receita[0] + $exibir_mov_entrada[0];

                        $real = number_format($result, 2, ',', '.');

                        print "<h4> R$ $real</h4>";
                    ?>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Poupança</p>
                    </div>
                </div>     
            </div> 

            <div class="col-2">
                <div class="card" style="width: 12rem; height: 16rem;">
                    <img src="..\img\img.png"class="card-img-top">
                    <div class="card-body">
                    <?php
                            
                        $sql_receita = "SELECT  sum(receita) FROM extrato WHERE carteira LIKE 'Investimentos' AND pago ='Sim'";
                        $consulta_receita = mysqli_query($conexao, $sql_receita);
                        $exibir_receita = mysqli_fetch_array($consulta_receita);

                        $sql_despesa = "SELECT  sum(despesa) FROM extrato WHERE carteira LIKE 'Investimentos' AND pago ='Sim'";
                        $consulta_despesa = mysqli_query($conexao, $sql_despesa);
                        $exibir_despesa = mysqli_fetch_array($consulta_despesa);

                        $sql_mov_saida = "SELECT sum(valor1) FROM movimentacao WHERE saida LIKE 'Investimentos' AND pago ='Sim'";
                        $consulta_mov_saida = mysqli_query($conexao, $sql_mov_saida);
                        $exibir_mov_saida = mysqli_fetch_array($consulta_mov_saida);

                        $sql_mov_entrada = "SELECT sum(valor2) FROM movimentacao WHERE entrada LIKE 'Investimentos' AND pago ='Sim'";
                        $consulta_mov_entrada = mysqli_query($conexao, $sql_mov_entrada);
                        $exibir_mov_entrada = mysqli_fetch_array($consulta_mov_entrada);

                        $result = $exibir_receita[0] - $exibir_despesa[0] - $exibir_mov_saida[0] + $exibir_mov_entrada[0];

                        $real = number_format($result, 2, ',', '.');

                        print "<h4> R$ $real</h4>";
                    ?>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Invesimento</p>
                    </div>
                </div>     
            </div> 

            <div class="col-2">
                <div class="card" style="width: 12rem; height: 16rem;">
                    <img src="..\img\img.png" class="card-img-top">
                    <div class="card-body">
                        
                    <?php

                        $sql_receita = "SELECT  sum(receita) FROM extrato WHERE carteira LIKE 'Fundos Diversos' AND pago ='Sim'";
                        $consulta_receita = mysqli_query($conexao, $sql_receita);
                        $exibir_receita = mysqli_fetch_array($consulta_receita);

                        $sql_despesa = "SELECT  sum(despesa) FROM extrato WHERE carteira LIKE 'Fundos Diversos' AND pago ='Sim'";
                        $consulta_despesa = mysqli_query($conexao, $sql_despesa);
                        $exibir_despesa = mysqli_fetch_array($consulta_despesa);

                        $sql_mov_saida = "SELECT sum(valor1) FROM movimentacao WHERE saida LIKE 'Fundos Diversos' AND pago ='Sim'";
                        $consulta_mov_saida = mysqli_query($conexao, $sql_mov_saida);
                        $exibir_mov_saida = mysqli_fetch_array($consulta_mov_saida);

                        $sql_mov_entrada = "SELECT sum(valor2) FROM movimentacao WHERE entrada LIKE 'Fundos Diversos' AND pago ='Sim'";
                        $consulta_mov_entrada = mysqli_query($conexao, $sql_mov_entrada);
                        $exibir_mov_entrada = mysqli_fetch_array($consulta_mov_entrada);

                        $result_fundos = $exibir_receita[0] - $exibir_despesa[0] - $exibir_mov_saida[0] + $exibir_mov_entrada[0];

                        $real = number_format($result_fundos, 2, ',', '.');

                        print "<h4> R$ $real</h4>";
                    ?>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Fundos Diversos</p>
                    </div>
                </div>     
            </div> 

            <div class="col-2">
                <div class="card" style="width: 12rem; height: 16rem;">
                    <img src="..\img\img.png" class="card-img-top">
                    <div class="card-body">
                        
                    <?php

                        $sql_receita = "SELECT  sum(receita) FROM extrato WHERE pago ='Sim'";
                        $consulta_receita = mysqli_query($conexao, $sql_receita);
                        $exibir_receita = mysqli_fetch_array($consulta_receita);

                        $sql_despesa = "SELECT  sum(despesa) FROM extrato WHERE pago ='Sim'";
                        $consulta_despesa = mysqli_query($conexao, $sql_despesa);
                        $exibir_despesa = mysqli_fetch_array($consulta_despesa);

                        $sql_pagamentos = "SELECT sum(despesa) FROM pagamentos WHERE pago ='Sim'";
                        $consulta_pagamentos = mysqli_query($conexao, $sql_pagamentos);
                        $exibir_pagamentos = mysqli_fetch_array($consulta_pagamentos);

                        $sql_emprestimos = "SELECT sum(despesa) FROM emprestimo WHERE pago ='Sim'";
                        $consulta_emprestimos = mysqli_query($conexao, $sql_emprestimos);
                        $exibir_emprestimos = mysqli_fetch_array($consulta_emprestimos);

                        $sql_emprestimos_rec = "SELECT sum(receita) FROM emprestimo WHERE pago ='Sim'";
                        $consulta_emprestimos_rec = mysqli_query($conexao, $sql_emprestimos_rec);
                        $exibir_emprestimos_rec = mysqli_fetch_array($consulta_emprestimos_rec);

                        $result = $exibir_receita[0] - $exibir_despesa[0] - $exibir_pagamentos[0] - $exibir_emprestimos[0] - $result_fundos + $exibir_emprestimos_rec[0];

                        $real = number_format($result, 2, ',', '.');

                        print "<h4> R$ $real</h4>";
                    ?>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Total</p>
                    </div>
                </div>     
            </div> 
        
        </div>

        
    </div>  
                    
</body>

</html>