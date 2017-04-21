<?php

session_start();

if (!isset($_SESSION["matricula"])) {
    header("Location: /login");
    exit();
}

include_once './classes/conexao.class.php';
include_once './classes/validarCampos.php';

class Atualizar extends Conexao {

    public function atualizarPerfil($dados) {

        $validar = new ValidarCampos();
        $teste = $validar->validarEdicaoPerfil($dados);
        $dados = $teste->dados;


        if ($teste) {
            $dados = array_filter($dados); //limpa o array de null e vazios
            //cria uma string so com as keys

            unset($dados['senha-antiga']);
            unset($dados['senha-nova']);
            unset($dados['repeta-senha']);
            unset($dados['matricula']);

            $indices = implode(", ", array_keys($dados));
            //cria uma string so com os valores
            $valores = "'" . implode("', '", $dados) . "'";

            // transforma a string em array.
            $indices = explode(',', $indices);
            $valores = explode(',', $valores);

            for ($i = 0; $i < count($indices); $i++) {
                $this->BDAtualiza('usuario', "WHERE(matricula like '{$_SESSION["matricula"]}')", $indices[$i], $valores[$i]);
            }
            header("Location: /inicio");
        } else {
            print_r($teste->erros);
        }
    }

    public function atualizarSenha($dados) {

        $validar = new ValidarCampos();
        $teste = $validar->validarEdicaoSenha($dados);
        $dados = $teste->dados;

        if (!empty($teste->erro)) {
            print_r($teste->erros);
        } else {
            $conn = $this->BDAbreConexao();
            $this->BDAtualiza('usuario', "WHERE(matricula like '{$dados['matricula']}')", 'senha', "'{$dados['senha']}'");
            $this->BDFecharConexao($conn);


            header("Location: /editar/senha");
        }
    }

    public function atualizaStatus($tabela,$dados) {

        $id = implode(", ", array_keys($dados));
        $status = $this->BDSeleciona("$tabela", 'status', "WHERE(id = '{$id}')");
        
        if ($status[0]['status'] == 1) {
            $this->BDAtualiza("$tabela", "WHERE(id = {$id})", 'status', '0');
        } else {
            $this->BDAtualiza("$tabela", "WHERE(id = {$id})", 'status'," '1'");
        }
        
        header("Location: /listar/".$tabela);
    }

}
