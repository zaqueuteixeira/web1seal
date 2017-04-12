<?php
    session_start();
    if(isset($_SESSION['matricula'])){
        header("Location: /inicio");
    }else{ 
        header("Location: /login");
    }
?>