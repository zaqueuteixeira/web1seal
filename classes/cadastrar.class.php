<?php

require_once './classes/validarCampos.php';
require_once './classes/conexao.class.php';

class Cadastrar extends Conexao {

    public function cadastrarAluno($dados) {
        
        $validar = new ValidarCampos();
        $objValidar = $validar->ValidarCadastroUsuario($dados);

        if ($objValidar->status === TRUE) {
            $this->DBGravar('usuario', $objValidar->dados);
            
            session_start();
            $_SESSION['matricula'] = $_POST['matricula'];

            header("Location: /inicio");
        } else {
            print_r($objValidar->erro);
        }
    }

    public function cadastrarAtividade(array $dados) {
        
    }

    public function cadastrarAvaliacao(array $dados) {
        
    }

}
