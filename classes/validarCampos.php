<?php

include_once './classes/conexao.class.php';

date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');

class ValidarCampos {

    public function validarLogin($dados) {

        $objRetorno = new stdClass();
        $objRetorno->erro = [];
        $objRetorno->dados = [];
        $objRetorno->status = TRUE;

        $matricula = ($dados['matricula']) ? filter_var($dados['matricula'], FILTER_SANITIZE_STRING) : NULL;
        $senha = ($dados['senha']) ? filter_var($dados['senha'], FILTER_SANITIZE_STRING) : NULL;

        if (is_null($matricula)) {
            $objRetorno->erro[] = 'O campo matricula nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        } else {
            $objRetorno->dados[] = ['matricula' => $matricula];
        }
        if (is_null($senha)) {
            $objRetorno->erro[] = 'O campo senha nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        } else {
            $senha = md5($senha);
            $objRetorno->dados[] = ['senha' => $senha];
        }

        return $objRetorno;
    }

    public function ValidarCadastroUsuario($dados) {

        $conexao = new Conexao();
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
        } else {
            $objRetorno->dados = array_merge($objRetorno->dados, ['nome' => $nome]);
        }
        if (is_null($matricula)) {
            $objRetorno->erro[] = 'O campo matricula nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        } else {
            $objRetorno->dados = array_merge($objRetorno->dados, ['matricula' => $matricula]);
        }
        if (is_null($email)) {
            $objRetorno->erro[] = 'O campo email nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        } else {
            $objRetorno->dados = array_merge($objRetorno->dados, ['email' => $email]);
        }
        if (is_null($username)) {
            $objRetorno->erro[] = 'O campo username nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        } else {
            $objRetorno->dados = array_merge($objRetorno->dados, ['username' => $username]);
        }
        if (is_null($turma)) {
            $objRetorno->erro[] = 'O campo turma nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        } else {
            $objRetorno->dados = array_merge($objRetorno->dados, ['turma' => $turma]);
        }
        if (is_null($ano)) {
            $objRetorno->erro[] = 'O campo ano nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        } else {
            $objRetorno->dados = array_merge($objRetorno->dados, ['ano' => $ano]);
        }
        if (is_null($semestre)) {
            $objRetorno->erro[] = 'O campo semestre nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        } else {
            $objRetorno->dados = array_merge($objRetorno->dados, ['semestre' => $semestre]);
        }
        if (is_null($senha)) {
            $objRetorno->erro[] = 'O campo senha nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        } else {
            $senha = md5($senha);
            $objRetorno->dados = array_merge($objRetorno->dados, ['senha' => $senha]);
        }
        if (is_null($repetaSenha)) {
            $objRetorno->erro[] = 'O campo senha nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        }
        if ($senha != md5($repetaSenha)) {
            $objRetorno->erro[] = 'As senhas informadas nao coincedem';
            $objRetorno->status = FALSE;
        }
        $bdEmail = $conexao->BDSeleciona('usuario', 'email', "WHERE(email like '{$email}')");
        if ($bdEmail) {
            $objRetorno->erro[] = 'Ja existe um cadastro feito com esse email, por favor use outro!';
            $objRetorno->status = FALSE;
        }
        $bdMatricula = $conexao->BDSeleciona('usuario', 'matricula', "WHERE(matricula like '{$matricula}')");
        if ($bdMatricula) {
            $objRetorno->erro[] = 'Ja existe um cadastro feito com essa matricula, por favor use outra!';
            $objRetorno->status = FALSE;
        }

        return $objRetorno;
    }

    public function validarCadastroAvaliacao($dados) {

        $objRetorno = new stdClass();
        $objRetorno->erro = [];
        $objRetorno->dados = [];
        $objRetorno->status = TRUE;

        $assunto = ($dados['assunto']) ? filter_var($dados['assunto'], FILTER_SANITIZE_STRING) : null;
        $turma = ($dados['turma']) ? filter_var($dados['turma'], FILTER_SANITIZE_STRING) : null;
        $data = $dados['data'];
        $valor = $dados['valor'];
        $dataAtual = date('Y-m-d');
        $dataTermino = $data;

        if (is_null($assunto)) {
            $objRetorno->erro[] = 'O campo assunto nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        } else {
            $objRetorno->dados = array_merge($objRetorno->dados, ['conteudo' => $assunto]);
        }
        if (is_null($turma)) {
            $objRetorno->erro[] = 'O campo turma nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        } else {
            $objRetorno->dados = array_merge($objRetorno->dados, ['turma_id' => $turma]);
        }
        if (strtotime($data) < strtotime($dataAtual)) {
            $objRetorno->erro[] = 'A data informada e menor que a data atual. Por favor corrija';
            $objRetorno->status = FALSE;
        } else {
            $objRetorno->dados = array_merge($objRetorno->dados, [
                'dataInicio' => $data,
                'dataTermino' => $data
            ]);
        }
        if (is_null($valor)) {
            $objRetorno->erro[] = 'O campo valor nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        } else {
            $objRetorno->dados = array_merge($objRetorno->dados, ['nota' => $valor]);
        }

        if ($objRetorno->status) {
            $objRetorno->dados = array_merge($objRetorno->dados, ['tipo_id' => 1]);
        }
        return $objRetorno;
    }

