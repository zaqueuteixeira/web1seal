<?php
$title = "Listar Atividades";
require_once './classes/conexao.class.php';
require_once './classes/autenticacao.class.php';

$autenticacao = new Autenticacao();
$header = $autenticacao->definirNiveisAcesso();
require_once "$header";

$conexao = new Conexao();

$con = $conexao->BDAbreConexao();
$dados = $conexao->BDSeleciona('atividades', '*', "WHERE(tipo_id = 1 and status = 1)");

$turmas = $conexao->BDSeleciona('turmas', '*', "where(status = '1')");

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
                            editar
                        </li>
                        <li>
                            <a href="/editar/avaliacao">Avaliações</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <center><h4 class="page-title">Editar Avaliações</h4></center>
                <br>
                <br>
                <div class="card-box">
                    <form action="/atualizar/status/atividade/atividades" class="form-horizontal" role="form" method="post">
                        <table id="demo-foo-filtering" class="table table-striped toggle-circle m-b-0" data-page-size="7">
                            <thead>
                                <tr>
                                    <th data-toggle="true">Turma</th>
                                    <th data-toggle="true">Conteúdo</th>
                                    <th data-hide="phone, tablet">Data</th>
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
                                        echo "<td>{$valor['turma_id']}</td>";
                                        echo "<td>{$valor['conteudo']}</td>";
                                        echo "<td>{$valor['dataInicio']}</td>";
                                        $aux = $valor['id'];
                                        echo "<td><span><button type='button' class='btn btn-warning btn-xs' data-toggle='modal' data-target='#con-close-modal' name='$aux'>Editar</button></span></td>";
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
						
                <div id="con-close-modal" data-backdrop="static" class="modal fade" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title"><strong>Editar Avaliação</strong></h4>
                            </div>
                            <div class="modal-body">
								<div class="form-group">
                        <label class="col-md-2 control-label">Assunto:</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="assunto" value="">
                        </div>
                        <label class="col-md-1 control-label">Turma:</label>
                        <div class="col-md-3">
                            <select class="form-control" name="turma">
                                <option selected="" disabled="">Selecione</option>
                                <?php
                                foreach ($turmas as $key => $value) {
                                    echo "<option value='{$value['id']}'>" . $value['nome'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Data</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="data" value="" placeholder="">
                        </div>

                        <label class="col-md-1 control-label">Valor:</label>
                        <div class="col-md-3">
                            <input type="number" class="form-control" name="valor" value=""placeholder="">
                        </div>
                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-success waves-effect waves-light">Salvar</button>
                            </div>
                        </div>
                    </div>
                </div><!-- /.modal -->

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
