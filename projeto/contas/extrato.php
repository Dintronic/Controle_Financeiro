<?php

include_once("base.php");

if ($_SESSION['logado'] == false) {
    header('Location: login.html');
}

$filtro = "descricao";
$palavra = "";
$extrato = isset($_GET['extrato']) ? $_GET['extrato'] : "";

$mes_extrato = date('m');
$ano_extrato = date('Y');
$mes = $mes_extrato;
$ano = $ano_extrato;

//Script para mander a seleção do select MÊS
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['mes'])) {
    $mes = $_POST['mes'];
    $_SESSION['mes'] = $_POST['mes'];
} elseif (isset($_SESSION['mes'])) {
    $mes = $_SESSION['mes'];
}

//Script para mander a seleção do select ANO
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['ano'])) {
    $ano = $_POST['ano'];
    $_SESSION['ano'] = $_POST['ano'];
} elseif (isset($_SESSION['ano'])) {
    $ano = $_SESSION['ano'];
}

//Script para mander a seleção do select FILTRO
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['filtro'])) {
    $filtro = $_POST['filtro'];
    $_SESSION['filtro'] = $_POST['filtro'];
} elseif (isset($_SESSION['filtro'])) {
    $filtro = $_SESSION['filtro'];
}

//Script para mander a seleção do select PALAVRA
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['palavra'])) {
    $palavra = $_POST['palavra'];
    $_SESSION['palavra'] = $_POST['palavra'];
} elseif (isset($_SESSION['palavra'])) {
    $palavra = $_SESSION['palavra'];
}

//Script para mostrar o mês selecionado
switch ($mes) {
    case 1:
        $mes_data = "Janeiro";
        break;
    case 2:
        $mes_data = "Fevereiro";
        break;
    case 3:
        $mes_data = "Março";
        break;
    case 4:
        $mes_data = "Abril";
        break;
    case 5:
        $mes_data = "Maio";
        break;
    case 6:
        $mes_data = "Junho";
        break;
    case 7:
        $mes_data = "Julho";
        break;
    case 8:
        $mes_data = "Agosto";
        break;
    case 9:
        $mes_data = "Setembro";
        break;
    case 10:
        $mes_data = "Outubro";
        break;
    case 11:
        $mes_data = "Novembro";
        break;
    case 12:
        $mes_data = "Dezembro";
        break;
    default:
        $mes_data = "Janeiro";
}

//Script para mostrar o mês selecionado
if ($filtro == "receita") {
    $filtro_select = "Receitas";
} elseif ($filtro == "despesa") {
    $filtro_select = "Despesas";
} elseif ($filtro == "categoria") {
    $filtro_select = "Categoria";
} elseif ($filtro == "carteira") {
    $filtro_select = "Carteira";
} elseif ($filtro == "pago") {
    $filtro_select = "Pago";
} else {
    $filtro_select = "Descrição";
}

?>

