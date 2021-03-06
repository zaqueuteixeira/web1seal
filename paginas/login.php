<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['matricula'])) {
    header("Location: ./inicio");
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="../assets/images/favicon_1.ico">

        <title>SEAL - Login</title>

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <script src="../assets/js/modernizr.min.js"></script>

    </head>
    <body>
        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class=" card-box">
                <div class="panel-heading"> 
                    <center>  <img src="../assets/images/logo.png"></center>
                </div> 
                <div class="button-list">
                    <a class="btn btn-warning waves-effect waves-light" href="javascript:;" onclick="$.Notification.notify('warning', 'top left', 'Sample Notification', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae orci ut dolor scelerisque aliquam.')">Warning</a>
                    <a class="btn btn-danger waves-effect waves-light" href="javascript:;" onclick="$.Notification.notify('error', 'top left', 'Sample Notification', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae orci ut dolor scelerisque aliquam.')">Error</a>
                    <a class="btn btn-inverse waves-effect waves-light" href="javascript:;" onclick="$.Notification.notify('black', 'top left', 'Sample Notification', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae orci ut dolor scelerisque aliquam.')">Black</a>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal m-t-20" action="/autenticacao" method="post">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" name="matricula" placeholder="Matricula">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" required="" name="senha" placeholder="Senha">
                            </div>
                        </div>
                        <div class="form-group text-center m-t-40">
                            <div class="col-xs-12">
                                <button class="btn btn-danger btn-block text-uppercase waves-effect waves-light" type="submit">Entrar</button>
                            </div>
                        </div>
                    </form> 
                </div>   
            </div>                              
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="cor-fonte" >
                        <p>Não possui cadastro? <a href="./cadastro" class="text-primary m-l-5"><b>Clique aqui</b></a></p>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/detect.js"></script>
        <script src="../assets/js/fastclick.js"></script>
        <script src="../assets/js/jquery.slimscroll.js"></script>
        <script src="../assets/js/jquery.blockUI.js"></script>
        <script src="../assets/js/waves.js"></script>
        <script src="../assets/js/wow.min.js"></script>
        <script src="../assets/js/jquery.nicescroll.js"></script>
        <script src="../assets/js/jquery.scrollTo.min.js"></script>

        <script src="../assets/plugins/notifyjs/dist/notify.min.js"></script>
        <script src="../assets/plugins/notifications/notify-metro.js"></script>


        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>

    </body>
</html>