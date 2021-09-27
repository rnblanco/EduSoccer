<?php
    require_once '../Db/sesiones.php';

    if(empty($_SESSION['usuario'])){
        require_once 'Views/login.view.php';
    }
    else{
        header("Location: index.php");
    }
?>