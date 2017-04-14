<?php

include'./classes/cadastrar.class.php';
include'./classes/login.class.php';
include'./classes/autenticacao.class.php';

define("PASTA", "./paginas/");

$REQUEST_URI = filter_input(INPUT_SERVER, 'REQUEST_URI');
$INITE = strpos($REQUEST_URI, '?');

if ($INITE):
    $REQUEST_URI = substr($REQUEST_URI, 0, $INITE);
endif;

$REQUEST_URI_PASTA = substr($REQUEST_URI, 1);
$URL = explode('/', $REQUEST_URI_PASTA);
$URL[0] = ($URL[0] != '' ? $URL[0] : 'login');

if ((isset($URL[0])) && ($URL[0] == 'sair')):
    $login = new Login();
    $login->sair();
endif;

if ((isset($URL[0])) && ($URL[0] == 'autenticacao')):
    $autenticacao = new Autenticacao();
    $autenticacao->autenticarUsuario($_POST);
endif;

if (file_exists(PASTA . $URL[0] . '.php')):
    require(PASTA . $URL[0] . '.php');

elseif ($URL[0] . '/' . $URL[1] == 'cadastrando/usuario'):
    $cadastrar = new Cadastrar();
    $cadastrar->cadastrarAluno($_POST);
elseif ($URL[0] . '/' . $URL[1] == 'cadastrando/atividade'):
    $cadastrar = new Cadastrar();
    $cadastrar->cadastrarAtividade($_POST);
elseif ($URL[0] . '/' . $URL[1] == 'cadastrando/avaliacao'):
    $cadastrar = new Cadastrar();
    $cadastrar->cadastrarAvaliacao($_POST);
elseif (is_dir(PASTA . $URL[0])):
    if (isset($URL[1]) && file_exists(PASTA . $URL[0] . '/' . $URL[1] . '.php')):
        require(PASTA . $URL[0] . '/' . $URL[1] . '.php');
    else:
        require(PASTA . '404.html');
    endif;
else:
    require(PASTA . '404.html');
endif;