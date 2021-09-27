<?php
    require_once 'sesiones.php';

    //Limpiamos las variables de sesión   
    session_unset();
    //Destruimos la sesión
    session_destroy();
    //Redireccionamos al login
    header("Location: ../Admin/login.php");
?>