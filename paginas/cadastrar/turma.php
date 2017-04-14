<?php
require_once './header.php';
require_once './classes/conexao.class.php';
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
                            <a href="/cadastrar/turma">Turma</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">

                <center><h4 class="page-title">Cadastrando Turma</h4></center>
                <br>
                <br>

                <form action="/atualizando/atividade" class="form-horizontal" role="form" method="post">                                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Nome:</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="nome" value="">
                        </div>
                        <label class="col-md-1 control-label">Professor:</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="codigo" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Codigo:</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="codigo" value="">
                        </div>
                        <label class="col-md-1 control-label">Ano:</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="ano" value="">
                        </div>
                        <label class="col-md-1 control-label">Semestre:</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="semestre" value="">
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