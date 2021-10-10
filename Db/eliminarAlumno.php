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
        $eliminarAlumno = $conexion->prepare('DELETE from alumnos WHERE  ID = :id ');
        $eliminarAlumno->bindParam(':id', $id, PDO::PARAM_STR);
        $eliminarAlumno->execute();
        
        if($eliminarAlumno->rowCount() >= 1){

	        $eliminarPagos = $conexion->prepare('DELETE from pagos WHERE  Alumno = :id ');
	        $eliminarPagos->bindParam(':id', $id, PDO::PARAM_STR);
	        $eliminarPagos->execute();

	        $eliminarAsistencias = $conexion->prepare('DELETE from asistencia WHERE  Alumno = :id ');
	        $eliminarAsistencias->bindParam(':id', $id, PDO::PARAM_STR);
	        $eliminarAsistencias->execute();

			http_response_code(200);
        }
        else {
            http_response_code(500);
        }
	    json_encode($data);
    }

    else{
        http_response_code(500);
        json_encode($data);
    }

$conexion=null;
    
?>