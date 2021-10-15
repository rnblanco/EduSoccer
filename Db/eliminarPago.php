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
        $eliminarPago = $conexion->prepare('DELETE from pagos WHERE  ID = :id ');
        $eliminarPago->bindParam(':id', $id, PDO::PARAM_STR);
        $eliminarPago->execute();
        
        if($eliminarPago->rowCount() >= 1) http_response_code(200);
        else http_response_code(500);
	    json_encode($data);
    }

    else{
        http_response_code(500);
        json_encode($data);
    }
	$conexion=null;
?>