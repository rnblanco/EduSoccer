<?php   
    session_start();
    require("conexion.php");
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
        $deshabilitarUsuario = $conexion->prepare('UPDATE usuarios SET Estado="2" WHERE ID = :id ');
        $deshabilitarUsuario->bindParam(':id', $id, PDO::PARAM_STR);
        $deshabilitarUsuario->execute();
        
        if($deshabilitarUsuario->rowCount() >= 1) http_response_code(200);
        else http_response_code(500);
    }
    else http_response_code(500);

$conexion=null;
    
?>