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
            $indices = implode(", ", array_keys($dados));
            
            //cria uma string so com os valores
            $valores = "'" . implode("', '", $dados) . "'";

            // transforma a string em array.
            $indices = explode(',', $indices);
            $valores = explode(',', $valores);
            
            for($i=0;$i<count($indices); $i++){
                $this->BDAtualiza('usuario', "WHERE(matricula like '{$_SESSION["matricula"]}')", $indices[$i], $valores[$i]);
            }
            header("Location: /inicio");
        } else {
            print_r($teste->erros);
        }
    }

    public function atualizarSenha($dados) {
        print_r($dados);
    }

}