    public function validarCadastroAtividade($dados) {
        $objRetorno = new stdClass();
        $objRetorno->erro = [];
        $objRetorno->dados = [];
        $objRetorno->status = TRUE;
        $dataAtual = date('Y-m-d');

        $assunto = $dados['assunto'];
        $turma = $dados['turma'];
        $dataInicio = $dados['dataInicio'];
        $dataTermino = $dados['dataTermino'];

        if (is_null($assunto)) {
            $objRetorno->erro[] = 'O campo assunto nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        } else {
            $objRetorno->dados = array_merge($objRetorno->dados, ['conteudo' => $assunto]);
        }
        if (is_null($turma)) {
            $objRetorno->erro[] = 'O campo turma nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        } else {
            $objRetorno->dados = array_merge($objRetorno->dados, ['turma_id' => $turma]);
        }
        if (is_null($dataInicio)) {
            $objRetorno->erro[] = 'O campo data de inicio nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        } else {
            $objRetorno->dados = array_merge($objRetorno->dados, ['dataInicio' => $dataInicio]);
        }
        if (is_null($dataTermino)) {
            $objRetorno->erro[] = 'O campo data de termino nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        } else {
            $objRetorno->dados = array_merge($objRetorno->dados, ['dataTermino' => $dataTermino]);
        }
        if (strtotime($dataInicio) > strtotime($dataTermino)) {
            $objRetorno->erro[] = 'A data de inicio tem que ser menor que a data de termino';
            $objRetorno->status = FALSE;
        }
        if (strtotime($dataInicio) < strtotime($dataAtual)) {
            $objRetorno->erro[] = 'A data de inicio esta menor que a data atual por favor corrija';
            $objRetorno->status = FALSE;
        }
        if (strtotime($dataTermino) < strtotime($dataAtual)) {
            $objRetorno->erro[] = 'A data de termino esta menor que a data atual por favor corrija';
            $objRetorno->status = FALSE;
        }
        return $objRetorno;
    }

    public function validarCadastroQuestaoAvaliacao($dados) {
        
    }

    public function validarCadastroQuestaoAtividade($dados) {
        
    }

    public function validarCadastroTurma($dados) {
        $objRetorno = new stdClass();
        $objRetorno->erro = [];
        $objRetorno->dados = [];
        $objRetorno->status = TRUE;

        $nome = ($dados['nome']) ? filter_var($dados['nome'], FILTER_SANITIZE_STRING) : null;
        $professor = ($dados['professor']) ? filter_var($dados['professor'], FILTER_SANITIZE_STRING) : null;
        $codigo = ($dados['codigo']) ? filter_var($dados['codigo'], FILTER_SANITIZE_STRING) : null;
        $ano = ($dados['ano']) ? filter_var($dados['ano'], FILTER_SANITIZE_STRING) : NULL;
        $semestre = ($dados['semestre']) ? filter_var($dados['semestre'], FILTER_SANITIZE_STRING) : NULL;

        if (is_null($nome)) {
            $objRetorno->erro[] = 'O campo nome nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        } else {
            $objRetorno->dados = array_merge($objRetorno->dados, ['nome' => $nome]);
        }
        if (is_null($professor)) {
            $objRetorno->erro[] = 'O campo professor nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        } else {
            $objRetorno->dados = array_merge($objRetorno->dados, ['professor' => $professor]);
        }
        if (is_null($codigo)) {
            $objRetorno->erro[] = 'O campo codigo nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        } else {
            $objRetorno->dados = array_merge($objRetorno->dados, ['codigo' => $codigo]);
        }
        if (is_null($ano)) {
            $objRetorno->erro[] = 'O campo nome ano foi preenchido corretamente';
            $objRetorno->status = FALSE;
        } else {
            $objRetorno->dados = array_merge($objRetorno->dados, ['ano' => $ano]);
        }
        if (is_null($semestre)) {
            $objRetorno->erro[] = 'O campo semestre nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        } else {
            $objRetorno->dados = array_merge($objRetorno->dados, ['semestre' => $semestre]);
        }

        return $objRetorno;
    }

