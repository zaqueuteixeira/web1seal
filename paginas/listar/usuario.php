<?php
$title = "Listar Usuarios";
require_once './classes/conexao.class.php';
require_once './classes/autenticacao.class.php';

$autenticacao = new Autenticacao();
$header = $autenticacao->definirNiveisAcesso();
require_once "$header";
$conexao = new Conexao();
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
                            <a href="/listar/usuario">Alunos</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <center><h4 class="page-title">Listando Alunos</h4></center>
                <br>
                <br>
                <div class="card-box">
                    <form action="/atualizar/status/usuario/alunos" class="form-horizontal" role="form" method="post">
                        <table id="demo-foo-filtering" class="table table-striped toggle-circle m-b-0" data-page-size="7">
                            <thead>
                                <tr>
                                    <th data-toggle="true">Nome</th>
                                    <th data-toggle="true">Matricula</th>
                                    <th data-hide="phone, tablet">Semestre</th>
                                    <th data-hide="phone, tablet">Ano</th>
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
                                                <option value="liberar">liberar</option>
                                                <option value="bloquear">bloquear</option>
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
                                $con = $conexao->BDAbreConexao();
                                $dados = $conexao->BDSeleciona('alunos', '*');
                                $conexao->BDFecharConexao($con);

                                foreach ($dados as $key => $valor):
                                    echo "<tr>";
                                    echo "<td>{$valor['nome']}</td>";
                                    echo "<td>{$valor['matricula']}</td>";
                                    echo "<td>{$valor['ano']}</td>";
                                    echo "<td>{$valor['semestre']}</td>";
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
