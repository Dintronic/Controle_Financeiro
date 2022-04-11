<?php

include_once("base.php");

if ($_SESSION['logado'] == false) {
    header('Location: login.html');
}

?>

<div class="container-fluid">

    <div class="row">
    </div>

    <div class="row">

        <div class="col-3">
        </div>

        <div class="col-2">
            <div class="card" style="width: 12rem; height: 16rem;">
                <img src="img\img.png" class="card-img-top">
                <div class="card-body">

                    <?php

                    //Consulta Receitas do dia
                    $sql_receita = "SELECT sum(receita) FROM extrato WHERE vencimento = '$hoje'";
                    $consulta_receita = mysqli_query($conexao, $sql_receita);
                    $exibir_receita = mysqli_fetch_array($consulta_receita);

                    $sql_pagamentos = "SELECT sum(despesa) FROM pagamentos WHERE vencimento = '$hoje'";
                    $consulta_pagamentos = mysqli_query($conexao, $sql_pagamentos);
                    $exibir_pagamentos = mysqli_fetch_array($consulta_pagamentos);

                    $resultado = $exibir_receita[0] - $exibir_pagamentos[0];

                    $real = number_format($resultado, 2, ',', '.');

                    print "<h4>R$ $real</h4>";
                    ?>

                </div>
                <div class="card-body">
                    <p class="card-text">Receitas do Dia</p>
                </div>
            </div>
        </div>

        <div class="col-2">
            <div class="card" style="width: 12rem; height: 16rem;">
                <img src="img\img.png" class="card-img-top">
                <div class="card-body">

                    <?php

                    //Consulta Despesas do dia
                    $sql_despesa = "SELECT sum(despesa) FROM extrato WHERE vencimento = '$hoje'";
                    $consulta_despesa = mysqli_query($conexao, $sql_despesa);
                    $exibir_despesa = mysqli_fetch_array($consulta_despesa);

                    $sql_emprestimos = "SELECT sum(despesa) FROM emprestimo WHERE vencimento = '$hoje'";
                    $consulta_emprestimos = mysqli_query($conexao, $sql_emprestimos);
                    $exibir_emprestimos = mysqli_fetch_array($consulta_emprestimos);

                    $sql_emprestimos_rec = "SELECT sum(receita) FROM emprestimo WHERE vencimento = '$hoje'";
                    $consulta_emprestimos_rec = mysqli_query($conexao, $sql_emprestimos_rec);
                    $exibir_emprestimos_rec = mysqli_fetch_array($consulta_emprestimos_rec);

                    $resultado = $exibir_despesa[0] + $exibir_emprestimos[0] - $exibir_emprestimos_rec[0];

                    $real = number_format($resultado, 2, ',', '.');

                    print "<h4>R$ $real</h4>";
                    ?>

                </div>
                <div class="card-body">
                    <p class="card-text">Despesas do Dia</p>
                </div>
            </div>
        </div>

        <div class="col-2">
            <div class="card" style="width: 12rem; height: 16rem;">

                <?php
                //Consulta Mês

                $sql = "SELECT sum(receita) FROM extrato WHERE MONTH(vencimento) = $mes AND YEAR(vencimento) = $ano";
                $consulta = mysqli_query($conexao, $sql);
                $exibir_receita = mysqli_fetch_array($consulta);

                $sql = "SELECT sum(despesa) FROM extrato WHERE MONTH(vencimento) = $mes AND YEAR(vencimento) = $ano";
                $consulta = mysqli_query($conexao, $sql);
                $exibir_despesa = mysqli_fetch_array($consulta);

                $receita = $exibir_receita[0];
                $despesa = $exibir_despesa[0];
                $result = $receita - $despesa;

                if ($result < 0) {
                    print "<img src='img\img.png' class='card-img-top'>";
                } else {
                    print "<img src='img\img.png' class='card-img-top'>";
                }
                ?>
                <div class="card-body">
                    <?php

                    if ($result < 0) {
                        print $result . "<h5 class='preto'>Da Uma Controlada, Está no Vermelho</h5>";
                    } else {
                        print "<h5 class='preto'>Parabens! Você esta positivo esse Mês</h5>";
                    }
                    ?>

                </div>
                <div class="card-body">
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-3">
        </div>

        <div class="col-2">
            <div class="card" style="width: 12rem; height: 16rem;">
                <img src="img\img.png" class="card-img-top">
                <div class="card-body">
                    <?php

                    $sql_receita = "SELECT sum(receita) FROM extrato WHERE YEAR(vencimento) = $ano AND categoria LIKE 'Juros' AND pago ='Sim'";
                    $consulta_receita = mysqli_query($conexao, $sql_receita);
                    $exibir_receita = mysqli_fetch_array($consulta_receita);

                    $result = $exibir_receita[0];
                    $real = number_format($result, 2, ',', '.');
                    print "<h4> R$ $real</h4>";
                    ?>
                </div>
                <div class="card-body">
                    <p class="card-text">Juros Poupança <?php print $ano; ?></p>
                </div>
            </div>
        </div>

        <div class="col-2">
            <div class="card" style="width: 12rem; height: 16rem;">
                <img src="img\img.png" class="card-img-top">
                <div class="card-body">
                    <?php

                    $sql_receita = "SELECT sum(receita) FROM extrato WHERE YEAR(vencimento) = $ano";
                    $consulta_receita = mysqli_query($conexao, $sql_receita);
                    $exibir_receita = mysqli_fetch_array($consulta_receita);

                    $sql_pagamentos = "SELECT sum(despesa) FROM pagamentos WHERE YEAR(vencimento) = $ano";
                    $consulta_pagamentos = mysqli_query($conexao, $sql_pagamentos);
                    $exibir_pagamentos = mysqli_fetch_array($consulta_pagamentos);

                    $result = $exibir_receita[0] - $exibir_pagamentos[0];
                    $real = number_format($result, 2, ',', '.');
                    print "<h4> R$ $real</h4>";
                    ?>
                </div>
                <div class="card-body">
                    <p class="card-text">Receitas Ano <?php print $ano; ?></p>
                </div>
            </div>
        </div>

        <div class="col-2">
            <div class="card" style="width: 12rem; height: 16rem;">
                <img src="img\img.png" class="card-img-top">
                <div class="card-body">
                    <?php

                    $sql_receita = "SELECT sum(despesa) FROM extrato WHERE YEAR(vencimento) = $ano";
                    $consulta_receita = mysqli_query($conexao, $sql_receita);
                    $exibir_receita = mysqli_fetch_array($consulta_receita);

                    $sql_emprestimos = "SELECT sum(despesa) FROM emprestimo WHERE YEAR(vencimento) = $ano";
                    $consulta_emprestimos = mysqli_query($conexao, $sql_emprestimos);
                    $exibir_emprestimos = mysqli_fetch_array($consulta_emprestimos);

                    $sql_emprestimos_rec = "SELECT sum(receita) FROM emprestimo WHERE YEAR(vencimento) = $ano";
                    $consulta_emprestimos_rec = mysqli_query($conexao, $sql_emprestimos_rec);
                    $exibir_emprestimos_rec = mysqli_fetch_array($consulta_emprestimos_rec);

                    $result = $exibir_receita[0] + $exibir_emprestimos[0] - $exibir_emprestimos_rec[0];

                    $real = number_format($result, 2, ',', '.');

                    print "<h4> R$ $real</h4>";
                    ?>
                </div>
                <div class="card-body">
                    <p class="card-text">Gastos Ano <?php print $ano; ?></p>
                </div>
            </div>
        </div>

    </div>

</div>

</div>

</body>

</html>