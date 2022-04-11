<?php
session_start();
$_SESSION['logado'] = $_SESSION['logado'] ?? false;

include_once("conexao.php");

$username = isset($_POST['username'])?$_POST['username']:"";
$password = isset($_POST['password'])?$_POST['password']:"";

$login = "SELECT nome, senha FROM usuario;";
$conecta = mysqli_query($conexao, $login);

$exibirRegistros = mysqli_fetch_array($conecta);

$nome = $exibirRegistros[0];
$senha = $exibirRegistros[1]; 

if($username == $nome && $password == $senha ){

    $_SESSION['logado'] = true;   
    header('Location: index.php');

}else{
   
    header('Location: login_erro.html');
}      
    
?>


