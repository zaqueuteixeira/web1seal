<?php

class Conexao {

    private $localhost = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $bd = 'seal2';

    /**
     * @author Deigon Prates <deigonprates@gmail.com>
     * @return obj Retorna um objeto contendo a conexao;
     */
    public function BDAbreConexao() {
        $conexao = mysqli_connect($this->localhost, $this->user, $this->pass, $this->bd) or die(mysqli_connect_error());
        mysqli_set_charset($conexao, 'utf8') or die(mysqli_error($conexao));

        return $conexao;
    }

    /**
     * @author Deigon Prates <deigonprates@gmail.com>
     * @param obj $$conexao precisa do objeto da conexao para poder fecha-la. 
     * @param obj $conexao
     */
    public function BDFecharConexao($conexao) {
        mysqli_close($conexao) or die(mysqli_error($conexao));
    }

    /**
     * @author Deigon Prates <deigonprates@gmail.com>
     * 
     * @param string $tabela nome da tabela 
     * @param array $dados array associativo onde os indices sao os campos na tabela e os valores sao os valores que seram inseridos na tabela
     * @return resultado da conexao 
     * 
     */
    public function DBGravar($tabela, array $dados) {

        $indices = implode(", ", array_keys($dados));
        $valores = "'" . implode("', '", $dados) . "'";

        $sql = "INSERT INTO {$tabela}({$indices}) VALUES ({$valores});";
        var_dump($sql);
        return $this->BDExecutaQuery($sql);
    }

    /**
     * @author Deigon Prates <deigonprates@gmail.com>
     * 
     * @param string $query contendo a query do bd
     * @return boolean 
     */
    public function BDExecutaQuery($query) {
        $conexao = $this->BDAbreConexao();

        $resultado = mysqli_query($conexao, $query) or die(mysqli_error($conexao));

        $this->BDFecharConexao($conexao);

        return $resultado;
    }

    /**
     * @author Deigon Prates <deigonprates@gmail.com>
     * 
     * @param string $tabela
     * @param string $opcoes
     * @param string $filtros
     * @return array $dados com o resultado do select
     */
    public function BDSeleciona($tabela, $opcoes = '*', $filtros = null) {
        $filtros = ($filtros) ? " {$filtros}" : null;

        $sql = "SELECT {$opcoes} FROM {$tabela}{$filtros}";
        $resultado = $this->BDExecutaQuery($sql);

        if (!mysqli_num_rows($resultado)) {
            return false;
        } else {
            while ($aux = mysqli_fetch_assoc($resultado)) {
                $dados[] = $aux;
            }

            return $dados;
        }
    }

    public function BDExclui($tabela, $opcoes = '*', $filtros = null) {

        $filtros = ($filtros) ? " {$filtros}" : null;

        $sql = "DELETE FROM {$tabela}{$filtros}";
        $resultado = $this->BDExecutaQuery($sql);

        if (!mysqli_num_rows($resultado)) {
            return false;
        } else {
            return TRUE;
        }
    }

    public function BDAtualiza($tabela, $filtros = null, $campo = 'status', $valor = '0') {

        $sql = "UPDATE {$tabela} SET {$campo} = {$valor} {$filtros}";
        var_dump($sql);
        return $this->BDExecutaQuery($sql);
    }

    /*
     * @author Deigon Prates <deigonprates@gmail.com>
     *
     * @param string $matricula do usuario a retornar a o id do aluno
     * @return int $id    do usuario 
     */

    public function BDRetornaID($matricula) {
        $matricula = (int) $matricula;
        $aluno = "SELECT id FROM alunos where(matricula = {$matricula})";
        $professor = "SELECT id FROM professores where(matricula = {$matricula})";
        $monitores = "SELECT id FROM monitores where(matricula = {$matricula})";
        $resultado1 = $this->BDExecutaQuery($aluno);
        $resultado2 = $this->BDExecutaQuery($professor);
        $resultado3 = $this->BDExecutaQuery($monitores);

        $aluno = mysqli_fetch_array($resultado1);
        $professor = mysqli_fetch_array($resultado2);
        $monitor = mysqli_fetch_array($resultado3);

        if (isset($aluno[0]) && !empty($aluno[0]) && !is_null($aluno[0])) {
            return $aluno[0];
        } elseif (isset($monitor[0]) && !empty($monitor[0]) && !is_null($monitor[0])) {
            return $monitor[0];
        } elseif (isset($professor[0]) && !empty($professor[0]) && !is_null($professor[0])) {
            return $professor[0];
        } else {
            return FALSE;
        }

    }

    public function BDRetornarPapelID($matricula) {
        $matricula = (int) $matricula;
        $aluno = "SELECT papel_id FROM alunos where(matricula = {$matricula})";
        $professor = "SELECT papel_id FROM professores where(matricula = {$matricula})";
        $monitores = "SELECT papel_id FROM monitores where(matricula = {$matricula})";
        $resultado1 = $this->BDExecutaQuery($aluno);
        $resultado2 = $this->BDExecutaQuery($professor);
        $resultado3 = $this->BDExecutaQuery($monitores);

        $aluno = mysqli_fetch_array($resultado1);
        $professor = mysqli_fetch_array($resultado2);
        $monitor = mysqli_fetch_array($resultado3);

        if (isset($aluno[0]) && !empty($aluno[0]) && !is_null($aluno[0])) {
            return $aluno[0];
        } elseif (isset($monitor[0]) && !empty($monitor[0]) && !is_null($monitor[0])) {
            return $monitor[0];
        } elseif (isset($professor[0]) && !empty($professor[0]) && !is_null($professor[0])) {
            return $professor[0];
        } else {
            return FALSE;
        }
    }
    
    public function BDRetornarTabela($matricula) {
        $matricula = (int) $matricula;
        $aluno = "SELECT papel_id FROM alunos where(matricula = {$matricula})";
        $professor = "SELECT papel_id FROM professores where(matricula = {$matricula})";
        $monitores = "SELECT papel_id FROM monitores where(matricula = {$matricula})";
        $resultado1 = $this->BDExecutaQuery($aluno);
        $resultado2 = $this->BDExecutaQuery($professor);
        $resultado3 = $this->BDExecutaQuery($monitores);

        $aluno = mysqli_fetch_array($resultado1);
        $professor = mysqli_fetch_array($resultado2);
        $monitor = mysqli_fetch_array($resultado3);

        if (isset($aluno[0]) && !empty($aluno[0]) && !is_null($aluno[0])) {
            return 'alunos';
        } elseif (isset($monitor[0]) && !empty($monitor[0]) && !is_null($monitor[0])) {
            return 'monitores';
        } elseif (isset($professor[0]) && !empty($professor[0]) && !is_null($professor[0])) {
            return 'professor';
        } else {
            return FALSE;
        }
    }

}
