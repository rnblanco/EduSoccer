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
        $buscarPublicaciones = $conexion->prepare('SELECT COUNT(*) FROM publicaciones WHERE Id_Usuario = :id ');
        $buscarPublicaciones->bindParam(':id', $id, PDO::PARAM_STR);
        $buscarPublicaciones->execute();
        
        if($buscarPublicaciones->fetchColumn() > 0){

            $eliminarPublicaciones = $conexion->prepare('DELETE FROM publicaciones WHERE Id_Usuario = :id ');
            $eliminarPublicaciones->bindParam(':id', $id, PDO::PARAM_STR);
            $eliminarPublicaciones->execute();

            if($eliminarPublicaciones->rowCount()>=1){
                $eliminarUsuario = $conexion->prepare('DELETE from  usuarios WHERE  Id_Usuario = :id ');
                $eliminarUsuario->bindParam(':id', $id, PDO::PARAM_STR);
                $eliminarUsuario->execute();

                if($eliminarUsuario->rowCount() >= 1){
                    http_response_code(200);
                    json_encode($data);
                }
                else {
                    http_response_code(500);
                    json_encode($data);
                }
            }
            else{
                http_response_code(404);
                json_encode($data); 
            }
        }
        else{
            
            $eliminarUsuario = $conexion->prepare('DELETE from  usuarios WHERE  Id_Usuario = :id ');
            $eliminarUsuario->bindParam(':id', $id, PDO::PARAM_STR);
            $eliminarUsuario->execute();

            if($eliminarUsuario->rowCount() >= 1){
                http_response_code(200);
                json_encode($data);
            }
            else {
                http_response_code(500);
                json_encode($data);
            }
        }
        
    }

    else{
        http_response_code(500);
        json_encode($data);
    }

$conexion=null;
    
?>