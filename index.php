<?php

include_once'./classes/login.class.php';
include_once'./classes/autenticacao.class.php';
include_once'./classes/cadastrar.class.php';

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
if ((isset($URL[0])) && (isset($URL[1])) && ($URL[0] . '/' . $URL[1] == 'atualizando/perfil')):
    include_once'./classes/atualizar.class.php';
    $atualizar = new Atualizar();
    $atualizar->atualizarPerfil($_POST);
endif;
if ((isset($URL[0])) && (isset($URL[1])) && ($URL[0] . '/' . $URL[1] == 'atualizando/senha')):
    include_once'./classes/atualizar.class.php';
    $atualizar = new Atualizar();
    $atualizar->atualizarSenha($_POST);
endif;
if ((isset($URL[0])) && (isset($URL[1])) && ($URL[0] . '/' . $URL[1] == 'atualizar/status')):
    include_once'./classes/atualizar.class.php';
    $atualizar = new Atualizar();
    $atualizar->atualizaStatus($_POST);
endif;
if ((isset($URL[0])) && (isset($URL[1])) && ($URL[0] . '/' . $URL[1] == 'cadastrando/atividade')):
    include_once'./classes/cadastrar.class.php';
    $cadastrar = new Cadastrar();
    $cadastrar->cadastrarAtividade($_POST);
endif;
if ((isset($URL[0])) && (isset($URL[1])) && ($URL[0] . '/' . $URL[1] == 'cadastrando/avaliacao')):
    include_once'./classes/cadastrar.class.php';
    $cadastrar = new Cadastrar();
    $cadastrar->cadastrarAvaliacao($_POST);
endif;
if ((isset($URL[0])) && (isset($URL[1])) && ($URL[0] . '/' . $URL[1] == 'cadastrando/turma')):
    include_once'./classes/cadastrar.class.php';
    $cadastrar = new Cadastrar();
    $cadastrar->cadastrarTurma($_POST);
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
elseif (is_dir(PASTA . $URL[0])):
    if (isset($URL[1]) && file_exists(PASTA . $URL[0] . '/' . $URL[1] . '.php')):
        require(PASTA . $URL[0] . '/' . $URL[1] . '.php');
    else:
        require(PASTA . '404.html');
    endif;
else:
    require(PASTA . '404.html');
endif;