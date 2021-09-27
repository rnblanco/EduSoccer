<?php   
    include_once 'sesiones.php';
    require("conexion.php");

    $titulo="";$contenido="";$id="";$error="";$subtitulo="";

    if(empty($_POST['titulo'])) $error .= "falta titulo";
    else $titulo = $_POST['titulo'];

	if(empty($_POST['subtitulo'])) $error .= "falta subtitulo";
	else $subtitulo = $_POST['subtitulo'];

    if(empty($_POST['contenido'])) $error .= "falta contenido";
    else $contenido = $_POST['contenido'];

    if(empty($_POST['id'])) $error .= "falta id";
    else $id = $_POST['id'];


    //sin imagen
    if ($contenido!=="" && $titulo!=="" && $subtitulo!=="" && $id!==""){

        $conexion = conectar();
        $editarPublicacion = $conexion->prepare(" UPDATE historia SET titulo = :titulo, subtitulo= :subtitulo, contenido = :contenido WHERE ID = :id ");
        $editarPublicacion->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $editarPublicacion->bindParam(':subtitulo', $subtitulo, PDO::PARAM_STR);
        $editarPublicacion->bindParam(':contenido', $contenido, PDO::PARAM_STR);
        $editarPublicacion->bindParam(':id', $id, PDO::PARAM_STR);
        $editarPublicacion->execute();

        if($editarPublicacion->rowCount() >= 1){
            echo $editarPublicacion->execute();
	        echo json_encode(['code'=>200]);
			exit;
        }
        else {
            echo $editarPublicacion->execute();
	        echo json_encode(['code'=>500]);
			exit;
        }

    }

    else{
	    echo json_encode(['code'=>404]);
        echo $error;
    }
?>