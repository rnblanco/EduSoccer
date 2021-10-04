<?php
    require_once '../Db/sesiones.php';
    $usuario = $_SESSION['usuario'];
    if($usuario == null || $usuario = '') header("Location: ../Db/logOut.php");
    else require_once 'Views/agregar-alumno.view.php';
?>