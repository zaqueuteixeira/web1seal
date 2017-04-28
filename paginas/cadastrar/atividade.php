<?php
$title = "Cadastrar Atividade";
require_once './header.php';
require_once './classes/conexao.class.php';

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
                            <a href="/cadastrar/atividade">Atividade</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">

                <center><h4 class="page-title">Cadastrando atividade</h4></center>
                <br>
                <br>

                <form action="/cadastrando/atividade" class="form-horizontal" role="form" method="post">                                    
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
                                    echo "<option value='{$value['id']}'>".$value['nome']."</option>";
                                }
                                
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Data inicio:</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="dataInicio" value="" placeholder="">
                        </div>
                        <label class="col-md-1 control-label">Termino:</label>
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="dataTermino" value="" placeholder="">
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-5 col-sm-9">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Cadastrar</button>
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