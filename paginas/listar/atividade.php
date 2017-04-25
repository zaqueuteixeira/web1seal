<?php
$title = "Listar Atividades";
require_once './header.php';
require_once './classes/conexao.class.php';

$conexao = new Conexao();

$con = $conexao->BDAbreConexao();
$dados = $conexao->BDSeleciona('atividade', '*');

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
                            listar
                        </li>
                        <li>
                            <a href="/listar/atividades">Atividades</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <center><h4 class="page-title">Listando Atividades</h4></center>
                <br>
                <br>
                <div class="card-box">
                    <form action="/atualizar/status/atividade" class="form-horizontal" role="form" method="post">
                        <table id="demo-foo-filtering" class="table table-striped toggle-circle m-b-0" data-page-size="7">
                            <thead>
                                <tr>
                                    <th data-toggle="true">Turma</th>
                                    <th data-toggle="true">Conteudo</th>
                                    <th data-hide="phone, tablet">Inicio</th>
                                    <th data-hide="phone, tablet">Termino</th>
                                    <th data-hide="phone, tablet">Status</th>
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
                                        echo "<td>{$valor['dataTermino']}</td>";
                                        if ($valor['status'] == 0):
                                            $aux = $valor['id'];
                                            echo "<td><span><button type='submit' class='btn btn-success btn-xs' name='$aux' >liberar</button></span></td>";
                                            echo "<td></td>";
                                        else:
                                            $aux = $valor['id'];
                                            echo "<td><span><button type='submit' class='btn btn-danger btn-xs' name='$aux'>bloquear</button></span></td>";
                                        endif;
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
