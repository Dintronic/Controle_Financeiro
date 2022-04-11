<?php

include_once("base.php");

if($_SESSION['logado'] == false) {
    header('Location: login.html');
} 

date_default_timezone_set('America/Sao_Paulo');
$hoje = date('Y-m-d');
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

?>

<body>

    <div class="container">

        <div class="row">
            <div class="col">
              <h4>Extrato Movimentação -  <?php print "".$mes_data." ".$ano.""; ?></h4><br>
            </div>
        </div>

        <div class="row">

            <div class="col-2">
            </div>

            <div class="col-4">
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

            <div class="col-4">           
                <form method="POST">
                    <div class="input-group mb-3">
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
        </div><br>

        <table class="table  table-hover table-sm">

        <thead>
        <tr>
        <th scope="col">Data</th>
        <th scope="col">Saída</th>
        <th scope="col">Valor</th>
        <th scope="col">Entrada</th>
        <th scope="col">Pago</th>
        <th scope="col">Edita</th>
        </tr>
        </thead>
        <tbody>
        <?php

            //Consulta Banco
            $sql = "SELECT * FROM movimentacao WHERE MONTH(dia) = $mes AND YEAR(dia) = $ano ORDER BY dia";
            $consulta = mysqli_query($conexao, $sql); 

            $hoje = date('Y-m-d');

            
            while ($exibirRegistros = mysqli_fetch_array($consulta)) {

                $id = $exibirRegistros[0];
                $dia = $exibirRegistros[1];
                $dia_br = date('d/m/Y', strtotime($dia));
                $saida = $exibirRegistros[2];
                $valor1 = $exibirRegistros[3];
                $real_valor1 = number_format($valor1, 2, ',', '.');
                $entrada = $exibirRegistros[4];
                $pago = $exibirRegistros[6];
                
                print "<tr>";
                print "<td>$dia_br</td>";  
                print "<td>$saida</td>";    
                print "<td>$real_valor1</td>";    
                print "<td>$entrada</td>";    
                print "<td>$pago</td>";            
                print "<td><a href='edita.php?id=" . $id . "'>Edita</a></td>";
                print "</tr>"; 
            }
        ?>
        </tbody>   
        </table>

        <div class="row">
            <div class="col">
                <?php
                    //Mostra Registros
                    $sql = "SELECT * FROM movimentacao WHERE MONTH(dia) = $mes AND YEAR(dia) = $ano";
                    $consulta = mysqli_query($conexao, $sql);
                    $registros = mysqli_num_rows($consulta);

                    print "<strong>$registros</strong> Registros Encontrados!";
                ?>
            </div> 
        </div> <br>    

    </div>

</body>

</html>