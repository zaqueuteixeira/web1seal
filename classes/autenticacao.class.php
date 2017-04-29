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
            $consulta = $this->definirUsuario($matricula);

            if ($consulta != FALSE) {

                $bdMatricula = $consulta[0]['matricula'];
                $bdSenha = $consulta[0]['senha'];
                $bdTabela = $consulta['tabela'];
                $ativo = (int) $consulta[0]['ativo'];

                if (is_null($bdMatricula)) {
                    $erro = array_merge($erro, ["Dados invalidos"]);
                } else {
                    if ($ativo == 0) {
                        if ($login->checarTentativasLogin($matricula, $bdTabela)) {

                            if ($senha == $bdSenha) {
                                session_start();
                                $_SESSION['matricula'] = $_POST['matricula'];

                                $login->BDAtualiza("$bdTabela", "WHERE(matricula = {$matricula})", 'ativo', 1);
                                $login->excluirTentativasLogin($matricula);

                                header("Location: /inicio");
                            } else {
                                $login->registrarTentativaLogin($matricula);
                                $erro = array_merge($erro, ["Dados incorretos, por favor confira seus dados e tente novamente!"]);
                            }
                        } else {
                            var_dump($login->checarTentativasLogin($matricula, $bdTabela));
                            exit();
                            $erro = array_merge($erro, ["Usuario bloqueado"]);
                        }
                    } else {
                        $erro = array_merge($erro, ["Está usuario já encontra-se logado no sistema"]);
                    }
                }
            } else {
                $erro = array_merge($erro, ["Dados incorretos, por favor confira seus dados e tente novamente!"]);
            }
            if (count($erro) > 0) {
                print_r(($erro));
            }
        }
    }

    private function definirUsuario($matricula) {
        $login = new Login();
        $conexao = $login->BDAbreConexao();

        $aluno = $login->BDSeleciona('alunos', 'id,matricula, senha, ativo', "WHERE(matricula = '{$matricula}')");
        $professor = $login->BDSeleciona('professores', 'id,matricula, senha, ativo', "WHERE(matricula = '{$matricula}')");
        $monitor = $login->BDSeleciona('monitores', 'id,matricula, senha, ativo', "WHERE(matricula = '{$matricula}')");

        $login->BDFecharConexao($conexao);


        if (isset($aluno) && !empty($aluno) && !is_null($aluno)) {
            $aluno = array_merge($aluno, [
                'tabela' => 'alunos'
            ]);
            return $aluno;
        } elseif (isset($professor) && !empty($professor) && !is_null($professor)) {
            $professor = array_merge($professor, [
                'tabela' => 'professores'
            ]);
            return $professor;
        } elseif (isset($monitor) && !empty($monitor) && !is_null($monitor)) {
            $monitor = array_merge($monitor, [
                'tabela' => 'monitores'
            ]);
            return $monitor;
        } else {
            return FALSE;
        }
    }

    public function definirNiveisAcesso() {
        session_start();
        $login = new Login();
        $conexao = $login->BDAbreConexao();

        $consulta = $login->BDRetornarPapelID($_SESSION['matricula']);
        $login->BDFecharConexao($conexao);

        switch ($consulta) {
            case 1:
                return './headerProfessor.php';
                break;
            case 2:
                return './headerAluno.php';
                break;
            case 3:
                return './headerMonitor.php';
                break;
        }
    }

}
