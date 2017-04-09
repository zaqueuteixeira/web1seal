<?php

require_once './conexao.class.php';

$conexao = new Conexao();

$nome = $_POST['nome'];
$matricula = $_POST['matricula'];
$email = $_POST['email'];
$username = $_POST['username'];
$turma = $_POST['turma'];
$ano = $_POST['semestre'];
$senha = $_POST['senha'];
$repetaSenha = $_POST['repeta-senha'];
$semestre = $_POST['semestre'];

$dados = [
    'nome' => $nome,
    'matricula' => $matricula,
    'email' => $email,
    'username' => $username,
    'turma' => $turma,
    'semestre' => $ano,
    'senha' => md5($senha),
    'semestre' => $semestre
];

$conexao->BDAbreConexao();
    $sql = $conexao->DBGravar('usuario', $dados);
$conexao->BDFecharConexao($conexao);

session_start();
$_SESSION['matricula'] = $_POST['matricula'];

header("Location: /inicio");
