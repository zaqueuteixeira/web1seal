<?php

class Conexao {

    private $localhost = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $bd = 'seal';

    public function BDAbreConexao() {
        $conexao = mysqli_connect($this->localhost, $this->user, $this->pass, $this->bd) or die(mysqli_connect_error());
        mysqli_set_charset($conexao, 'utf8') or die(mysqli_error($conexao));

        return $conexao;
    }

    public function BDFecharConexao($conexao) {
        mysqli_close($conexao) or die(mysqli_error($conexao));
    }

    public function DBGravar($tabela, array $dados) {
        $indices = implode(", ", array_keys($dados));
        $valores = "'" . implode("', '", $dados) . "'";

        $sql = "INSERT INTO {$tabela}({$indices}) VALUES ({$valores})";

        return $this->BDExecutaQuery($sql);
    }

    public function BDExecutaQuery($query) {
        $conexao = $this->BDAbreConexao();

        $resultado = mysqli_query($conexao, $query) or die(mysqli_error($conexao));

        $this->BDFecharConexao($conexao);

        return $resultado;
    }

    public function BDSeleciona($tabela, $opcoes = '*', $filtros = null) {
        $filtros = ($filtros) ? " {$filtros}" : null;

        $sql = "SELECT {$opcoes} FROM {$tabela}{$filtros}";
        $resultado = $this->BDExecutaQuery($sql);

        if (!mysqli_num_rows($resultado)) {
            return false;
        } else {
            while ($aux = mysqli_affected_rows($resultado)) {
                $dados[] = $aux;
            }

            return $dados;
        }
    }

}
