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

    public function cadastrarQuestoesAtividade($dados) {
        $validar = new ValidarCampos();
        $objValidar = $validar->validarCadastroQuestao($dados);
        $conn = $this->BDAbreConexao();
 
        if ($objValidar->status) {
            $dados = $objValidar->dados;
            unset($dados['alternativa']);
            unset($dados['solucao']);
            unset($dados['perguntaSubjetiva']);
            
            $this->DBGravar('questoes', $dados);
            
            $this->cadastrarSolucao($objValidar->dados);
            header("Location: /inicio");
        } else {
            print_r($objValidar->erro);
        }
        $this->BDFecharConexao($conn);
    }
    
    private function cadastrarSolucao($dados) {
        
        $lastID = $this->BDSeleciona('questoes', 'id', "order by id desc LIMIT 1");
        $solucao = $dados['solucao'];
        $alternativa = $dados['alternativa'];
        $id= $lastID[0]['id'];
        
        $grava = [
                    'questoes_id' => $id,
                    'solucao' => $solucao,
                    'alternativa' =>$alternativa
                 ];
        
         $this->DBGravar('solucoes', $grava);
           
    }

}
