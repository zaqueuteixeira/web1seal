<?php
require_once './header.php';
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
                            <a href="/editar/perfil">Perfil</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">

                <center><h4 class="page-title">Edite seu perfil</h4></center>
                <br>
                <br>

                <form class="form-horizontal" role="form">                                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Nome completo:</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" value="">
                        </div>
                        <label class="col-md-1 control-label">Username</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="example-email">Email</label>
                        <div class="col-md-5">
                            <input type="email" id="example-email" name="example-email" class="form-control" placeholder="Email">
                        </div>
                        <label class="col-md-1 control-label">Matricula</label>
                        <div class="col-md-3">
                            <input disabled="" type="text" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Turma</label>
                        <div class="col-md-2">
                            <input disabled="" type="text" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label">Ano</label>
                            <div class="col-md-2">
                                <input disabled="" type="text" class="form-control" value="">
                            </div>
                            <label class="col-md-1 control-label">Semestre</label>
                            <div class="col-md-2">
                                <input disabled="" type="text" class="form-control" value="">
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Senha antiga</label>
                        <div class="col-md-5">
                            <input type="password" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Nova Senha</label>
                        <div class="col-md-3">
                            <input type="password" class="form-control" value="">
                        </div>
                        <label class="col-md-3 control-label">Repita a Senha</label>
                        <div class="col-md-3">
                            <input type="password" class="form-control" value="">
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-5 col-sm-9">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Atualizar</button>
                        </div>
                    </div>

                </form>

            </div>   
        </div>
    </div>


    <?php
    require_once './footer.php';
    ?>