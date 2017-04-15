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

    public function cadastrarAtividade($dados) {

        $validar = new ValidarCampos();
        $objValidar = $validar->validarCadastroAtividade($dados);

        if ($objValidar->status === TRUE) {
            $this->DBGravar('atividade', $objValidar->dados);

            header("Location: /inicio");
        } else {
            print_r($objValidar->erro);
        }
    }

    public function cadastrarAvaliacao($dados) {

        $validar = new ValidarCampos();
        $objValidar = $validar->validarCadastroAvaliacao($dados);

        if ($objValidar->status === TRUE) {
            $this->DBGravar('avaliacao', $objValidar->dados);

            header("Location: /inicio");
        } else {
            print_r($objValidar->erro);
        }
    }

    public function cadastrarTurma($dados) {
        $validar = new ValidarCampos();
        $objValidar = $validar->validarCadastroTurma($dados);
        
        if ($objValidar->status) {
            $this->DBGravar('turma', $objValidar->dados);

            header("Location: /inicio");
        } else {
            print_r($objValidar->erro);
        }
    }

}
