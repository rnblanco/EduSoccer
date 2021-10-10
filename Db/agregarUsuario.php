<?php   
    include_once 'sesiones.php';
    $nombre="";$usuario="";$apellido="";$edad="";$pass="";$cargo="";$error="";

    if(empty($_POST['nombre'])) $error = "falta nombre";
    else $nombre = $_POST['nombre'];

	if(empty($_POST['apellido'])) $error .= "falta apellido";
	else $apellido = $_POST['apellido'];

	if(empty($_POST['edad'])) $error .= "falta edad";
	else $edad = $_POST['edad'];

    if(empty($_POST['usuario'])) $error .= "falta title";
    else $usuario = $_POST['usuario'];

    if(empty($_POST['pass'])) $error .= "falta pass";
    else $pass = md5($_POST['pass']);

    if(empty($_POST['cargo'])) $error .= "falta cargo";
    else $cargo = $_POST['cargo'];


    if($nombre!=="" && $apellido!=="" && $edad!=="" && $usuario!=="" && $pass!=="" && $cargo!=="" ){

        $conexion = conectar();
        $nuevoUsuario = $conexion->prepare('INSERT INTO usuarios (Usuario, Pass, Nombre, Apellido, Edad, Cargo, Estado) VALUES (?,?,?,?,?,?,?)');
        $nuevoUsuario->execute([$usuario, $pass, $nombre, $apellido, $edad, $cargo, 1]);

        if($nuevoUsuario->rowCount() >= 1) http_response_code(200);
        else http_response_code(404);
    }
    else http_response_code(404);
?>