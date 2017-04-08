<?php
    session_start();
    if(isset($_SESSION['matricula'])){
        header("Location: ../index.php");
    }else{ 
        header("Location: ../paginas/login.php");
    }
?>