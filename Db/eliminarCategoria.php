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
        $eliminarCategoria = $conexion->prepare('DELETE from  categorias WHERE  ID = :id ');
        $eliminarCategoria->bindParam(':id', $id, PDO::PARAM_STR);
        $eliminarCategoria->execute();
        
        if($eliminarCategoria->rowCount() >= 1){
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