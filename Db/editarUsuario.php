<?php   
    include_once 'sesiones.php';
	$nombre="";$usuario="";$apellido="";$edad="";$pass="";$cargo="";$estado="";$error="";$md5="";$id="";

	if(empty($_POST['nombre'])) $error = "falta nombre";
	else $nombre = $_POST['nombre'];

	if(empty($_POST['apellido'])) $error .= "falta apellido";
	else $apellido = $_POST['apellido'];

	if(empty($_POST['edad'])) $error .= "falta edad";
	else $edad = $_POST['edad'];

	if(empty($_POST['usuario'])) $error .= "falta title";
	else $usuario = $_POST['usuario'];

	if(empty($_POST['md5'])) $error .= "falta md5";
	else $md5 = $_POST['md5'];

	if(empty($_POST['pass'])) $error .= "falta pass";
	else{
		if($md5) $pass = md5($_POST['pass']);
		else $pass = $_POST['pass'];
	}

	if(empty($_POST['cargo'])) $error .= "falta cargo";
	else $cargo = $_POST['cargo'];

	if(empty($_POST['estado'])) $error .= "falta estado";
	else $estado = $_POST['estado'];

	if(empty($_POST['id'])) $error .= "falta id";
	else $id = $_POST['id'];

    if($nombre!=="" && $apellido!=="" && $edad!=="" && $usuario!=="" && $pass!=="" && $cargo!=="" && $id!==""){
	    $conexion = conectar();
	    $nuevoUsuario = $conexion->prepare("UPDATE usuarios set Usuario = :Usuario , Pass = :Pass, Nombre = :Nombre, Apellido=:Apellido,
                    							  Edad=:Edad, Cargo=:Cargo, Estado=:Estado WHERE ID = :ID  ");
	    $nuevoUsuario->bindParam(':Usuario', $usuario, PDO::PARAM_STR);
	    $nuevoUsuario->bindParam(':Pass', $pass, PDO::PARAM_STR);
	    $nuevoUsuario->bindParam(':Nombre', $nombre, PDO::PARAM_STR);
	    $nuevoUsuario->bindParam(':Apellido', $apellido, PDO::PARAM_STR);
	    $nuevoUsuario->bindParam(':Edad', $edad, PDO::PARAM_STR);
	    $nuevoUsuario->bindParam(':Cargo', $cargo, PDO::PARAM_STR);
	    $nuevoUsuario->bindParam(':Estado', $estado, PDO::PARAM_STR);
	    $nuevoUsuario->bindParam(':ID', $id, PDO::PARAM_STR);
	    $nuevoUsuario->execute();

	    if($nuevoUsuario->rowCount() >= 1) http_response_code(200);
	    else{
		    http_response_code(404);
			echo $nuevoUsuario->execute();
	    }
    }
    else{
	    http_response_code(400);
		echo $error;
    }


?>