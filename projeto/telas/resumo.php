<?php

include_once("base.php");

if($_SESSION['logado'] == false) {
    header('Location: login.html');
} 

?>

<body>

    <div class="container">

        <table class="table table-striped table-responsive table-sm">
            <thead>
                <tr>
                <th scope="col">Mês</th>
                <th scope="col">Receitas</th>
                <th scope="col">Despesas</th>
                <th scope="col">Saldo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">Janeiro</th>
                <td><?php
                    $sql_receita = "SELECT sum(receita) FROM extrato WHERE MONTH(vencimento) = 1 AND YEAR(vencimento) = $ano";
                    $consulta_receita = mysqli_query($conexao, $sql_receita);
                    $exibir_receita = mysqli_fetch_array($consulta_receita);

                    $sql_pagamentos = "SELECT sum(despesa) FROM pagamentos WHERE MONTH(vencimento) = 1 AND YEAR(vencimento) = $ano";
                    $consulta_pagamentos = mysqli_query($conexao, $sql_pagamentos);
                    $exibir_pagamentos = mysqli_fetch_array($consulta_pagamentos);

                    $receita = $exibir_receita[0] - $exibir_pagamentos[0];

                    $real = number_format($receita, 2, ',', '.');
                    print "R$ $real";?></td>
                <td><?php
                    $sql_despesa = "SELECT sum(despesa) FROM extrato WHERE MONTH(vencimento) = 1 AND YEAR(vencimento) = $ano";
                    $consulta_despesa = mysqli_query($conexao, $sql_despesa);
                    $exibir_despesa = mysqli_fetch_array($consulta_despesa);

                    $sql_emp_receita = "SELECT sum(receita) FROM emprestimo WHERE MONTH(vencimento) = 1 AND YEAR(vencimento) = $ano";
                    $consulta_emp_receita = mysqli_query($conexao, $sql_emp_receita);
                    $exibir_emp_receita = mysqli_fetch_array($consulta_emp_receita);

                    $sql_emp_despesa = "SELECT sum(despesa) FROM emprestimo WHERE MONTH(vencimento) = 1 AND YEAR(vencimento) = $ano";
                    $consulta_emp_despesa = mysqli_query($conexao, $sql_emp_despesa);
                    $exibir_emp_despesa = mysqli_fetch_array($consulta_emp_despesa);

                    $despesa = $exibir_despesa[0] - $exibir_emp_receita[0] + $exibir_emp_despesa[0];

                    $real = number_format($despesa, 2, ',', '.');
                    print "R$ $real";?></td>
                 <td><?php
                    $result = $receita - $despesa;
                    $real = number_format($result, 2, ',', '.');
                    if($result < 0){
                        print "<h6 class='vermelho'> R$ $real</h6>";
                    }else{
                        print "R$ $real";
                    }?></td>
                </tr>
                <tr>
                <th scope="row">Fevereiro</th>
                <td><?php
                    $sql_receita = "SELECT sum(receita) FROM extrato WHERE MONTH(vencimento) = 2 AND YEAR(vencimento) = $ano";
                    $consulta_receita = mysqli_query($conexao, $sql_receita);
                    $exibir_receita = mysqli_fetch_array($consulta_receita);

                    $sql_pagamentos = "SELECT sum(despesa) FROM pagamentos WHERE MONTH(vencimento) = 2 AND YEAR(vencimento) = $ano";
                    $consulta_pagamentos = mysqli_query($conexao, $sql_pagamentos);
                    $exibir_pagamentos = mysqli_fetch_array($consulta_pagamentos);

                    $receita = $exibir_receita[0] - $exibir_pagamentos[0];

                    $real = number_format($receita, 2, ',', '.');
                    print "R$ $real";?></td>
                <td><?php
                    $sql_despesa = "SELECT sum(despesa) FROM extrato WHERE MONTH(vencimento) = 2 AND YEAR(vencimento) = $ano";
                    $consulta_despesa = mysqli_query($conexao, $sql_despesa);
                    $exibir_despesa = mysqli_fetch_array($consulta_despesa);

                    $sql_emp_receita = "SELECT sum(receita) FROM emprestimo WHERE MONTH(vencimento) = 2 AND YEAR(vencimento) = $ano";
                    $consulta_emp_receita = mysqli_query($conexao, $sql_emp_receita);
                    $exibir_emp_receita = mysqli_fetch_array($consulta_emp_receita);

                    $sql_emp_despesa = "SELECT sum(despesa) FROM emprestimo WHERE MONTH(vencimento) = 2 AND YEAR(vencimento) = $ano";
                    $consulta_emp_despesa = mysqli_query($conexao, $sql_emp_despesa);
                    $exibir_emp_despesa = mysqli_fetch_array($consulta_emp_despesa);

                    $despesa = $exibir_despesa[0] - $exibir_emp_receita[0] + $exibir_emp_despesa[0];

                    $real = number_format($despesa, 2, ',', '.');
                    print "R$ $real";?></td>
                 <td><?php
                    $result = $receita - $despesa;
                    $real = number_format($result, 2, ',', '.');
                    if($result < 0){
                        print "<h6 class='vermelho'> R$ $real</h6>";
                    }else{
                        print "R$ $real";
                    }?></td>
                    
                </tr>
                </tr>
                <tr>
                <th scope="row">Março</th>
                <td><?php
                    $sql_receita = "SELECT sum(receita) FROM extrato WHERE MONTH(vencimento) = 3 AND YEAR(vencimento) = $ano";
                    $consulta_receita = mysqli_query($conexao, $sql_receita);
                    $exibir_receita = mysqli_fetch_array($consulta_receita);

                    $sql_pagamentos = "SELECT sum(despesa) FROM pagamentos WHERE MONTH(vencimento) = 3 AND YEAR(vencimento) = $ano";
                    $consulta_pagamentos = mysqli_query($conexao, $sql_pagamentos);
                    $exibir_pagamentos = mysqli_fetch_array($consulta_pagamentos);

                    $receita = $exibir_receita[0] - $exibir_pagamentos[0];

                    $real = number_format($receita, 2, ',', '.');
                    print "R$ $real";?></td>
                <td><?php
                    $sql_despesa = "SELECT sum(despesa) FROM extrato WHERE MONTH(vencimento) = 3 AND YEAR(vencimento) = $ano";
                    $consulta_despesa = mysqli_query($conexao, $sql_despesa);
                    $exibir_despesa = mysqli_fetch_array($consulta_despesa);

                    $sql_emp_receita = "SELECT sum(receita) FROM emprestimo WHERE MONTH(vencimento) = 3 AND YEAR(vencimento) = $ano";
                    $consulta_emp_receita = mysqli_query($conexao, $sql_emp_receita);
                    $exibir_emp_receita = mysqli_fetch_array($consulta_emp_receita);

                    $sql_emp_despesa = "SELECT sum(despesa) FROM emprestimo WHERE MONTH(vencimento) = 3 AND YEAR(vencimento) = $ano";
                    $consulta_emp_despesa = mysqli_query($conexao, $sql_emp_despesa);
                    $exibir_emp_despesa = mysqli_fetch_array($consulta_emp_despesa);

                    $despesa = $exibir_despesa[0] - $exibir_emp_receita[0] + $exibir_emp_despesa[0];

                    $real = number_format($despesa, 2, ',', '.');
                    print "R$ $real";?></td>
                 <td><?php
                    $result = $receita - $despesa;
                    $real = number_format($result, 2, ',', '.');
                    if($result < 0){
                        print "<h6 class='vermelho'> R$ $real</h6>";
                    }else{
                        print "R$ $real";
                    }?></td>
                </tr>
                </tr>
                <tr>
                <th scope="row">Abril</th>
                <td><?php
                    $sql_receita = "SELECT sum(receita) FROM extrato WHERE MONTH(vencimento) = 4 AND YEAR(vencimento) = $ano";
                    $consulta_receita = mysqli_query($conexao, $sql_receita);
                    $exibir_receita = mysqli_fetch_array($consulta_receita);

                    $sql_pagamentos = "SELECT sum(despesa) FROM pagamentos WHERE MONTH(vencimento) = 4 AND YEAR(vencimento) = $ano";
                    $consulta_pagamentos = mysqli_query($conexao, $sql_pagamentos);
                    $exibir_pagamentos = mysqli_fetch_array($consulta_pagamentos);

                    $receita = $exibir_receita[0] - $exibir_pagamentos[0];

                    $real = number_format($receita, 2, ',', '.');
                    print "R$ $real";?></td>
                <td><?php
                    $sql_despesa = "SELECT sum(despesa) FROM extrato WHERE MONTH(vencimento) = 4 AND YEAR(vencimento) = $ano";
                    $consulta_despesa = mysqli_query($conexao, $sql_despesa);
                    $exibir_despesa = mysqli_fetch_array($consulta_despesa);

                    $sql_emp_receita = "SELECT sum(receita) FROM emprestimo WHERE MONTH(vencimento) = 4 AND YEAR(vencimento) = $ano";
                    $consulta_emp_receita = mysqli_query($conexao, $sql_emp_receita);
                    $exibir_emp_receita = mysqli_fetch_array($consulta_emp_receita);

                    $sql_emp_despesa = "SELECT sum(despesa) FROM emprestimo WHERE MONTH(vencimento) = 4 AND YEAR(vencimento) = $ano";
                    $consulta_emp_despesa = mysqli_query($conexao, $sql_emp_despesa);
                    $exibir_emp_despesa = mysqli_fetch_array($consulta_emp_despesa);

                    $despesa = $exibir_despesa[0] - $exibir_emp_receita[0] + $exibir_emp_despesa[0];

                    $real = number_format($despesa, 2, ',', '.');
                    print "R$ $real";?></td>
                 <td><?php
                    $result = $receita - $despesa;
                    $real = number_format($result, 2, ',', '.');
                    if($result < 0){
                        print "<h6 class='vermelho'> R$ $real</h6>";
                    }else{
                        print "R$ $real";
                    }?></td>
                </tr>
                </tr>
                <tr>
                <th scope="row">Maio</th>
                <td><?php
                    $sql_receita = "SELECT sum(receita) FROM extrato WHERE MONTH(vencimento) = 5 AND YEAR(vencimento) = $ano";
                    $consulta_receita = mysqli_query($conexao, $sql_receita);
                    $exibir_receita = mysqli_fetch_array($consulta_receita);

                    $sql_pagamentos = "SELECT sum(despesa) FROM pagamentos WHERE MONTH(vencimento) = 5 AND YEAR(vencimento) = $ano";
                    $consulta_pagamentos = mysqli_query($conexao, $sql_pagamentos);
                    $exibir_pagamentos = mysqli_fetch_array($consulta_pagamentos);

                    $receita = $exibir_receita[0] - $exibir_pagamentos[0];

                    $real = number_format($receita, 2, ',', '.');
                    print "R$ $real";?></td>
                <td><?php
                    $sql_despesa = "SELECT sum(despesa) FROM extrato WHERE MONTH(vencimento) = 5 AND YEAR(vencimento) = $ano";
                    $consulta_despesa = mysqli_query($conexao, $sql_despesa);
                    $exibir_despesa = mysqli_fetch_array($consulta_despesa);

                    $sql_emp_receita = "SELECT sum(receita) FROM emprestimo WHERE MONTH(vencimento) = 5 AND YEAR(vencimento) = $ano";
                    $consulta_emp_receita = mysqli_query($conexao, $sql_emp_receita);
                    $exibir_emp_receita = mysqli_fetch_array($consulta_emp_receita);

                    $sql_emp_despesa = "SELECT sum(despesa) FROM emprestimo WHERE MONTH(vencimento) = 5 AND YEAR(vencimento) = $ano";
                    $consulta_emp_despesa = mysqli_query($conexao, $sql_emp_despesa);
                    $exibir_emp_despesa = mysqli_fetch_array($consulta_emp_despesa);

                    $despesa = $exibir_despesa[0] - $exibir_emp_receita[0] + $exibir_emp_despesa[0];

                    $real = number_format($despesa, 2, ',', '.');
                    print "R$ $real";?></td>
                 <td><?php
                    $result = $receita - $despesa;
                    $real = number_format($result, 2, ',', '.');
                    if($result < 0){
                        print "<h6 class='vermelho'> R$ $real</h6>";
                    }else{
                        print "R$ $real";
                    }?></td>
                </tr>
                </tr>
                <tr>
                <th scope="row">Junho</th>
                <td><?php
                    $sql_receita = "SELECT sum(receita) FROM extrato WHERE MONTH(vencimento) = 6 AND YEAR(vencimento) = $ano";
                    $consulta_receita = mysqli_query($conexao, $sql_receita);
                    $exibir_receita = mysqli_fetch_array($consulta_receita);

                    $sql_pagamentos = "SELECT sum(despesa) FROM pagamentos WHERE MONTH(vencimento) = 6 AND YEAR(vencimento) = $ano";
                    $consulta_pagamentos = mysqli_query($conexao, $sql_pagamentos);
                    $exibir_pagamentos = mysqli_fetch_array($consulta_pagamentos);

                    $receita = $exibir_receita[0] - $exibir_pagamentos[0];

                    $real = number_format($receita, 2, ',', '.');
                    print "R$ $real";?></td>
                <td><?php
                    $sql_despesa = "SELECT sum(despesa) FROM extrato WHERE MONTH(vencimento) = 6 AND YEAR(vencimento) = $ano";
                    $consulta_despesa = mysqli_query($conexao, $sql_despesa);
                    $exibir_despesa = mysqli_fetch_array($consulta_despesa);

                    $sql_emp_receita = "SELECT sum(receita) FROM emprestimo WHERE MONTH(vencimento) = 6 AND YEAR(vencimento) = $ano";
                    $consulta_emp_receita = mysqli_query($conexao, $sql_emp_receita);
                    $exibir_emp_receita = mysqli_fetch_array($consulta_emp_receita);

                    $sql_emp_despesa = "SELECT sum(despesa) FROM emprestimo WHERE MONTH(vencimento) = 6 AND YEAR(vencimento) = $ano";
                    $consulta_emp_despesa = mysqli_query($conexao, $sql_emp_despesa);
                    $exibir_emp_despesa = mysqli_fetch_array($consulta_emp_despesa);

                    $despesa = $exibir_despesa[0] - $exibir_emp_receita[0] + $exibir_emp_despesa[0];

                    $real = number_format($despesa, 2, ',', '.');
                    print "R$ $real";?></td>
                 <td><?php
                    $result = $receita - $despesa;
                    $real = number_format($result, 2, ',', '.');
                    if($result < 0){
                        print "<h6 class='vermelho'> R$ $real</h6>";
                    }else{
                        print "R$ $real";
                    }?></td>
                </tr>
                </tr>
                <tr>
                <th scope="row">Julho</th>
                <td><?php
                    $sql_receita = "SELECT sum(receita) FROM extrato WHERE MONTH(vencimento) = 7 AND YEAR(vencimento) = $ano";
                    $consulta_receita = mysqli_query($conexao, $sql_receita);
                    $exibir_receita = mysqli_fetch_array($consulta_receita);

                    $sql_pagamentos = "SELECT sum(despesa) FROM pagamentos WHERE MONTH(vencimento) = 7 AND YEAR(vencimento) = $ano";
                    $consulta_pagamentos = mysqli_query($conexao, $sql_pagamentos);
                    $exibir_pagamentos = mysqli_fetch_array($consulta_pagamentos);

                    $receita = $exibir_receita[0] - $exibir_pagamentos[0];

                    $real = number_format($receita, 2, ',', '.');
                    print "R$ $real";?></td>
                <td><?php
                    $sql_despesa = "SELECT sum(despesa) FROM extrato WHERE MONTH(vencimento) = 7 AND YEAR(vencimento) = $ano";
                    $consulta_despesa = mysqli_query($conexao, $sql_despesa);
                    $exibir_despesa = mysqli_fetch_array($consulta_despesa);

                    $sql_emp_receita = "SELECT sum(receita) FROM emprestimo WHERE MONTH(vencimento) = 7 AND YEAR(vencimento) = $ano";
                    $consulta_emp_receita = mysqli_query($conexao, $sql_emp_receita);
                    $exibir_emp_receita = mysqli_fetch_array($consulta_emp_receita);

                    $sql_emp_despesa = "SELECT sum(despesa) FROM emprestimo WHERE MONTH(vencimento) = 7 AND YEAR(vencimento) = $ano";
                    $consulta_emp_despesa = mysqli_query($conexao, $sql_emp_despesa);
                    $exibir_emp_despesa = mysqli_fetch_array($consulta_emp_despesa);

                    $despesa = $exibir_despesa[0] - $exibir_emp_receita[0] + $exibir_emp_despesa[0];

                    $real = number_format($despesa, 2, ',', '.');
                    print "R$ $real";?></td>
                <td><?php
                    $result = $receita - $despesa;
                    $real = number_format($result, 2, ',', '.');
                    if($result < 0){
                        print "<h6 class='vermelho'> R$ $real</h6>";
                    }else{
                        print "R$ $real";
                    }?></td>
                </tr>
                </tr>
                <tr>
                <th scope="row">Agosto</th>
                <td><?php
                    $sql_receita = "SELECT sum(receita) FROM extrato WHERE MONTH(vencimento) = 8 AND YEAR(vencimento) = $ano";
                    $consulta_receita = mysqli_query($conexao, $sql_receita);
                    $exibir_receita = mysqli_fetch_array($consulta_receita);

                    $sql_pagamentos = "SELECT sum(despesa) FROM pagamentos WHERE MONTH(vencimento) = 9 AND YEAR(vencimento) = $ano";
                    $consulta_pagamentos = mysqli_query($conexao, $sql_pagamentos);
                    $exibir_pagamentos = mysqli_fetch_array($consulta_pagamentos);

                    $receita = $exibir_receita[0] - $exibir_pagamentos[0]; 

                    $real = number_format($receita, 2, ',', '.');
                    print "R$ $real";?></td>
                <td><?php
                    $sql_despesa = "SELECT sum(despesa) FROM extrato WHERE MONTH(vencimento) = 8 AND YEAR(vencimento) = $ano";
                    $consulta_despesa = mysqli_query($conexao, $sql_despesa);
                    $exibir_despesa = mysqli_fetch_array($consulta_despesa);

                    $sql_emp_receita = "SELECT sum(receita) FROM emprestimo WHERE MONTH(vencimento) = 8 AND YEAR(vencimento) = $ano";
                    $consulta_emp_receita = mysqli_query($conexao, $sql_emp_receita);
                    $exibir_emp_receita = mysqli_fetch_array($consulta_emp_receita);

                    $sql_emp_despesa = "SELECT sum(despesa) FROM emprestimo WHERE MONTH(vencimento) = 8 AND YEAR(vencimento) = $ano";
                    $consulta_emp_despesa = mysqli_query($conexao, $sql_emp_despesa);
                    $exibir_emp_despesa = mysqli_fetch_array($consulta_emp_despesa);

                    $despesa = $exibir_despesa[0] - $exibir_emp_receita[0] + $exibir_emp_despesa[0];

                    $real = number_format($despesa, 2, ',', '.');
                    print "R$ $real";?></td>
                 <td><?php
                    $result = $receita - $despesa;
                    $real = number_format($result, 2, ',', '.');
                    if($result < 0){
                        print "<h6 class='vermelho'> R$ $real</h6>";
                    }else{
                        print "R$ $real";
                    }?></td>
                </tr>
                </tr>
                <tr>
                <th scope="row">Setembro</th>
                <td><?php
                    $sql_receita = "SELECT sum(receita) FROM extrato WHERE MONTH(vencimento) = 9 AND YEAR(vencimento) = $ano";
                    $consulta_receita = mysqli_query($conexao, $sql_receita);
                    $exibir_receita = mysqli_fetch_array($consulta_receita);

                    $sql_pagamentos = "SELECT sum(despesa) FROM pagamentos WHERE MONTH(vencimento) = 9 AND YEAR(vencimento) = $ano";
                    $consulta_pagamentos = mysqli_query($conexao, $sql_pagamentos);
                    $exibir_pagamentos = mysqli_fetch_array($consulta_pagamentos);

                    $receita = $exibir_receita[0] - $exibir_pagamentos[0];

                    $real = number_format($receita, 2, ',', '.');
                    print "R$ $real";?></td>
                <td><?php
                    $sql_despesa = "SELECT sum(despesa) FROM extrato WHERE MONTH(vencimento) = 9 AND YEAR(vencimento) = $ano";
                    $consulta_despesa = mysqli_query($conexao, $sql_despesa);
                    $exibir_despesa = mysqli_fetch_array($consulta_despesa);

                    $sql_emp_receita = "SELECT sum(receita) FROM emprestimo WHERE MONTH(vencimento) = 9 AND YEAR(vencimento) = $ano";
                    $consulta_emp_receita = mysqli_query($conexao, $sql_emp_receita);
                    $exibir_emp_receita = mysqli_fetch_array($consulta_emp_receita);

                    $sql_emp_despesa = "SELECT sum(despesa) FROM emprestimo WHERE MONTH(vencimento) = 9 AND YEAR(vencimento) = $ano";
                    $consulta_emp_despesa = mysqli_query($conexao, $sql_emp_despesa);
                    $exibir_emp_despesa = mysqli_fetch_array($consulta_emp_despesa);

                    $despesa = $exibir_despesa[0] - $exibir_emp_receita[0] + $exibir_emp_despesa[0];

                    $real = number_format($despesa, 2, ',', '.');
                    print "R$ $real";?></td>
                 <td><?php
                    $result = $receita - $despesa;
                    $real = number_format($result, 2, ',', '.');
                    if($result < 0){
                        print "<h6 class='vermelho'> R$ $real</h6>";
                    }else{
                        print "R$ $real";
                    }?></td>
                </tr>
                </tr>
                <tr>
                <th scope="row">Outubro</th>
                <td><?php
                    $sql_receita = "SELECT sum(receita) FROM extrato WHERE MONTH(vencimento) = 10 AND YEAR(vencimento) = $ano";
                    $consulta_receita = mysqli_query($conexao, $sql_receita);
                    $exibir_receita = mysqli_fetch_array($consulta_receita);

                    $sql_pagamentos = "SELECT sum(despesa) FROM pagamentos WHERE MONTH(vencimento) = 10 AND YEAR(vencimento) = $ano";
                    $consulta_pagamentos = mysqli_query($conexao, $sql_pagamentos);
                    $exibir_pagamentos = mysqli_fetch_array($consulta_pagamentos);

                    $receita = $exibir_receita[0] - $exibir_pagamentos[0];

                    $real = number_format($receita, 2, ',', '.');
                    print "R$ $real";?></td>
                <td><?php
                    $sql_despesa = "SELECT sum(despesa) FROM extrato WHERE MONTH(vencimento) = 10 AND YEAR(vencimento) = $ano";
                    $consulta_despesa = mysqli_query($conexao, $sql_despesa);
                    $exibir_despesa = mysqli_fetch_array($consulta_despesa);

                    $sql_emp_receita = "SELECT sum(receita) FROM emprestimo WHERE MONTH(vencimento) = 10 AND YEAR(vencimento) = $ano";
                    $consulta_emp_receita = mysqli_query($conexao, $sql_emp_receita);
                    $exibir_emp_receita = mysqli_fetch_array($consulta_emp_receita);

                    $sql_emp_despesa = "SELECT sum(despesa) FROM emprestimo WHERE MONTH(vencimento) = 10 AND YEAR(vencimento) = $ano";
                    $consulta_emp_despesa = mysqli_query($conexao, $sql_emp_despesa);
                    $exibir_emp_despesa = mysqli_fetch_array($consulta_emp_despesa);

                    $despesa = $exibir_despesa[0] - $exibir_emp_receita[0] + $exibir_emp_despesa[0];

                    $real = number_format($despesa, 2, ',', '.');
                    print "R$ $real";?></td>
                 <td><?php
                    $result = $receita - $despesa;
                    $real = number_format($result, 2, ',', '.');
                    if($result < 0){
                        print "<h6 class='vermelho'> R$ $real</h6>";
                    }else{
                        print "R$ $real";
                    }?></td>
                </tr>
                </tr>
                <tr>
                <th scope="row">Novembro</th>
                <td><?php
                    $sql_receita = "SELECT sum(receita) FROM extrato WHERE MONTH(vencimento) = 11 AND YEAR(vencimento) = $ano";
                    $consulta_receita = mysqli_query($conexao, $sql_receita);
                    $exibir_receita = mysqli_fetch_array($consulta_receita);

                    $sql_pagamentos = "SELECT sum(despesa) FROM pagamentos WHERE MONTH(vencimento) = 11 AND YEAR(vencimento) = $ano";
                    $consulta_pagamentos = mysqli_query($conexao, $sql_pagamentos);
                    $exibir_pagamentos = mysqli_fetch_array($consulta_pagamentos);

                    $receita = $exibir_receita[0] - $exibir_pagamentos[0];
                    $real = number_format($receita, 2, ',', '.');
                    print "R$ $real";?></td>
                <td><?php
                    $sql_despesa = "SELECT sum(despesa) FROM extrato WHERE MONTH(vencimento) = 11 AND YEAR(vencimento) = $ano";
                    $consulta_despesa = mysqli_query($conexao, $sql_despesa);
                    $exibir_despesa = mysqli_fetch_array($consulta_despesa);

                    $sql_emp_receita = "SELECT sum(receita) FROM emprestimo WHERE MONTH(vencimento) = 11 AND YEAR(vencimento) = $ano";
                    $consulta_emp_receita = mysqli_query($conexao, $sql_emp_receita);
                    $exibir_emp_receita = mysqli_fetch_array($consulta_emp_receita);

                    $sql_emp_despesa = "SELECT sum(despesa) FROM emprestimo WHERE MONTH(vencimento) = 11 AND YEAR(vencimento) = $ano";
                    $consulta_emp_despesa = mysqli_query($conexao, $sql_emp_despesa);
                    $exibir_emp_despesa = mysqli_fetch_array($consulta_emp_despesa);

                    $despesa = $exibir_despesa[0] - $exibir_emp_receita[0] + $exibir_emp_despesa[0];

                    $real = number_format($despesa, 2, ',', '.');
                    print "R$ $real";?></td>
                 <td><?php
                 
                    $result = $receita - $despesa;
                    $real = number_format($result, 2, ',', '.');
                    if($result < 0){
                        print "<h6 class='vermelho'> R$ $real</h6>";
                    }else{
                        print "R$ $real";
                    }?></td>
                </tr>
                </tr>
                <tr>
                <th scope="row">Dezembro</th>
                <td><?php
                    $sql_receita = "SELECT sum(receita) FROM extrato WHERE MONTH(vencimento) = 12 AND YEAR(vencimento) = $ano";
                    $consulta_receita = mysqli_query($conexao, $sql_receita);
                    $exibir_receita = mysqli_fetch_array($consulta_receita);

                    $sql_pagamentos = "SELECT sum(despesa) FROM pagamentos WHERE MONTH(vencimento) = 12 AND YEAR(vencimento) = $ano";
                    $consulta_pagamentos = mysqli_query($conexao, $sql_pagamentos);
                    $exibir_pagamentos = mysqli_fetch_array($consulta_pagamentos);

                    $receita = $exibir_receita[0] - $exibir_pagamentos[0];

                    $real = number_format($receita, 2, ',', '.');
                    print "R$ $real";?></td>
                <td><?php
                    $sql_despesa = "SELECT sum(despesa) FROM extrato WHERE MONTH(vencimento) = 12 AND YEAR(vencimento) = $ano";
                    $consulta_despesa = mysqli_query($conexao, $sql_despesa);
                    $exibir_despesa = mysqli_fetch_array($consulta_despesa);

                    $sql_emp_receita = "SELECT sum(receita) FROM emprestimo WHERE MONTH(vencimento) = 12 AND YEAR(vencimento) = $ano";
                    $consulta_emp_receita = mysqli_query($conexao, $sql_emp_receita);
                    $exibir_emp_receita = mysqli_fetch_array($consulta_emp_receita);

                    $sql_emp_despesa = "SELECT sum(despesa) FROM emprestimo WHERE MONTH(vencimento) = 12 AND YEAR(vencimento) = $ano";
                    $consulta_emp_despesa = mysqli_query($conexao, $sql_emp_despesa);
                    $exibir_emp_despesa = mysqli_fetch_array($consulta_emp_despesa);

                    $despesa = $exibir_despesa[0] - $exibir_emp_receita[0] + $exibir_emp_despesa[0];

                    $real = number_format($despesa, 2, ',', '.');
                    print "R$ $real";?></td>
                 <td><?php
                    $result = $receita - $despesa;
                    $real = number_format($result, 2, ',', '.');
                    if($result < 0){
                        print "<h6 class='vermelho'> R$ $real</h6>";
                    }else{
                        print "R$ $real";
                    }?></td>
                </tr>
                <tr>
                <th scope="row">Média</th>
                <td><?php

                    //Méida Receitas
                    $sql_receita = "SELECT sum(receita) FROM extrato WHERE YEAR(vencimento) = $ano";
                    $consulta_receita = mysqli_query($conexao, $sql_receita);
                    $exibir_receita = mysqli_fetch_array($consulta_receita);

                    $sql_pagamentos = "SELECT sum(despesa) FROM pagamentos WHERE YEAR(vencimento) = $ano";
                    $consulta_pagamentos = mysqli_query($conexao, $sql_pagamentos);
                    $exibir_pagamentos = mysqli_fetch_array($consulta_pagamentos);

                    $receita = $exibir_receita[0] - $exibir_pagamentos[0];

                    $media = $receita / 12;
                    $real = number_format($media, 2, ',', '.');
                    print "<strong>R$ $real</strong>";?></td>
               <td><?php
                    //Méida Despesas
                    $sql_despesa = "SELECT sum(despesa) FROM extrato WHERE YEAR(vencimento) = $ano";
                    $consulta_despesa = mysqli_query($conexao, $sql_despesa);
                    $exibir_despesa = mysqli_fetch_array($consulta_despesa);

                    $sql_emprestimos = "SELECT sum(despesa) FROM emprestimo WHERE YEAR(vencimento) = $ano";
                    $consulta_emprestimos = mysqli_query($conexao, $sql_emprestimos);
                    $exibir_emprestimos = mysqli_fetch_array($consulta_emprestimos);

                    $sql_emprestimos_rec = "SELECT sum(receita) FROM emprestimo WHERE pago ='Sim'";
                    $consulta_emprestimos_rec = mysqli_query($conexao, $sql_emprestimos_rec);
                    $exibir_emprestimos_rec = mysqli_fetch_array($consulta_emprestimos_rec);

                    $despesa = $exibir_despesa[0] + $exibir_emprestimos[0] - $exibir_emprestimos_rec[0];
                    $media = $despesa / 12;
                    $real = number_format($media, 2, ',', '.');
                    print "<strong>R$ $real</strong>";?></td>
                <td><?php

                    //Méida Saldo
                    $result = $receita - $despesa;
                    $media = $result / 12;
                    $real = number_format($media, 2, ',', '.');
                    if($result < 0){
                        print "<strong><h6 class='vermelho'> R$ $real</h6></strong>";
                    }else{
                        print "<strong>R$ $real</strong>";
                    }?></td>
                </tr>
                <th scope="row">Total</th>
                <td><?php

                    //Total Receitas
                    $sql_receita = "SELECT sum(receita) FROM extrato WHERE YEAR(vencimento) = $ano";
                    $consulta_receita = mysqli_query($conexao, $sql_receita);
                    $exibir_receita = mysqli_fetch_array($consulta_receita);

                    $sql_pagamentos = "SELECT sum(despesa) FROM pagamentos WHERE YEAR(vencimento) = $ano";
                    $consulta_pagamentos = mysqli_query($conexao, $sql_pagamentos);
                    $exibir_pagamentos = mysqli_fetch_array($consulta_pagamentos);

                    $receita = $exibir_receita[0] - $exibir_pagamentos[0];

                    $real = number_format($receita, 2, ',', '.');
                    print "<strong>R$ $real</strong>";?></td>
               <td><?php

                    //Total Despesas
                    $sql_despesa = "SELECT sum(despesa) FROM extrato WHERE YEAR(vencimento) = $ano";
                    $consulta_despesa = mysqli_query($conexao, $sql_despesa);
                    $exibir_despesa = mysqli_fetch_array($consulta_despesa);

                    $sql_pagamentos = "SELECT sum(despesa) FROM emprestimo WHERE YEAR(vencimento) = $ano";
                    $consulta_pagamentos = mysqli_query($conexao, $sql_pagamentos);
                    $exibir_pagamentos = mysqli_fetch_array($consulta_pagamentos);

                    $sql_emprestimos_rec = "SELECT sum(receita) FROM emprestimo WHERE pago ='Sim'";
                    $consulta_emprestimos_rec = mysqli_query($conexao, $sql_emprestimos_rec);
                    $exibir_emprestimos_rec = mysqli_fetch_array($consulta_emprestimos_rec);

                    $despesa= $exibir_despesa[0] + $exibir_pagamentos[0] - $exibir_emprestimos_rec[0];
                    $real = number_format($despesa, 2, ',', '.');

                    print "<strong>R$ $real</strong>";?></td>
                <td><?php

                    //Total Saldo
                    $result = $receita - $despesa;
                    $real = number_format($result, 2, ',', '.');
                    if($result < 0){
                        print "<strong><h6 class='vermelho'> R$ $real</h6></strong>";
                    }else{
                        print "<strong>R$ $real</strong>";
                    }?></td>
                </tr>
            </tbody>
        </table>

        
    </div>

</body>

</html>