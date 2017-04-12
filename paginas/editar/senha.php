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
                            <a href="/editar/senha">Senha</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">

                <center><h4 class="page-title">Edite a senha do Usuário</h4></center>
                <br>
                <br>

                <form action="/atualizar/senha" class="form-horizontal" role="form" method="post">                                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">Matricula</label>
                        <div class="col-md-4">
                            <input type="password" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Nova Senha</label>
                        <div class="col-md-4">
                            <input type="password" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Repita a Senha</label>
                        <div class="col-md-4">
                            <input type="password" class="form-control" value="">
                        </div>
                        
                    </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-offset-5 col-sm-2">
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