<?php

require_once 'conexao.class.php';
require_once 'login.class.php';

$login = new Login();

$conexao = new Conexao();
$matricula = $_POST['matricula'];
$senha = md5($_POST['senha']);

$mysqli = $conexao->BDAbreConexao();

$resultado = $conexao->BDSeleciona('usuario', '*', "WHERE(matricula like '$matricula' and senha = '$senha')");

if ($login->checarTentativasLogin($matricula)) {


    if (!is_null($resultado[0]['id'])) {
        session_start();
        $_SESSION['matricula'] = $_POST['matricula'];

        $login->excluirTentativasLogin($matricula);

        header("Location: /inicio");
    } else {
        $conexao->BDFecharConexao($mysqli);
        $login->registrarTentativaLogin($matricula);
        header("Location: /login");
    }

    }else{
        die("usuario bloqueado");
    }


$conexao->BDFecharConexao($mysqli);
