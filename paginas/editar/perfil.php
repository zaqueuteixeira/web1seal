<?php
require_once './header.php';
require_once './classes/conexao.class.php';

$title = "Editar Perfil";

$conexao = new Conexao();

$con = $conexao->BDAbreConexao();

$nome = $conexao->BDSeleciona('usuario', 'nome', "WHERE(matricula like '{$_SESSION['matricula']}')");
$nome = $nome[0]['nome'];

$email = $conexao->BDSeleciona('usuario', 'email', "WHERE(matricula like '{$_SESSION['matricula']}')");
$email = $email[0]['email'];

$username = $conexao->BDSeleciona('usuario', 'username', "WHERE(matricula like '{$_SESSION['matricula']}')");
$username = $username[0]['username'];

$turma = $conexao->BDSeleciona('usuario', 'turma', "WHERE(matricula like '{$_SESSION['matricula']}')");
$turma = $turma[0]['turma'];

$semestre = $conexao->BDSeleciona('usuario', 'semestre', "WHERE(matricula like '{$_SESSION['matricula']}')");
$semestre = $semestre[0]['semestre'];

$ano = $conexao->BDSeleciona('usuario', 'ano', "WHERE(matricula like '{$_SESSION['matricula']}')");
$ano = $ano[0]['ano'];

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
                            <a href="/editar/perfil">Perfil</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">

                <center><h4 class="page-title">Edite seu perfil</h4></center>
                <br>
                <br>

                <form action="/atualizando/perfil" class="form-horizontal" role="form" method="post">                                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Nome completo:</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="nome" value="<?php echo $nome; ?>">
                        </div>
                        <label class="col-md-1 control-label">Username</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="email">Email</label>
                        <div class="col-md-5">
                            <input type="email" id="example-email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Email">
                        </div>
                        <label class="col-md-1 control-label">Matricula</label>
                        <div class="col-md-3">
                            <input disabled="" type="text" class="form-control" name="matricula" value="<?php echo $_SESSION['matricula'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Turma</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="turma" value="<?php echo $turma; ?>">
                        </div>
                            <label class="col-md-1 control-label">Ano</label>
                            <div class="col-md-2">
                                <input  type="text" class="form-control" name="ano" value="<?php echo $ano; ?>">
                            </div>
                            <label class="col-md-1 control-label">Semestre</label>
                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="semestre" value="<?php echo $semestre; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Senha antiga</label>
                            <div class="col-md-5">
                                <input type="password" class="form-control" name="senha-antiga" value="<?php ?>" placeholder="**********">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Nova Senha</label>
                            <div class="col-md-3">
                                <input type="password" class="form-control" name="senha-nova" value="<?php ?>"placeholder="**********">
                            </div>
                            <label class="col-md-3 control-label">Repita a Senha</label>
                            <div class="col-md-3">
                                <input type="password" class="form-control" name="repeta-senha" value="<?php ?>"placeholder="**********">
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