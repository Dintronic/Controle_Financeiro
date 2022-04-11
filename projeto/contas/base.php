<?php

session_start();

include_once("../conexao.php");

if($_SESSION['logado'] == false) {
    header('Location: login.html');
} 

date_default_timezone_set('America/Sao_Paulo');
$hoje = date('Y-m-d');
$mes = date('m');
$ano = date('Y');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../bootstrap\css\bootstrap.css">
    <link rel="stylesheet" href="../style.css">
    <title>Contas</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

        <div class="container-fluid">

            <a class="navbar-brand" href="../index.php">Home</a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../telas/saldo.php">Saldos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../telas/resumo.php">Resumo</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Extratos
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="extrato.php">Contas</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../movimentacao/extrato.php">Movimentações</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../emprestimos/extrato.php">Empréstimos</a></li>
                            <li><a class="dropdown-item" href="../pagamentos/extrato.php">Pagamentos</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Cadastro
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../cadastros/receitas.php">Receitas</a></li>
                            <li><a class="dropdown-item" href="../cadastros/despesas.php">Despesas</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../movimentacao/movimentacao.php">Movimentação</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../emprestimos/emprestimo.php">Empréstimos</a></li>
                            <li><a class="dropdown-item" href="../pagamentos/pagamentos.php">Pagamentos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../sair.php">Sair</a>
                    </li>
                </ul>
                <div class="data">
                    <h5><?php $hoje_br = date('d/m/Y', strtotime($hoje));
                        print $hoje_br;?>
                    </h5>  
                </div>
            </div>
        </div>
    </nav>


    <script src="../bootstrap/js/bootstrap.js"></script>

    <script>
        var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
        var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
            return new bootstrap.Dropdown(dropdownToggleEl)
        })
    </script>

    
                    
</body>

</html>