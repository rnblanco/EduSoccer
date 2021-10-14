<?php
	include_once 'sesiones.php';
	$lastPass = "";$newPass = "";$id = "";$error = "";

	if(empty($_POST['lastPass'])) $error .= "falta lastPass";
	else $lastPass = md5($_POST['lastPass']);

	if(empty($_POST['newPass'])) $error .= "falta newPass";
	else $newPass = md5($_POST['newPass']);

	if(empty($_POST['id'])) $error .= "falta id";
	else $id = $_POST['id'];

	if($newPass !== "" && $lastPass !== "" && $id !== ""){

		$conexion = conectar();
		$obtenerUsuario = $conexion->prepare("SELECT Pass FROM usuarios WHERE ID = :id AND Pass=:lastPass ");
		$obtenerUsuario->bindParam(':id', $id, PDO::PARAM_STR);
		$obtenerUsuario->bindParam(':lastPass', $lastPass, PDO::PARAM_STR);
		$obtenerUsuario->execute();

		if($obtenerUsuario->rowCount() >= 1){
			$editarContraseña = $conexion->prepare(" UPDATE usuarios SET Pass = :newPass WHERE ID = :id ");
			$editarContraseña->bindParam(':newPass', $newPass, PDO::PARAM_STR);
			$editarContraseña->bindParam(':id', $id, PDO::PARAM_STR);
			$editarContraseña->execute();

			if($editarContraseña->rowCount() >= 1){
				echo $editarContraseña->execute();
				http_response_code(200);
			}
			else{
				echo $editarContraseña->execute();
				http_response_code(500);
			}
		}
		else{
			http_response_code(404);
			echo $error;
		}
	}
	else{
		http_response_code(404);
		echo $error;
	}
?>