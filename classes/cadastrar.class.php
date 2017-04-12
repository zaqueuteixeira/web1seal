<?php

require_once './classes/conexao.class.php';

class Cadastrar extends Conexao {

    public function cadastrarAluno($dados) {
        unset($dados['repeta-senha']);
        
        $this->DBGravar('usuario', $dados);
    }
    
    public function cadastrarAtividade(array $dados) {
        
    }
    
    public function cadastrarAvaliacao(array $dados) {
        
    }

}
