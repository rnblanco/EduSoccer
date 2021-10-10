<?php
	include_once 'sesiones.php';
	$error="";$user="";$pass="";

    if(empty($_POST["pass"])){
        $error = " falta pass ";
        $data = $error;
    }
    else $pass = md5($_POST["pass"]);


    if(empty($_POST["user"])){
        $error = " falta user ";
        $data = $error;
    }
    else $user = $_POST["user"];

    if( $user != "" && $pass != "" ) {

        $conexion = conectar();
        $login = $conexion->prepare('SELECT * FROM usuarios WHERE Usuario = :user AND Pass = :pass AND Estado=1');
        $login->bindParam(':user', $user, PDO::PARAM_STR);
        $login->bindParam(':pass', $pass, PDO::PARAM_STR);
        $login->execute();
        $usuario = $login->fetchAll();
        
        if($login->rowCount() >= 1){
            $_SESSION['usuario'] = $user;
            $_SESSION['tipo']= $usuario['0']['Cargo'];
            $_SESSION['id']= $usuario['0']['ID'];
        }
        else {
            $_SESSION["usuario"] = null;
            http_response_code(500);
        }
    }
    else http_response_code(500);

	$conexion=null;
    
?>