<?php
	session_start();
    $usuario = $_SESSION['usuario'] || null;
    if($usuario == null || $usuario = '') header("Location: ../Db/logOut.php");
    else require_once 'Views/index.view.php';
?>