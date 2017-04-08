<?php

require_once './conexao.class.php';

$nome = $_POST['nome'];
$matricula = $_POST['matricula'];
$email = $_POST['email'];
$username = $_POST['username'];
$turma = $_POST['turma'];
$ano = $_POST['semestre'];
$senha = md5($_POST['senha']);
$repetaSenha = $_POST['repeta-senha'];
$semestre = $_POST['semestre'];

#matricula 	nome 	username 	email 	turma 	ano 	semestre 

$sql = "INSERT INTO usuario(nome,matricula,username,email,turma,ano,senha,semestre) VALUES('$nome','$matricula','$username','$email','$turma','$ano','$senha', '$semestre')";
$mysqli->query($sql) or die (mysqli_errno($mysqli));
