<?php   
    include_once 'sesiones.php';
    require("conexion.php");

    $contenido="";$titulo="";$locacion="";$id="";$error="";
    $test="";$ext="";$name="";$nuevalocacion="";

    if(empty($_POST['contenido'])) $error = "falta contenido";
    else $contenido = $_POST['contenido'];

    if(empty($_POST['titulo'])) $error .= "falta titulo";
    else $titulo = $_POST['titulo'];

    if(empty($_POST['id'])) $error .= "falta id";
    else $id = $_POST['id'];

    if( $_FILES['img'] ) $locacion="hay imagen";
    else $error .= "falta img";

    //con imagen
    if( $contenido!=="" && $titulo!=="" && $id!==""){
        
        $conexion = conectar();

        $ContactoActual  = $conexion ->prepare ("SELECT contenido, titulo from contacto WHERE ID = :id ");
        $ContactoActual->bindParam(':id', $id, PDO::PARAM_STR);
        $ContactoActual->execute();
        foreach($ContactoActual as list($acontenido, $atitulo)){
            
            if($acontenido == $contenido && $atitulo == $titulo){

                $imagen = $conexion ->prepare("SELECT imagen from contacto WHERE ID = :id ");
                $imagen->bindParam(':id', $id, PDO::PARAM_STR);
                $imagen->execute();

                foreach($imagen as list($imagen)){
	                $locacion = '../assets/img/EduSoccer/' . $imagen;
                    $success = unlink($locacion);
                    if($success){
                        move_uploaded_file($_FILES['img']['tmp_name'], $locacion);
                        http_response_code(200);
                    }
                    else{
                        http_response_code(505);
                    }
                }
            }
            else{

                $imagen = $conexion ->prepare("SELECT imagen from contacto WHERE ID = :id ");
                $imagen->bindParam(':id', $id, PDO::PARAM_STR);
                $imagen->execute();

                foreach($imagen as list($imagen)){
	                $locacion = '../assets/img/EduSoccer/' . $imagen;
                    $success = unlink($locacion);  
                    if($success){
                        move_uploaded_file($_FILES['img']['tmp_name'], $locacion);
                        $editarContacto = $conexion->prepare(" UPDATE contacto SET contenido = :contenido, titulo = :titulo WHERE  ID = :id ");
                        $editarContacto->bindParam(':contenido', $contenido, PDO::PARAM_STR);
                        $editarContacto->bindParam(':titulo', $titulo, PDO::PARAM_STR);
                        $editarContacto->bindParam(':id', $id, PDO::PARAM_STR);
                        $editarContacto->execute();

                        if($editarContacto->rowCount() >= 1){
                            echo $editarContacto->execute();
                            http_response_code(200);
                        }
                        else {
                            echo $editarContacto->execute();
                            http_response_code(500);
                        }
                    }
                    else{
                        http_response_code(505);
                    }
                }
            }
        }
    }

    else{
        http_response_code(404);
        echo $error;
    }
?>