<?php

include_once './classes/conexao.class.php';

class ValidarCampos extends Conexao {

    public function ValidarCadastroUsuario($dados) {

        $objRetorno = new stdClass();
        $objRetorno->erro = [];
        $objRetorno->dados = [];
        $objRetorno->status = TRUE;

        $nome = ($dados['nome']) ? filter_var($dados['nome'], FILTER_SANITIZE_STRING) : null;
        $matricula = ($dados['matricula']) ? filter_var($dados['matricula'], FILTER_SANITIZE_STRING) : NULL;
        $email = ($dados['email']) ? filter_var($dados['email'], FILTER_SANITIZE_EMAIL) : NULL;
        $username = ($dados['username']) ? filter_var($dados['username'], FILTER_SANITIZE_STRING) : NULL;
        $turma = ($dados['turma']) ? filter_var($dados['turma'], FILTER_SANITIZE_STRING) : NULL;
        $ano = ($dados['ano']) ? filter_var($dados['ano'], FILTER_SANITIZE_NUMBER_INT) : NULL;
        $semestre = ($dados['semestre']) ? filter_var($dados['semestre'], FILTER_SANITIZE_NUMBER_INT) : NULL;
        $senha = ($dados['senha']) ? filter_var($dados['senha'], FILTER_SANITIZE_STRING) : NULL;
        $repetaSenha = ($dados['repeta-senha']) ? filter_var($dados['repeta-senha'], FILTER_SANITIZE_STRING) : NULL;

        if (is_null($nome)) {
            $objRetorno->erro[] = 'O campo nome nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
            $objRetorno->dados = ['nome' => $nome];
        }
        if (is_null($matricula)) {
            $objRetorno->erro[] = 'O campo matricula nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
            $objRetorno->dados = ['matricula' => $matricula];
        }
        if (is_null($email)) {
            $objRetorno->erro[] = 'O campo email nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
            $objRetorno->dados = ['email' => $email];
        }
        if (is_null($username)) {
            $objRetorno->erro[] = 'O campo username nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
            $objRetorno->dados = ['username' => $username];
        }
        if (is_null($turma)) {
            $objRetorno->erro[] = 'O campo turma nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
            $objRetorno->dados = ['turma' => $turma];
        }
        if (is_null($ano)) {
            $objRetorno->erro[] = 'O campo ano nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
            $objRetorno->dados = ['ano' => $ano];
        }
        if (is_null($semestre)) {
            $objRetorno->erro[] = 'O campo semestre nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
            $objRetorno->dados = ['semestre' => $semestre];
        }
        if (is_null($senha)) {
            $objRetorno->erro[] = 'O campo senha nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
            $objRetorno->dados = ['senha' => $senha];
        }
        if (is_null($repetaSenha)) {
            $objRetorno->erro[] = 'O campo senha nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        }
        if ($senha != $repetaSenha) {
            $objRetorno->erro[] = 'As senhas informadas nao coincedem';
            $objRetorno->status = FALSE;
        }
        $bdEmail = $this->BDSeleciona('usuario', 'email', "WHERE(email like '{$email}')");
        if ($bdEmail) {
            $objRetorno->erro[] = 'Ja existe um cadastro feito com esse email, por favor use outro!';
            $objRetorno->status = FALSE;
        }
        $bdMatricula = $this->BDSeleciona('usuario', 'matricula', "WHERE(matricula like '{$matricula}')");
        if ($bdMatricula) {
            $objRetorno->erro[] = 'Ja existe um cadastro feito com essa matricula, por favor use outra!';
            $objRetorno->status = FALSE;
        }

        return $objRetorno;
    }

}
