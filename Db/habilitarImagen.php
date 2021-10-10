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
        $eliminarPublicacion = $conexion->prepare('UPDATE slider SET Estado="2"  WHERE  ID = :id ');
        $eliminarPublicacion->bindParam(':id', $id, PDO::PARAM_STR);
        $eliminarPublicacion->execute();
        
        if($eliminarPublicacion->rowCount() >= 1){
            http_response_code(200);
            json_encode($data);
        }
        else {
            http_response_code(500);
            json_encode($data);
        }
    }

    else{
        http_response_code(500);
        json_encode($data);
    }

$conexion=null;
    
?>