    public function validarEdicaoPerfil($dados, $matricula) {

        $objRetorno = new stdClass();
        $objRetorno->erro = [];
        $objRetorno->dados = [];
        $objRetorno->status = TRUE;

        $nome = ($dados['nome']) ? filter_var($dados['nome'], FILTER_SANITIZE_STRING) : null;
        $email = ($dados['email']) ? filter_var($dados['email'], FILTER_SANITIZE_EMAIL) : NULL;
        $username = ($dados['username']) ? filter_var($dados['username'], FILTER_SANITIZE_STRING) : NULL;
        $ano = ($dados['ano']) ? filter_var($dados['ano'], FILTER_SANITIZE_NUMBER_INT) : NULL;
        $semestre = ($dados['semestre']) ? filter_var($dados['semestre'], FILTER_SANITIZE_NUMBER_INT) : NULL;
        $senhaAntiga = ($dados['senha-antiga']) ? filter_var($dados['senha-antiga'], FILTER_SANITIZE_STRING) : false;
        $senha = ($dados['senha-nova']) ? filter_var($dados['senha-nova'], FILTER_SANITIZE_STRING) : false;
        $repetaSenha = ($dados['repeta-senha']) ? filter_var($dados['repeta-senha'], FILTER_SANITIZE_STRING) : false;

        if (is_null($nome)) {
            $objRetorno->erro[] = 'O campo nome nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        } else {
            $objRetorno->dados = ['nome' => $nome];
        }
        if (is_null($email)) {
            $objRetorno->erro[] = 'O campo email nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        } else {
            $objRetorno->dados = array_merge($dados, ['email' => $email]);
        }
        if (is_null($username)) {
            $objRetorno->erro[] = 'O campo username nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        } else {
            $objRetorno->dadosdados = array_merge($dados, ['username' => $username]);
        }
        if (is_null($ano)) {
            $objRetorno->erro[] = 'O campo ano nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        } else {
            $objRetorno->dadosdados = array_merge($dados, ['ano' => $ano]);
        }
        if (is_null($semestre)) {
            $objRetorno->erro[] = 'O campo semestre nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        } else {
            $objRetorno->dadosdados = array_merge($dados, ['semestre' => $semestre]);
        }
        if ($senhaAntiga) {
            $senha = md5($senha);
            $repetaSenha = md5($repetaSenha);

            if ($senha != $repetaSenha) {
                $objRetorno->erro[] = 'As senhas informadas nao coincedem';
                $objRetorno->status = FALSE;
            } else {
                $objRetorno->dados = array_merge($dados, ['senha' => $senha]);
            }
        }

        $conexao = new Conexao;
        $tabela = $conexao->BDRetornarTabela($matricula);
        $bdEmail = $conexao->BDSeleciona("$tabela", 'email', "WHERE(email like '{$email}')");

        if ($bdEmail) {
            $objRetorno->erro[] = 'Ja existe um cadastro feito com esse email, por favor use outro!';
            $objRetorno->status = FALSE;
        }


        return $objRetorno;
    }

    public function validarEdicaoSenha($dados) {

        $objRetorno = new stdClass();
        $objRetorno->erro = [];
        $objRetorno->dados = [];
        $objRetorno->status = TRUE;

        $matricula = ($dados['matricula']) ? filter_var($dados['matricula'], FILTER_SANITIZE_STRING) : NULL;
        $senha = ($dados['senha']) ? filter_var($dados['senha'], FILTER_SANITIZE_STRING) : false;
        $repetaSenha = ($dados['repeta-senha']) ? filter_var($dados['repeta-senha'], FILTER_SANITIZE_STRING) : false;

        if (is_null($senha)) {
            $objRetorno->erro[] = 'O campo senha nao foi preenchido corretamente';
            $objRetorno->status = FALSE;
        }
        if ($senha != $repetaSenha) {
            $objRetorno->erro[] = 'As senhas informadas nao coincedem';
            $objRetorno->status = FALSE;
        } else {
            $objRetorno->dados = array_merge($objRetorno->dados, ['senha' => md5($senha)]);
            $objRetorno->dados = array_merge($objRetorno->dados, ['matricula' => $matricula]);
        }
        if ((!$senha) && (!$repetaSenha)) {
            $objRetorno->dados = array_merge($objRetorno->dados, ['senha' => md5($matricula)]);
            $objRetorno->dados = array_merge($objRetorno->dados, ['matricula' => $matricula]);
        }


        return $objRetorno;
    }

}
