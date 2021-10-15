<?php
	include_once 'sesiones.php';
	$alumno = "";$fecha = "";$id = "";$error = "";

	if(empty($_POST['alumno'])) $error .= "falta alumno";
	else $alumno = $_POST['alumno'];

	if(empty($_POST['cobro'])) $error .= "falta cobro";
	else $cobro = $_POST['cobro'];

	if(empty($_POST['fecha'])) $error .= "falta fecha";
	else $fecha = $_POST['fecha'];

	if(empty($_POST['id'])) $error .= "falta id";
	else $id = $_POST['id'];

	if($fecha !== "" && $alumno !== "" && $id !== ""){

		$conexion = conectar();
		$editarServicio = $conexion->prepare(" UPDATE pagos SET Alumno = :alumno, Fecha = :fecha, Cobro=:cobro WHERE  ID = :id ");
		$editarServicio->bindParam(':alumno', $alumno, PDO::PARAM_STR);
		$editarServicio->bindParam(':fecha', $fecha, PDO::PARAM_STR);
		$editarServicio->bindParam(':cobro', $cobro, PDO::PARAM_STR);
		$editarServicio->bindParam(':id', $id, PDO::PARAM_STR);
		$editarServicio->execute();

		if($editarServicio->rowCount() >= 1){
			echo $editarServicio->execute();
			http_response_code(200);
		}
		else{
			echo $editarServicio->execute();
			http_response_code(500);
		}

	}
	else{
		http_response_code(404);
		echo $error;
	}
?>