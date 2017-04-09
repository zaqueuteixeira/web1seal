<?php

class Conexao {

    private $localhost = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $bd = 'seal';

    public function BDConectar() {
        $conexao = mysqli_connect($this->localhost, $this->user, $this->pass, $this->bd) or die(mysqli_connect_error());
        mysqli_set_charset($conexao, 'utf8') or die(mysqli_error($conexao));
        
        return $conexao;
    }
    
    public function BDFechar($conexao) {
        @mysqli_close($conexao) or die(mysqli_error($conexao));
    }
    
    public function DBGravar($tabela, array $dados){
        $indices = implode(", ", $dados);
        $valores = "'".implode("', '", $dados)."'";
        
        $sql = "INSERT INTO {$tabela}({$indices}) VALUES ({$valores})";
        
        return $this->BDExecutaQuery($sql);
    }
    
    public function BDExecutaQuery($query){
        $conexao = $this->BDConectar();
        
        $resultado = mysqli_query($conexao, $query) or die(mysqli_error($conexao));
        
        $this->BDFechar($conexao);
        
        return $resultado;
    }

}
