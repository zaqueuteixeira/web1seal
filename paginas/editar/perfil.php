<?php
require_once './header.php';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row">
                <div class="col-md-7">
                    <form class="form-horizontal" role="form">                                    
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nome</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Matricula</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Username</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="example-email">Email</label>
                            <div class="col-md-9">
                                <input type="email" id="example-email" name="example-email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Turma</label>
                            <div class="col-md-9">
                                <input disabled="" type="text" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Ano</label>
                            <div class="col-md-9">
                                <input disabled="" type="text" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Semestre</label>
                            <div class="col-md-9">
                                <input disabled="" type="text" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Senha antiga</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" value="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nova Senha</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" value="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Repita a nova Senha</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" value="password">
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-info waves-effect waves-light">Salvar</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>


        <?php
        require_once './footer.php';
        ?>
