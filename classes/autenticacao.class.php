<?php

require_once 'login.class.php';
require_once 'validarCampos.php';

class Autenticacao {

    public function autenticarUsuario($dados) {

        $login = new Login();
        $validar = new ValidarCampos();

        $matricula = $_POST['matricula'];
        $senha = $_POST['senha'];

        $dados = [
            'matricula' => $matricula,
            'senha' => $senha
        ];

        $validacao = $validar->validarLogin($dados);

        if ($validacao->status) {

            $mysqli = $login->BDAbreConexao();

            $matricula = ($validacao->dados[0]["matricula"]);

            $senha = ($validacao->dados[1]["senha"]);

            $resultado = $login->BDSeleciona('usuario', '*', "WHERE(matricula like '$matricula' and senha = '$senha')");

            if ($login->checarTentativasLogin($matricula)) {

                if (!is_null($resultado[0]['id'])) {
                    session_start();
                    $_SESSION['matricula'] = $_POST['matricula'];

                    $login->excluirTentativasLogin($matricula);

                    header("Location: /inicio");
                } else {
                    $login->registrarTentativaLogin($matricula);
                    $login->BDFecharConexao($mysqli);
                    header("Location: /login");
                }
            } else {
                print_r("usuario bloqueado");
            }

            $login->BDFecharConexao($mysqli);
        } else {
            print_r($validacao->erros);
        }
    }

}
