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

        $HistoriaActual  = $conexion ->prepare ("SELECT contenido, titulo, subtitulo from historia WHERE ID = :id ");
        $HistoriaActual->bindParam(':id', $id, PDO::PARAM_STR);
        $HistoriaActual->execute();
        foreach($HistoriaActual as list($acontenido, $atitulo, $asubtitulo )){
            
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
                        $editarHistoria = $conexion->prepare(" UPDATE historia SET contenido = :contenido ,titulo = :titulo, subtitulo= :subtitulo WHERE  ID = :id ");
                        $editarHistoria->bindParam(':contenido', $contenido, PDO::PARAM_STR);
                        $editarHistoria->bindParam(':titulo', $titulo, PDO::PARAM_STR);
	                    $editarHistoria->bindParam(':subtitulo', $subtitulo, PDO::PARAM_STR);
                        $editarHistoria->bindParam(':id', $id, PDO::PARAM_STR);
                        $editarHistoria->execute();

                        if($editarHistoria->rowCount() >= 1){
                            echo $editarHistoria->execute();
                            http_response_code(200);
                        }
                        else {
                            echo $editarHistoria->execute();
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