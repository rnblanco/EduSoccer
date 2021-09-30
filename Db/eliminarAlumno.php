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
        $eliminarAlumno = $conexion->prepare('DELETE from Alumnos WHERE  ID = :id ');
        $eliminarAlumno->bindParam(':id', $id, PDO::PARAM_STR);
        $eliminarAlumno->execute();
        
        if($eliminarAlumno->rowCount() >= 1){
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