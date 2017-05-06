<?php
$title = "Cadastrar Atividade";
require_once './classes/conexao.class.php';

require_once './classes/autenticacao.class.php';

$autenticacao = new Autenticacao();
$header = $autenticacao->definirNiveisAcesso();
require_once "$header";

$conexao = new Conexao();
$con = $conexao->BDAbreConexao();

$atividade = $conexao->BDSeleciona('atividades', '*', "WHERE (id = '{$_SESSION['atividade_id']}')");

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
                            Editar
                        </li>
                        <li>
                            <a href="/editar/definirAtividade">Atividade</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <center><h4 class="page-title">Editar atividade</h4></center>
                <br>
                <br>
                <form action="/cadastrando/atividade" class="form-horizontal" role="form" method="post">                                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Assunto:</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="assunto" value="<?php echo $atividade[0]['conteudo']; ?>">
                        </div>
                        <label class="col-md-1 control-label">Turma:</label>
                        <div class="col-md-3">
                            <select class="form-control" name="turma">
                                <option selected="" disabled="">Selecione</option>
                                <?php
                                foreach ($dados as $key => $value) {
                                    if ($value['id'] == $atividade[0][turma_id]) {
                                        echo "<option selected value='{$value['id']}'>" . $value['nome'] . "</option>";
                                    }
                                    echo "<option value='{$value['id']}'>" . $value['nome'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Data inicio:</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="dataInicio" value="<?php echo $atividade[0]['dataInicio']; ?>" placeholder="">
                        </div>
                        <label class="col-md-1 control-label">Termino:</label>
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="dataTermino" value="<?php echo $atividade[0]['dataTermino']; ?>" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Adicionar questões:</label>
                        <div class="col-md-4">
                            <button type="buttom" class="btn btn-warning waves-effect waves-light"><a href="/cadastrar/adicionarQuestao" style="color: white;">Adicionar</a></button>
                        </div>
                        <label class="col-md-2 control-label">Remover questões:</label>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-danger waves-effect waves-light"><a href="/editar/removerQuestao" style="color: white;">Remover</a></button>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
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