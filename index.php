<?php

$REQUEST_URI = filter_input(INPUT_SERVER, 'REQUEST_URI');
$INITE = strpos($REQUEST_URI, '?');

if ($INITE):
    $REQUEST_URI = substr($REQUEST_URI, 0, $INITE);
endif;

$REQUEST_URI_PASTA = substr($REQUEST_URI, 1);
$URL = explode('/', $REQUEST_URI_PASTA);
$URL[0] = ($URL[0] != '' ? $URL[0] : 'login');

if (file_exists('./paginas/' . $URL[0] . '.php')):
    require('./paginas/' . $URL[0] . '.php');
else:
    require('./paginas/404.html');
endif;