<body>

    <div class="container">

        <div class="row">
            <div class="col">
                <h4>Extrato - <?php print "" . $mes_data . " " . $ano . ""; ?></h4>
            </div>
        </div><br>

        <div class="row">

            <div class="col-2">
                <form method="POST">
                    <div class="input-group ">
                        <span class="input-group-text" id="basic-addon1">Ano</span>
                        <select class="form-select" name="ano" required onchange="this.form.submit()">
                            <?php
                            echo '<option value="' . $ano . '" disabled selected>' . ((empty($ano)) ?: $ano) . '</option>';
                            ?>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                        </select>
                    </div>
                </form>
            </div>

            <div class="col-3">
                <form method="POST">
                    <div class="input-group ">
                        <span class="input-group-text" id="basic-addon1">Mês</span>
                        <select class="form-select" name="mes" required onchange="this.form.submit()">
                            <?php
                            echo '<option value="' . $mes . '" disabled selected>' . ((empty($mes)) ?: $mes_data) . '</option>';
                            ?>
                            <option value="1">Janeiro</option>
                            <option value="2">Fevereiro</option>
                            <option value="3">Março</option>
                            <option value="4">Abril</option>
                            <option value="5">Maio</option>
                            <option value="6">Junho</option>
                            <option value="7">Julho</option>
                            <option value="8">Agosto</option>
                            <option value="9">Setembro</option>
                            <option value="10">Outubro</option>
                            <option value="11">Novembro</option>
                            <option value="12">Dezembro</option>
                        </select>
                    </div>
                </form>
            </div>

            <div class="col-3">
                <form method="POST">
                    <div class="input-group ">
                        <span class="input-group-text" id="basic-addon1">Filtro</span>
                        <select class="form-select" name="filtro" required onchange="this.form.submit()">
                            <?php
                            echo '<option value="' . $filtro . '" disabled selected>' . ((empty($filtro)) ?: $filtro_select) . '</option>';
                            ?>
                            <option value="descricao">Descrição</option>
                            <option value="receita">Receitas</option>
                            <option value="despesa">Despesas</option>
                            <option value="categoria">Categoria</option>
                            <option value="carteira">Carteira</option>
                            <option value="pago">Pago</option>
                        </select>
                    </div>
                </form>
            </div>


            <div class="col-3">

                <form method="POST" action="">

                    <div class="input-group">
                        <input type="text" name="palavra" class="form-control" value="<?php echo $palavra; ?>">
                        <input type="submit" class="btn btn-outline-secondary" value="Pesquisar">
                    </div>

                </form>
            </div>


            <div class="col-1">
                <div class="input-group">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#balanco">Balanço</button>
                </div>
            </div>

        </div><br>

        <table class="table table-hover table-sm">

            <thead>
                <tr>
                    <th scope="col">Status</th>
                    <th scope="col">Data</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Receitas</th>
                    <th scope="col">Despesas</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Ico</th>
                    <th scope="col">Carteira</th>
                    <th scope="col">Vencimento</th>
                    <th scope="col">Pago</th>
                    <th scope="col">Anexo</th>
                    <th scope="col">Edita</th>
                </tr>
            </thead>
            <tbody>

                <?php

                //Consulta Banco
                $sql = "SELECT * FROM extrato WHERE MONTH(vencimento) = $mes AND YEAR(vencimento) = $ano AND $filtro LIKE '%$palavra%' ORDER BY vencimento";
                $consulta = mysqli_query($conexao, $sql);

                $hoje = date('Y-m-d');


                while ($exibirRegistros = mysqli_fetch_array($consulta)) {

                    $id = $exibirRegistros[0];
                    $vencimento = $exibirRegistros[1];
                    $data1 = strtotime($vencimento);
                    $data2 = strtotime($hoje);
                    $dias = ($data1 - $data2) / 86400;
                    $format_dias = number_format($dias, 0, '', ' ');
                    $vencimento_br = date('d/m/Y', strtotime($vencimento));
                    $descricao = $exibirRegistros[2];
                    $receita = $exibirRegistros[3];
                    $real_receita = number_format($receita, 2, ',', '.');
                    $despesa = $exibirRegistros[4];
                    $real_despesa = number_format($despesa, 2, ',', '.');
                    $categoria = $exibirRegistros[5];
                    $carteira = $exibirRegistros[6];
                    $anexo = $exibirRegistros[7];
                    $pago = $exibirRegistros[8];

                    print "<tr>";

                    if ($pago == 'Não' && $vencimento == $hoje) {

                        if ($pago == "Sim") {
                            print "<td><img src='..\img\pago.png'></td>";
                        } else {
                            print "<td><img src='..\img\pendente.png'></td>";
                        }

                        print "<td class='alerta'> $vencimento_br </td>";
                        print "<td class='alerta'> $descricao </td>";

                        if ($receita == 0) {
                            print "<td class='alerta'>-</td>";
                        } else {
                            print "<td class='alerta'>+R$$real_receita</td>";
                        }

                        if ($despesa == 0) {
                            print "<td class='alerta''>-</td>";
                        } else {
                            print "<td class='alerta'>-R$$real_despesa</td>";
                        }

                        print "<td class='alerta'>$categoria</td>";

                        if ($categoria == "Pets") {
                            print "<td><img src='..\img\ico\pet.png'></td>";
                        } elseif ($categoria == "Juros") {
                            print "<td><img src='..\img\ico\juros.png'></td>";
                        } elseif ($categoria == "Saúde") {
                            print "<td><img src='..\img\ico\saude.png'></td>";
                        } elseif ($categoria == "Vendas") {
                            print "<td><img src='..\img\ico\work.png'></td>";
                        } elseif ($categoria == "Mercado") {
                            print "<td><img src='..\img\ico\mercado.png'></td>";
                        } elseif ($categoria == "Moradia") {
                            print "<td><img src='..\img\ico\moradia.png'></td>";
                        } elseif ($categoria == "Serviços") {
                            print "<td><img src='..\img\ico\servicos.png'></td>";
                        } elseif ($categoria == "Diversão") {
                            print "<td><img src='..\img\ico\diversao.png'></td>";
                        } elseif ($categoria == "Transporte") {
                            print "<td ><img src='..\img\ico\carro.png'></td>";
                        } elseif ($categoria == "Alimentação") {
                            print "<td><img src='..\img\ico\comida.png'></td>";
                        } else {
                            print "<td><img src='..\img\ico\geral.png'></td>";
                        }

                        print "<td class='alerta'>$carteira</td>";

                        if ($vencimento == $hoje) {
                            print "<td class='alerta'>Vence Hoje</td>";
                        } elseif ($vencimento < $hoje) {
                            print "<td class='alerta'>Vencido</td>";
                        } else {
                            print "<td class='alerta'>$format_dias dias</td>";
                        }

                        print "<td class='alerta'>$pago</td>";

                        if ($anexo == null || $anexo == "") {
                            print "<td><a href='edita_anexo.php?id=" . $id . "'>+</a></td>";
                        } else {
                            print "<td><a href='exibir_anexo.php?id=" . $id . "'>Anexos</a></td>";
                        }

                        print "<td><a href='edita.php?id=" . $id . "'>Edita</a></td>";
                    } elseif ($pago == 'Não' && $vencimento < $hoje) {

                        if ($pago == "Sim") {
                            print "<td><img src='..\img\pago.png'></td>";
                        } else {
                            print "<td><img src='..\img\pendente.png'></td>";
                        }

                        print "<td class='aviso'> $vencimento_br </td>";
                        print "<td class='aviso'> $descricao </td>";

                        if ($receita == 0) {
                            print "<td class='aviso'>-</td>";
                        } else {
                            print "<td class='aviso'>+R$$real_receita</td>";
                        }

                        if ($despesa == 0) {
                            print "<td class='aviso'>-</td>";
                        } else {
                            print "<td class='aviso'>-R$$real_despesa</td>";
                        }

                        print "<td class='aviso'>$categoria</td>";

                        if ($categoria == "Pets") {
                            print "<td><img src='..\img\ico\pet.png'></td>";
                        } elseif ($categoria == "Juros") {
                            print "<td><img src='..\img\ico\juros.png'></td>";
                        } elseif ($categoria == "Saúde") {
                            print "<td><img src='..\img\ico\saude.png'></td>";
                        } elseif ($categoria == "Vendas") {
                            print "<td><img src='..\img\ico\work.png'></td>";
                        } elseif ($categoria == "Mercado") {
                            print "<td><img src='..\img\ico\mercado.png'></td>";
                        } elseif ($categoria == "Moradia") {
                            print "<td><img src='..\img\ico\moradia.png'></td>";
                        } elseif ($categoria == "Serviços") {
                            print "<td><img src='..\img\ico\servicos.png'></td>";
                        } elseif ($categoria == "Diversão") {
                            print "<td><img src='..\img\ico\diversao.png'></td>";
                        } elseif ($categoria == "Transporte") {
                            print "<td><img src='..\img\ico\carro.png'></td>";
                        } elseif ($categoria == "Alimentação") {
                            print "<td><img src='..\img\ico\comida.png'></td>";
                        } else {
                            print "<td><img src='..\img\ico\geral.png'></td>";
                        }

                        print "<td class='aviso'>$carteira</td>";

                        if ($vencimento == $hoje) {
                            print "<td class='aviso'>Vence Hoje</td>";
                        } elseif ($vencimento < $hoje) {
                            print "<td class='aviso'>Vencido</td>";
                        } else {
                            print "<td class='aviso'>$format_dias dias</td>";
                        }

                        print "<td class='aviso'>$pago</td>";

                        if ($anexo == null || $anexo == "") {
                            print "<td><a href='edita_anexo.php?id=" . $id . "'>+</a></td>";
                        } else {
                            print "<td><a href='exibir_anexo.php?id=" . $id . "'>Anexos</a></td>";
                        }

                        print "<td><a href='edita.php?id=" . $id . "'>Edita</a></td>";
                    } else {

                        if ($pago == "Sim") {
                            print "<td><img src='..\img\pago.png'></td>";
                        } else {
                            print "<td><img src='..\img\pendente.png'></td>";
                        }

                        print "<td> $vencimento_br </td>";
                        print "<td> $descricao </td>";

                        if ($receita == 0) {
                            print "<td class='azul'>-</td>";
                        } else {
                            print "<td class='azul'>+R$$real_receita</td>";
                        }

                        if ($despesa == 0) {
                            print "<td class='vermelh0'>-</td>";
                        } else {
                            print "<td class='vermelho'>-R$$real_despesa</td>";
                        }

                        print "<td>$categoria</td>";

                        if ($categoria == "Pets") {
                            print "<td><img src='..\img\ico\pet.png'></td>";
                        } elseif ($categoria == "Juros") {
                            print "<td><img src='..\img\ico\juros.png'></td>";
                        } elseif ($categoria == "Saúde") {
                            print "<td><img src='..\img\ico\saude.png'></td>";
                        } elseif ($categoria == "Vendas") {
                            print "<td><img src='..\img\ico\work.png'></td>";
                        } elseif ($categoria == "Mercado") {
                            print "<td><img src='..\img\ico\mercado.png'></td>";
                        } elseif ($categoria == "Moradia") {
                            print "<td><img src='..\img\ico\moradia.png'></td>";
                        } elseif ($categoria == "Serviços") {
                            print "<td><img src='..\img\ico\servicos.png'></td>";
                        } elseif ($categoria == "Diversão") {
                            print "<td><img src='..\img\ico\diversao.png'></td>";
                        } elseif ($categoria == "Transporte") {
                            print "<td><img src='..\img\ico\carro.png'></td>";
                        } elseif ($categoria == "Alimentação") {
                            print "<td><img src='..\img\ico\comida.png'></td>";
                        } else {
                            print "<td><img src='..\img\ico\geral.png'></td>";
                        }

                        print "<td>$carteira</td>";

                        if ($vencimento == $hoje) {
                            print "<td>Vence Hoje</td>";
                        } elseif ($vencimento < $hoje) {
                            print "<td>Vencido</td>";
                        } else {
                            print "<td>$format_dias dias</td>";
                        }

                        print "<td>$pago</td>";

                        if ($anexo == null || $anexo == "") {
                            print "<td><a href='edita_anexo.php?id=" . $id . "'>+</a></td>";
                        } else {
                            print "<td><a href='exibir_anexo.php?id=" . $id . "'>Anexos</a></td>";
                        }

                        print "<td><a href='edita.php?id=" . $id . "'>Edita</a></td>";
                    }

                    print "</tr>";
                }
                ?>
                <th scope="col" class="linha">-</th>
                <th scope="col" class="linha">-</th>
                <th scope="col" class="linha">Total</th>
                <th scope="col" class="linha">
                    <?php
                    $sql_fundos = "SELECT sum(receita) FROM extrato WHERE MONTH(vencimento) = $mes AND YEAR(vencimento) = $ano AND carteira LIKE 'Fundos Diversos'";
                    $consulta_fundos = mysqli_query($conexao, $sql_fundos);
                    $exibir_fundos = mysqli_fetch_array($consulta_fundos);

                    $fundos_receita = $exibir_fundos[0];

                    $sql_receita = "SELECT sum(receita) FROM extrato WHERE MONTH(vencimento) = $mes AND YEAR(vencimento) = $ano AND $filtro LIKE '%$palavra%'";
                    $consulta_receita = mysqli_query($conexao, $sql_receita);
                    $exibir_receita = mysqli_fetch_array($consulta_receita);

                    $result = $exibir_receita[0];

                    $valor =  $result - $fundos_receita;

                    $real = number_format($valor, 2, ',', '.');

                    print "<div class='azul'>R$ $real</div>";
                    ?>
                </th>
                <th scope="col" class="linha">
                    <?php
                    $sql_fundos = "SELECT sum(despesa) FROM extrato WHERE MONTH(vencimento) = $mes AND YEAR(vencimento) = $ano AND carteira LIKE 'Fundos Diversos'";
                    $consulta_fundos = mysqli_query($conexao, $sql_fundos);
                    $exibir_fundos = mysqli_fetch_array($consulta_fundos);

                    $fundos_despesa = $exibir_fundos[0];

                    $sql_despesa = "SELECT sum(despesa) FROM extrato WHERE MONTH(vencimento) = $mes AND YEAR(vencimento) = $ano AND $filtro LIKE '%$palavra%'";
                    $consulta_despesa = mysqli_query($conexao, $sql_despesa);
                    $exibir_despesa = mysqli_fetch_array($consulta_despesa);

                    $result = $exibir_despesa[0];

                    $valor =  $result - $fundos_despesa;

                    $real = number_format($valor, 2, ',', '.');

                    print "<div class='vermelho'>R$ $real</div>";
                    ?>
                </th>
                <th scope="col" class="linha">-</th>
                <th scope="col" class="linha">-</th>
                <th scope="col" class="linha">-</th>
                <th scope="col" class="linha">-</th>
                <th scope="col" class="linha">-</th>
                <th scope="col" class="linha">-</th>
                <th scope="col" class="linha">-</th>
                </tr>
            </tbody>
        </table>

        <div class="row">
            <div class="col">
                <?php
                //Mostra Registros
                $sql = "SELECT * FROM extrato WHERE MONTH(vencimento) = $mes AND YEAR(vencimento) = $ano AND $filtro LIKE '%$palavra%'";
                $consulta = mysqli_query($conexao, $sql);
                $registros = mysqli_num_rows($consulta);

                print "<strong>$registros</strong> Registros Encontrados!";
                ?>
            </div>
        </div> <br>

        <!-- Modal Balanço -->
        <div class="modal fade" id="balanco" tabindex="-1" aria-labelledby="balancoLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="balancoLabel">Saldo - <?php print " $mes_data"; ?></h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row">

                            <div class="col-1">
                            </div>

                            <div class="col-3">
                                <div class="card" style="width: 12rem; height: 16rem;">
                                    <img src="..\img\img.png" class="card-img-top">
                                    <div class="card-body">
                                        <?php

                                        $sql_fundos = "SELECT sum(receita) FROM extrato WHERE MONTH(vencimento) = $mes AND YEAR(vencimento) = $ano AND carteira LIKE 'Fundos Diversos'";
                                        $consulta_fundos = mysqli_query($conexao, $sql_fundos);
                                        $exibir_fundos = mysqli_fetch_array($consulta_fundos);

                                        $fundos_receita = $exibir_fundos[0];

                                        $sql_receita = "SELECT sum(receita) FROM extrato WHERE MONTH(vencimento) = $mes AND YEAR(vencimento) = $ano";
                                        $consulta_receita = mysqli_query($conexao, $sql_receita);
                                        $exibir_receita = mysqli_fetch_array($consulta_receita);

                                        $result = $exibir_receita[0];

                                        $sql_pagamentos = "SELECT sum(despesa) FROM pagamentos WHERE MONTH(vencimento) = $mes AND YEAR(vencimento) = $ano";
                                        $consulta_pagamentos = mysqli_query($conexao, $sql_pagamentos);
                                        $exibir_pagamentos = mysqli_fetch_array($consulta_pagamentos);

                                        $pagamentos = $exibir_pagamentos[0];

                                        $valor_receita =  $result - $fundos_receita - $pagamentos;

                                        $real = number_format($valor_receita, 2, ',', '.');

                                        print "<h4> R$ $real</h4>";
                                        ?>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-1">Receitas</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="card" style="width: 12rem; height: 16rem;">
                                    <img src="..\img\img.png" class="card-img-top">
                                    <div class="card-body">
                                        <?php

                                        $sql_fundos = "SELECT sum(despesa) FROM extrato WHERE MONTH(vencimento) = $mes AND YEAR(vencimento) = $ano AND carteira LIKE 'Fundos Diversos'";
                                        $consulta_fundos = mysqli_query($conexao, $sql_fundos);
                                        $exibir_fundos = mysqli_fetch_array($consulta_fundos);

                                        $fundos_despesa = $exibir_fundos[0];

                                        $sql_despesa = "SELECT sum(despesa) FROM extrato WHERE MONTH(vencimento) = $mes AND YEAR(vencimento) = $ano";
                                        $consulta_despesa = mysqli_query($conexao, $sql_despesa);
                                        $exibir_despesa = mysqli_fetch_array($consulta_despesa);

                                        $result = $exibir_despesa[0];

                                        $sql_emp_receita = "SELECT sum(receita) FROM emprestimo WHERE MONTH(vencimento) = $mes AND YEAR(vencimento) = $ano";
                                        $consulta_emp_receita = mysqli_query($conexao, $sql_emp_receita);
                                        $exibir_emp_receita = mysqli_fetch_array($consulta_emp_receita);

                                        $sql_emp_despesa = "SELECT sum(despesa) FROM emprestimo WHERE MONTH(vencimento) = $mes AND YEAR(vencimento) = $ano";
                                        $consulta_emp_despesa = mysqli_query($conexao, $sql_emp_despesa);
                                        $exibir_emp_despesa = mysqli_fetch_array($consulta_emp_despesa);

                                        $emprestimo = $exibir_emp_receita[0] - $exibir_emp_despesa[0];

                                        $valor_despesa =  $result - $fundos_despesa - $emprestimo;

                                        $real = number_format($valor_despesa, 2, ',', '.');

                                        print "<h4> R$ $real</h4>";
                                        ?>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-1">Depesas</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="card" style="width: 12rem; height: 16rem;">

                                    <?php

                                    $result = ($valor_receita - $fundos_receita) - $valor_despesa;

                                    if ($result < 0) {
                                        print "<img src='..\img\img.png' class='card-img-top'>";
                                    } else {
                                        print "<img src='..\img\img.png' class='card-img-top'>";
                                    }
                                    ?>
                                    <div class="card-body">
                                        <?php

                                        $real = number_format($result, 2, ',', '.');

                                        if ($result < 0) {
                                            print "<h4 class='vermelho'> R$ $real</h4>";
                                        } else {
                                            print "<h4> R$ $real</h4>";
                                        }
                                        ?>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-1">Saldo</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script>

</body>

</html>