<?php
$title = "Cadastrar Atividade";

require_once './classes/conexao.class.php';
require_once './classes/autenticacao.class.php';

$autenticacao = new Autenticacao();
$header = $autenticacao->definirNiveisAcesso();
require_once "$header";

$conexao = new Conexao();
$con = $conexao->BDAbreConexao();

$dados = $conexao->BDSeleciona('niveis', '*');

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
                            <a href="/cadastrar/questaoAtividade">Questão Atividade</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <center><h4 class="page-title">Cadastrando as questões da atividade</h4></center>
                <br>
                <br>
                <form action="/cadastrando/questoesAtividade" class="form-horizontal" role="form" method="post"> 
                    <div class="form-group">
                        <label class="col-md-3 control-label">Tipo de Questão:</label>
                        <div class="col-md-3">
                            <select class="form-control" id="tipoQuestao" name="tipoQuestao" onchange="optionCheck()">
                                <option selected="" disabled="">Selecione</option>
                                <option value='1'>Objetiva</option>
                                <option value='2'>Subjetiva</option>
                            </select>
                        </div>
                        <label class="col-md-1 control-label">Nivel:</label>
                        <div class="col-md-3">
                             <select class="form-control" name="nivel_id">
                                <option selected="" disabled="">Selecione</option>
                                <?php
                                foreach ($dados as $key => $value) {
                                    echo "<option value='{$value['id']}'>".$value['descricao']."</option>";
                                }
                                
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="objetiva" style="display:none;">
                        <label class="col-md-2 control-label">Pergunta:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="pergunta" value="">
                        </div>
                        <label class="col-md-2 control-label">A:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="alternativa_a" value="">
                        </div>
                        <label class="col-md-2 control-label">B:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="alternativa_b" value="">
                        </div>
                        <label class="col-md-2 control-label">C:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="alternativa_c" value="">
                        </div>
                        <label class="col-md-2 control-label">D:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="alternativa_d" value="">
                        </div>
                        <label class="col-md-2 control-label">E:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="alternativa_e" value="">
                        </div>
                        <label class="col-md-2 control-label">Resposta:</label>
                        <div class="col-md-1">
                            <input type="text" class="form-control" name="alternativa" value="">
                        </div>
                    </div>
                    <div class="form-group" id="subjetiva" style="display:none;">
                        <label class="col-md-2 control-label">Pergunta:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="perguntaSubjetiva" value="">
                        </div>
                        <label class="col-md-2 control-label">Solucao:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="solucao" value="">
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
<script>
    function optionCheck() {
        var option = document.getElementById("tipoQuestao").value;
        if (option == "1") {
            document.getElementById("objetiva").style.display = "block";
            document.getElementById("subjetiva").style.display = "none";
        }
        if (option == "2") {
            document.getElementById("subjetiva").style.display = "block";
            document.getElementById("objetiva").style.display = "none";
        }
    }
</script>

<?php
require_once './footer.php';
?>