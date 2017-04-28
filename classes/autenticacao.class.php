<?php

require_once 'login.class.php';
require_once 'validarCampos.php';

class Autenticacao {

    public function autenticarAluno($dados) {

        $login = new Login();
        $validar = new ValidarCampos();

        $matricula = $dados['matricula'];
        $senha = $dados['senha'];
        $erro = [];

        $dados = [
            'matricula' => $matricula,
            'senha' => $senha
        ];

        $validacao = $validar->validarLogin($dados);

        if ($validacao->status) {

            $matricula = ($validacao->dados[0]["matricula"]);
            $senha = ($validacao->dados[1]["senha"]);

            $conexao = $login->BDAbreConexao();
            $consulta = $login->BDSeleciona('alunos', 'matricula, senha, ativo', "WHERE(matricula = '{$matricula}')");
            $login->BDFecharConexao($conexao);

            $bdMatricula = $consulta[0]['matricula'];
            $bdSenha = $consulta[0]['senha'];
            $ativo = $consulta[0]['ativo'];

            if (is_null($bdMatricula)) {
                $erro = array_merge($erro, ["Dados invalidos"]);
            } else {
                if ($ativo == 0) {
                    if ($login->checarTentativasLogin($matricula)) {

                        if ($senha == $bdSenha) {
                            session_start();
                            $_SESSION['matricula'] = $_POST['matricula'];
                            
                            $login->BDAtualiza('alunos', "WHERE(matricula = {$matricula})", 'ativo', 1);
                            $login->excluirTentativasLogin($matricula);

                            header("Location: /inicio");
                        } else {
                            $login->registrarTentativaLogin($matricula);
                            $erro = array_merge($erro, ["Dados incorretos, por favor confira seus dados e tente novamente!"]);
                        }
                    } else {
                        $erro = array_merge($erro, ["Usuario bloqueado"]);
                    }
                } else {
                    $erro = array_merge($erro, ["Está usuario já encontra-se logado no sistema"]);
                }
            }
            if (count($erro) > 0) {
                print_r(($erro));
            }
        }
    }

}
