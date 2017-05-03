<?php
$title = "Editar Perfil";
require_once './classes/conexao.class.php';
require_once './classes/autenticacao.class.php';

$autenticacao = new Autenticacao();
$header = $autenticacao->definirNiveisAcesso();
require_once "$header";

$conexao = new Conexao();

$con = $conexao->BDAbreConexao();

$tabela = $conexao->BDRetornarTabela($_SESSION['matricula']);
$consulta = $conexao->BDSeleciona("$tabela", '*', "WHERE(matricula like '{$_SESSION['matricula']}')");
$nome = $consulta[0]['nome'];
$email = $consulta[0]['email'];
$username = $consulta[0]['username'];
if ($tabela != 'professores') {
    $semestre = $consulta[0]['semestre'];
    $ano = $consulta[0]['ano'];
}

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
                        <?php if ($tabela != 'professores'):?>
                        <label class="col-md-2 control-label">Ano</label>
                        <div class="col-md-2">
                            <input  type="text" class="form-control" name="ano" value="<?php echo $ano; ?>">
                        </div>
                        <label class="col-md-1 control-label">Semestre</label>
                        <div class="col-md-1">
                            <input  type="text" class="form-control" name="semestre" value="<?php echo $semestre; ?>">
                        </div>
                        <?php endif;?>

                        <label class="col-md-2 control-label">Senha antiga</label>
                        <div class="col-md-3">
                            <input type="password" class="form-control" name="senha-antiga" value="<?php ?>" placeholder="**********">
                        </div>
                    </div>
                    <div class="form-group">
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Nova Senha</label>
                        <div class="col-md-3">
                            <input type="password" class="form-control" name="senha-nova" value="<?php ?>" placeholder="**********">
                        </div>
                        <label class="col-md-3 control-label">Repita a Senha</label>
                        <div class="col-md-3">
                            <input type="password" class="form-control" name="repeta-senha" value="<?php ?>" placeholder="**********">
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-5 col-sm-9">
                            <button type="submit" class="btn btn-success waves-effect waves-light">Atualizar</button>
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