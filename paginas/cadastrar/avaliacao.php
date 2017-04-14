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
                            <a href="/cadastrar/avaliacao">Avaliçao</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">

                <center><h4 class="page-title">Cadastrando avaliçao</h4></center>
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
                            <select class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
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
                            <button type="submit" class="btn btn-info waves-effect waves-light">Atualizar</button>
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