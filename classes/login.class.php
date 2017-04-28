<?php

include_once 'conexao.class.php';


/*
 * CLasse responsavel por tudo sobre o login
 */

class Login extends Conexao {

    /**
     * @author Deigon Prates <deigonprates@gmail.com>
     * @return boolean true caso consiga cadastrar e false em caso de eventuais erros.
     * @param string $data data da tentativa de login ex: 05/09/2017  
     * @param string $user_id id do usuario a qual tentou logar  
     */
    public function registrarTentativaLogin($matricula) {

        $conexao = $this->BDAbreConexao();

        $id = $this->BDRetornaID($matricula);

        if (!is_null($id)) {

            $dados = [
                'usuario_id' => $id,
                'data' => date('Y-m-d')
            ];

            $this->DBGravar('tentativas_login', $dados);
        }
        if (mysqli_affected_rows($conexao) > 0) {
            $this->BDFecharConexao($conexao);
            return true;
        } else {
            $this->BDFecharConexao($conexao);
            return FALSE;
        }
    }

    public function excluirTentativasLogin($matricula) {
        $conexao = $this->BDAbreConexao();

        $id = $this->BDRetornaID($matricula);

        if (!is_null($id)) {

            $this->BDExclui('tentativas_login', "WHERE(usuario_id = '{$id}')");

            if (mysqli_affected_rows($conexao) > 0) {
                $this->BDFecharConexao($conexao);
                return true;
            } else {
                $this->BDFecharConexao($conexao);
                return FALSE;
            }
        } else {
            $this->BDFecharConexao($conexao);
            return FALSE;
        }
    }
    
    public function checarTentativasLogin($matricula, $tabela) {
        $conexao = $this->BDAbreConexao();
        
        $id = $this->BDRetornaID($matricula);
        
        if(!is_null($id)){
            
           $count= $this->BDSeleciona('tentativas_login', 'count(id) as total', "WHERE(usuario_id = '{$id}')");
           
           if($count[0]['total'] == 10){
               $this->BDAtualiza('alunos', "WHERE(status = '{$id}')", 'status', 0);
           }
           if($count[0]['total'] < 10){
               return TRUE;
           }else{
               return FALSE;
           }
        }
        
    }

    public function sair() {
        
        session_start();
        $consulta = $this->BDRetornarPapelID($_SESSION['matricula']);
        
        switch ($consulta){
        case 1:
            $table = 'professores';
            break;
        case 2:
            $table = 'alunos';
            break;
        case 3:
            $table = 'monitores';
            break;
        }
        $this->BDAtualiza("$table", "WHERE(matricula = '{$_SESSION['matricula']}')", 'ativo', 0);
        session_destroy();
        header("Location: /login");
    }

}
