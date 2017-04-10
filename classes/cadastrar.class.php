<?php

require_once './conexao.class.php';

$conexao = new Conexao();

$nome = $_POST['nome'];
$matricula = $_POST['matricula'];
$email = $_POST['email'];
$username = $_POST['username'];
$turma = $_POST['turma'];
$ano = $_POST['ano'];
$senha = $_POST['senha'];
$repetaSenha = $_POST['repeta-senha'];
$semestre = $_POST['semestre'];

if (!is_null($nome) && !is_null($matricula) && !is_null($email) && !is_null($username) && !is_null($turma) &&
        !is_null($ano) && !is_null($senha) && !is_null($repetaSenha) && !is_null($semestre)) {
    $dados = [
        'nome' => $nome,
        'matricula' => $matricula,
        'email' => $email,
        'username' => $username,
        'turma' => $turma,
        'ano' => $ano,
        'senha' => md5($senha),
        'semestre' => $semestre
    ];

    if ($senha === $repetaSenha) {
        $con = $conexao->BDAbreConexao();
        $sql = $conexao->DBGravar('usuario', $dados);
        $conexao->BDFecharConexao($con);

        session_start();
        $_SESSION['matricula'] = $_POST['matricula'];
        header("Location: /inicio");
    } else {
        die("As senhas nao se coencidem");
    }
} else {
    die("Todos os campos sao obrigatorios!");
}
