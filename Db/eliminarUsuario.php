<?php
	include_once 'sesiones.php';
    $error="";$id="";$data="";

    if(empty($_POST["id"])){
        $error = " falta id ";
        $data = $error;
    }
    else {
        $id = $_POST["id"];
        $data = $id;
    }

    if( $id != "") {
        $conexion = conectar();
        $eliminarUsuario = $conexion->prepare('DELETE from  usuarios WHERE  ID = :id ');
        $eliminarUsuario->bindParam(':id', $id, PDO::PARAM_STR);
        $eliminarUsuario->execute();
        if($eliminarUsuario->rowCount() >= 1) http_response_code(200);
        else http_response_code(500);
    }
    else http_response_code(500);

$conexion=null;
?>