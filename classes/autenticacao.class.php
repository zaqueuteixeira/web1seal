<?php

require_once 'login.class.php';
require_once 'validarCampos.php';

class Autenticacao {

    public function autenticarUsuario($dados) {

        $login = new Login();
        $validar = new ValidarCampos();

        $matricula = $_POST['matricula'];
        $senha = $_POST['senha'];
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
            $consulta = $login->BDSeleciona('usuario', 'matricula, senha', "WHERE(matricula = '{$matricula}')");
            $login->BDFecharConexao($conexao);

            $bdMatricula = $consulta[0]['matricula'];
            $bdSenha = $consulta[0]['senha'];

            if (is_null($bdMatricula)) {
                $erro = array_merge($erro, ["Dados invalidos"]);
            } else {
                if ($login->checarTentativasLogin($matricula)) {

                    if ($senha == $bdSenha) {
                        session_start();
                        $_SESSION['matricula'] = $_POST['matricula'];

                        $login->excluirTentativasLogin($matricula);

                        header("Location: /inicio");
                    } else {
                        $login->registrarTentativaLogin($matricula);
                        $erro = array_merge($erro, ["Dados incorretos, por favor confira seus dados e tente novamente!"]);
                    }
                }
            }
            if (count($erro) > 0) {
                print_r(($erro));

                exit();
            }
        }
    }

}
