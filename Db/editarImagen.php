<?php   
    include_once 'sesiones.php';
    $id="";$error="";
    $test="";$ext="";$name="";

    if( $_FILES['img'] ) $locacion="hay imagen";
    else $error .= "falta img";

    if(empty($_POST['id'])) $error .= "falta id";

    else $id = $_POST['id'];


    if( $locacion!=="" && $id!==""){
        
        $conexion = conectar();
        $imagen = $conexion ->prepare("SELECT imagen from slider WHERE id = :id ");
        $imagen->bindParam(':id', $id, PDO::PARAM_STR);
        $imagen->execute();

        foreach($imagen as list($imagen)){
            $locacion = '../assets/img/EduSoccer/' . $imagen;
            $success = unlink($locacion);  
            if($success){
                unlink($locacion);
                move_uploaded_file($_FILES['img']['tmp_name'], $locacion);
                http_response_code(200);
            }
            else {        
                http_response_code(505);
            }
        }
    }
    
    else{
        http_response_code(404);
        echo $error;
    }
?>