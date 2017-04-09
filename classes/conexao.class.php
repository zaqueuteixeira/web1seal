<?php

class Conexao {

    private $localhost = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $bd = 'seal';

    public function BDConectar() {

        $conexao = mysqli_connect($this->localhost, $this->user, $this->pass, $this->bd) or die(mysqli_connect_error());
        mysqli_set_charset($mysqli, 'utf8') or die(mysqli_error($mysqli));
        
        return $conexao;
    }
    
    public function BDFechar($conexao) {
        @mysqli_close($conexao) or die(mysqli_error($conexao));
    }

}
