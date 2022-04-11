<?php

include_once("base.php");

if ($_SESSION['logado'] == false) {
    header('Location: login.html');
}
?>

<body>

    <div class="container">

        <div class="row">
            <div class="col">
                <h4>Controle Financeiro</h4>
            </div>
        </div><br>

        <div class="row">
            <div class="col">
                <?php

                $vencimento = $_POST['vencimento'];
                $descricao = $_POST['descricao'];
                $despesa = $_POST["despesa"];
                $categoria = $_POST['categoria'];
                $carteira = $_POST['carteira'];
                $pago = $_POST['pago'];

                $sql = "INSERT INTO pagamentos (vencimento,descricao,despesa,categoria,carteira,pago) VALUES ('$vencimento','$descricao','$despesa','$categoria','$carteira','$pago')";

                $salvar = mysqli_query($conexao, $sql);

                $linhas = mysqli_affected_rows($conexao);

                if (mysqli_affected_rows($conexao)) {

                    echo "<p style='color:black; font-size: 18px'>Adicionar Anexo?</p><br>";

                    echo "<a type='button' class='btn btn-danger' href='anexo.php'>Anexar</a><br><br><br>";

                    echo "<p style='color:green; font-size: 18px'>Cadastro Efetuado com Sucesso !!!</p><br>";

                    echo "<div class='col-12'><a type='button' class='btn btn-outline-success' href='extrato.php'>Voltar</a>

                        <a type='button' class='btn btn-outline-warning' href='pagamentos.php'>Novo Pagamentos</a></div>";
                } else {
                    echo "<p style='color:red; font-size: 18px'>Não Alterado Valores</p><br><br>";
                    echo "<a type='button' class='btn btn-primary' href='extrato.php'>Voltar</a>";
                }

                ?>
            </div>
        </div>

    </div>

</body>

</html>