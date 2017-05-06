<?php
$title = "Listar Atividades";
require_once './classes/conexao.class.php';
require_once './classes/autenticacao.class.php';

$autenticacao = new Autenticacao();
$header = $autenticacao->definirNiveisAcesso();
require_once "$header";

$conexao = new Conexao();
$atividade_id = $_SESSION['atividade_id'];

$con = $conexao->BDAbreConexao();
$dados = $conexao->BDSeleciona('questoes', '*', "WHERE(atividade_id = {$atividade_id} and status = 1)");

$conexao->BDFecharConexao($con);
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li>
                            <a href="/inicio">Inicio</a>
                        </li>
                        <li class="active">
                            remover
                        </li>
                        <li>
                            <a href="/editar/removerQuestao">Questões</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <center><h4 class="page-title">Listando Questões</h4></center>
                <br>
                <br>
                <div class="card-box">
                    <form action="/atualizar/status/removerQuestoes/questoes" class="form-horizontal" role="form" method="post">
                        <table id="demo-foo-filtering" class="table table-striped toggle-circle m-b-0" data-page-size="7">
                            <thead>
                                <tr>
                                    <th data-toggle="true">pergunta</th>
                                    <th data-toggle="true">Categoria</th>
                                    <th data-hide="phone, tablet">Nivel</th>
                                    <th data-hide="phone, tablet">Ação</th>
                                </tr>
                            </thead>
                            <div class="form-inline m-b-20">
                                <div class="row">
                                    <div class="col-sm-6 text-xs-center">
                                        <div class="form-group">
                                            <label class="control-label m-r-5">Status</label>
                                            <select id="demo-foo-filter-status" class="form-control input-sm">
                                                <option selected="" disabled=""value="">Selecione</option>
                                                <option value="">Todos</option>
                                                <option value="disponivel">disponivel</option>
                                                <option value="bloqueado">bloqueado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-xs-center text-right">
                                        <div class="form-group">
                                            <input id="demo-foo-search" type="text" placeholder="Pesquisar" class="form-control input-sm" autocomplete="on">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <tbody>
                                <?php
                                if ($dados):
                                    foreach ($dados as $key => $valor):
                                        echo "<tr>";
                                        echo "<td>{$valor['pergunta']}</td>";
                                        if ($valor['categoria_id'] == 1):
                                            echo "<td>Subjetiva</td>";
                                        else:
                                            echo "<td>Objetiva</td>";
                                        endif;
                                        switch ($valor['nivel_id']):
                                            case 1:
                                                echo "<td>Fácil</td>";
                                                break;
                                            case 2:
                                                echo "<td>Médio</td>";
                                                break;
                                            case 3:
                                                echo "<td>Difícil</td>";
                                                break;
                                        endswitch;
                                        $aux = $valor['id'];
                                        echo "<td><span><button type='submit' class='btn btn-danger btn-xs' name='$aux'>Excluir</button></span></td>";
                                        echo "</tr>";
                                    endforeach;
                                else:
                                    echo "<tr>";
                                    echo '<td> Nenhuma atividade encontrada</td>';
                                    echo "</tr>";
                                endif;
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <div class="text-right">
                                            <ul class="pagination pagination-split m-t-30 m-b-0"></ul>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php
require_once './footer.php';
?>
