<?php   
    include_once 'sesiones.php';
    require("conexion.php");

    $contenido="";$titulo="";$locacion="";$id="";$error=""; $subtitulo="";
    $test="";$ext="";$name="";$nuevalocacion="";

    if(empty($_POST['contenido'])) $error = "falta contenido";
    else $contenido = $_POST['contenido'];

	if(empty($_POST['subtitulo'])) $error .= "falta subtitulo";
	else $subtitulo = $_POST['subtitulo'];

    if(empty($_POST['titulo'])) $error .= "falta titulo";
    else $titulo = $_POST['titulo'];

    if(empty($_POST['id'])) $error .= "falta id";
    else $id = $_POST['id'];

    if( $_FILES['img'] ) $locacion="hay imagen";
    else $error .= "falta img";

    //con imagen
    if( $contenido!=="" && $titulo!=="" && $subtitulo!=="" && $id!==""){
        
        $conexion = conectar();

        $publicacionActual  = $conexion ->prepare ("SELECT contenido, titulo, subtitulo from historia WHERE ID = :id ");
        $publicacionActual->bindParam(':id', $id, PDO::PARAM_STR);
        $publicacionActual->execute();
        foreach($publicacionActual as list($acontenido, $atitulo, $asubtitulo )){
            
            if($acontenido == $contenido && $atitulo == $titulo && $asubtitulo == $subtitulo){

                $imagen = $conexion ->prepare("SELECT imagen from historia WHERE ID = :id ");
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

                $imagen = $conexion ->prepare("SELECT imagen from historia WHERE ID = :id ");
                $imagen->bindParam(':id', $id, PDO::PARAM_STR);
                $imagen->execute();

                foreach($imagen as list($imagen)){
	                $locacion = '../assets/img/EduSoccer/' . $imagen;
                    $success = unlink($locacion);  
                    if($success){
                        move_uploaded_file($_FILES['img']['tmp_name'], $locacion);
                        $editarPublicacion = $conexion->prepare(" UPDATE historia SET contenido = :contenido ,titulo = :titulo, subtitulo= :subtitulo WHERE  ID = :id ");
                        $editarPublicacion->bindParam(':contenido', $contenido, PDO::PARAM_STR);
                        $editarPublicacion->bindParam(':titulo', $titulo, PDO::PARAM_STR);
	                    $editarPublicacion->bindParam(':subtitulo', $subtitulo, PDO::PARAM_STR);
                        $editarPublicacion->bindParam(':id', $id, PDO::PARAM_STR);
                        $editarPublicacion->execute();

                        if($editarPublicacion->rowCount() >= 1){
                            echo $editarPublicacion->execute();
                            http_response_code(200);
                        }
                        else {
                            echo $editarPublicacion->execute();
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