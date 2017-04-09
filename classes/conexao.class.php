<?php

class Conexao {

    private $localhost = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $bd = 'seal';

    public function conectar() {

        $mysqli = new mysqli($this->localhost, $this->user, $this->pass, $this->bd);

        if (!$mysqli) {
            die('O siguintes erro foram encontrados: ' . mysqli_connect_errno());
        }
        
        return $mysqli;
    }

}
