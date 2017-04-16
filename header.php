<?php
session_start();

if (!isset($_SESSION["matricula"])) {
    header("Location: /login");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="/assets/images/favicon_1.ico">

        <title>SEAL - Inicio</title>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="/assets/plugins/morris/morris.css">
        
        <!--Tables -->
        <link href="/assets/plugins/footable/css/footable.core.css" rel="stylesheet">
        <link href="/assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />

        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/custom.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="/assets/js/modernizr.min.js"></script>

    </head>

    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="/inicio" class="logo"><i class="md md-album"></i><span> SEAL</span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="ion-navicon"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="/assets/images/user_photo.png" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/editar/perfil"><i class="ti-user m-r-5"></i>Perfil</a></li>
                                        <li><a href="/sair"><i class="ti-power-off m-r-5"></i>Sair</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>

                            <li class="has_sub">
                                <a href="/inicio" class="waves-effect active"><i class="ti-home"></i> <span>inicio</span> </a>

                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="ti-list"></i> <span>Editar</span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="/editar/atividade">Atividade</a></li>
                                    <li><a href="/editar/avaliacao">Avaliacao</a></li>
                                    <li><a href="/editar/senha">Senha</a></li>
                                    <li><a href="/editar/turma">Turma</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="ti-pencil-alt"></i><span>Cadastar</span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="/cadastrar/atividade">Atividade</a></li>
                                    <li><a href="/cadastrar/avaliacao">Avaliação</a></li>
                                    <li><a href="/cadastrar/turma">Turma</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="ti-light-bulb"></i><span>Listar</span></a>
                                <ul class="list-unstyled">
                                    <li><a href="/listar/usuario">Usuario</a></li>
                                    <li><a href="/listar/atividades">Atividades</a></li>
                                    <li><a href="/listar/avaliacoes">Avaliações</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="ti-spray"></i> <span>Outros</span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="/outros/historico">Histórico</a></li>
                                    <li><a href="/outros/recuperarSenha">Recuperar Senha</a></li>
                                    <li><a href="/outros/bloquearAluno">Bloquear Aluno</a></li>
                                    <li><a href="/outros/desbloquearAluno">Desbloquear Aluno</a></li>
                                    <li><a href="/outros/visualizarCampeonato">Visualizar campeonato</a></li>
                                </ul>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                    </div> <!-- container -->

