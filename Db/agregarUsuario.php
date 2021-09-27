<?php   
    include_once 'sesiones.php';
    require("conexion.php");

    $nombre="";$pais="";$email="";$pass="";$tipo="";$error="";

    if(empty($_POST['nombre'])){
        $error = "falta nombre";
    }
    else{
        $nombre = $_POST['nombre'];
    }

    if(empty($_POST['pais'])){
        $error .= "falta title";
    }
    else{
        $pais = $_POST['pais'];
    }

    if(empty($_POST['email'])){
        $error .= "falta email";
    }
    else{
        $email = $_POST['email'];
    }

    if(empty($_POST['pass'])){
        $error .= "falta pass";
    }
    else{
        $pass = md5($_POST['pass']);
    }
    if(empty($_POST['tipo'])){
        $error .= "falta tipo";
    }
    else{
        $tipo = $_POST['tipo'];
    }

    
    if($nombre!=="" && $pais!=="" && $email!=="" && $pass!=="" && $tipo!==""){

        $conexion = conectar();
        $nuevoUsuario = $conexion->prepare('INSERT INTO usuarios (Pass, Nombre, Pais, Email, Tipo, Estado) VALUES (?,?,?,?,?,?)');
        $nuevoUsuario->execute([$pass, $nombre, $pais, $email, $tipo, 1]);

        if($nuevoUsuario->rowCount() >= 1){
            http_response_code(200);
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