<?php

require_once './classes/validarCampos.php';
require_once './classes/conexao.class.php';

class Cadastrar extends Conexao {

    public function cadastrarAluno($dados) {

        $validar = new ValidarCampos();
        $objValidar = $validar->ValidarCadastroUsuario($dados);
        
        if ($objValidar->status === TRUE) {
            $this->DBGravar('alunos', $objValidar->dados);

            session_start();
            $_SESSION['matricula'] = $_POST['matricula'];

            header("Location: /inicio");
        } else {
            print_r($objValidar->erro);
        }
    }

    public function cadastrarAtividade($dados) {

        $validar = new ValidarCampos();
        $objValidar = $validar->validarCadastroAtividade($dados);

        if ($objValidar->status) {

            $this->DBGravar('atividades', $objValidar->dados);

            header("Location: /inicio");
        } else {
            print_r($objValidar->erro);
        }
    }

    public function cadastrarAvaliacao($dados) {

        $validar = new ValidarCampos();
        $objValidar = $validar->validarCadastroAvaliacao($dados);

        if ($objValidar->status) {
            $this->DBGravar('atividades', $objValidar->dados);

            header("Location: /inicio");
        } else {
            print_r($objValidar->erro);
        }
    }

    public function cadastrarTurma($dados) {
        $validar = new ValidarCampos();
        $objValidar = $validar->validarCadastroTurma($dados);

        if ($objValidar->status) {
            $this->DBGravar('turmas', $objValidar->dados);

            header("Location: /inicio");
        } else {
            print_r($objValidar->erro);
        }
    }

}
