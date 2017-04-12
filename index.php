<?php

include'./classes/cadastrar.class.php';

define("PASTA", "./paginas/");

$REQUEST_URI = filter_input(INPUT_SERVER, 'REQUEST_URI');
$INITE = strpos($REQUEST_URI, '?');

if ($INITE):
    $REQUEST_URI = substr($REQUEST_URI, 0, $INITE);
endif;

$REQUEST_URI_PASTA = substr($REQUEST_URI, 1);
$URL = explode('/', $REQUEST_URI_PASTA);
$URL[0] = ($URL[0] != '' ? $URL[0] : 'login');

if (file_exists(PASTA . $URL[0] . '.php')):
    require(PASTA . $URL[0] . '.php');

    elseif($URL[0].'/'.$URL[1] == 'cadastrando/usuario'):
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