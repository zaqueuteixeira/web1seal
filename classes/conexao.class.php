<?php

$localhost = 'localhost';
$user = 'root';
$pass = '';
$bd = 'seal';

$mysqli = new mysqli($localhost, $user, $pass, $bd);

if(!$mysqli){
    die('O siguintes erro foram encontrados: '. mysqli_connect_errno());
}