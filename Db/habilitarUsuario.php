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
        $habilitarUsuario = $conexion->prepare('UPDATE usuarios SET Estado="1" WHERE ID = :id ');
        $habilitarUsuario->bindParam(':id', $id, PDO::PARAM_STR);
        $habilitarUsuario->execute();

        if($habilitarUsuario->rowCount() >= 1) http_response_code(200);
        else http_response_code(500);
    }
    else http_response_code(500);

$conexion=null;
    
?>