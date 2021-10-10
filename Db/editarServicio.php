<?php
	include_once 'sesiones.php';
	$titulo = "";$contenido = "";$id = "";$error = "";

	if(empty($_POST['titulo'])) $error .= "falta titulo";
	else $titulo = $_POST['titulo'];

	if(empty($_POST['contenido'])) $error .= "falta contenido";
	else $contenido = $_POST['contenido'];

	if(empty($_POST['id'])) $error .= "falta id";
	else $id = $_POST['id'];
	
	if($contenido !== "" && $titulo !== "" && $id !== ""){

		$conexion = conectar();
		$editarServicio = $conexion->prepare(" UPDATE servicios SET titulo = :titulo , contenido = :contenido WHERE  ID = :id ");
		$editarServicio->bindParam(':titulo', $titulo, PDO::PARAM_STR);
		$editarServicio->bindParam(':contenido', $contenido, PDO::PARAM_STR);
		$editarServicio->bindParam(':id', $id, PDO::PARAM_STR);
		$editarServicio->execute();

		if($editarServicio->rowCount() >= 1){
			echo $editarServicio->execute();
			http_response_code(200);
		}else{
			echo $editarServicio->execute();
			http_response_code(500);
		}

	}else{
		http_response_code(404);
		echo $error;
	}
?>