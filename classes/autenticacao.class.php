<?php

require_once 'conexao.class.php';
require_once 'login.class.php';

$login = new Login();

$conexao = new Conexao();
$matricula = $_POST['matricula'];
$senha = md5($_POST['senha']);

$mysqli = $conexao->BDAbreConexao();

$sql = "SELECT * FROM usuario WHERE(matricula like '$matricula' and senha = '$senha')";
$mysqli->query($sql) or die(mysqli_error($mysqli));
$resultado = mysqli_affected_rows($mysqli);

$conexao->BDFecharConexao($mysqli);

if ($resultado > 0) {
    session_start();
    $_SESSION['matricula'] = $_POST['matricula'];
    header("Location: /inicio");
} else {
    $login->registrarTentativaLogin($matricula);
    header("Location: /login");
}
  