<?php
$title = "Cadastrar Avaliação";
require_once './classes/conexao.class.php';
require_once './classes/autenticacao.class.php';

$autenticacao = new Autenticacao();
$header = $autenticacao->definirNiveisAcesso();
require_once "$header";

$conexao = new Conexao();
$con = $conexao->BDAbreConexao();

$dados = $conexao->BDSeleciona('turmas', '*', "where(status = '1')");

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
                            Cadastrar
                        </li>
                        <li>
                            <a href="/cadastrar/avaliacao">Avaliação</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <center><h4 class="page-title">Cadastrando avaliação</h4></center>
                <br>
                <br>

                <form action="/cadastrando/avaliacao" class="form-horizontal" role="form" method="post">                                    
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
                                foreach ($dados as $key => $value) {
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
                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-5 col-sm-9">
                            <button type="submit" class="btn btn-success waves-effect waves-light">Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>   
        </div>
    </div>
</div>


<?php
require_once './footer.php';
?>