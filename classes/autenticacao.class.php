<?php
require_once 'conexao.class.php';

$conexao = new Conexao();

$mysqli = $conexao->conectar();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>SEAL</title>
        <script type="text/javascript">
            function loginSuccess() {
                setTimeout("window.location='../inicio'", 1);
                
            }

            function loginFailed() {
                setTimeout("window.location='../login'", 1);
            }
        </script>
    </head>
    <body>  
        <?php
        $matricula = $_POST['matricula'];
        $senha = md5($_POST['senha']);
        
        $sql = "SELECT * FROM usuario WHERE(matricula like '$matricula' and senha = '$senha')";
        $mysqli->query($sql) or die(mysqli_error($mysqli));
        $resultado = mysqli_affected_rows($mysqli);
        
        if($resultado > 0){    
            session_start();
            $_SESSION['matricula'] = $_POST['matricula'];
            echo "<script>loginSuccess()</script>";
        }else{
            echo "<script>loginFailed()</script>";
        }
        
       ?>
    </body>
</html>