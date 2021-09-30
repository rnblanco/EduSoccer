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
        $editarHistoria = $conexion->prepare(" UPDATE historia SET titulo = :titulo, subtitulo= :subtitulo, contenido = :contenido WHERE ID = :id ");
        $editarHistoria->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $editarHistoria->bindParam(':subtitulo', $subtitulo, PDO::PARAM_STR);
        $editarHistoria->bindParam(':contenido', $contenido, PDO::PARAM_STR);
        $editarHistoria->bindParam(':id', $id, PDO::PARAM_STR);
        $editarHistoria->execute();

        if($editarHistoria->rowCount() >= 1){
            echo $editarHistoria->execute();
	        echo json_encode(['code'=>200]);
			exit;
        }
        else {
            echo $editarHistoria->execute();
	        echo json_encode(['code'=>500]);
			exit;
        }

    }

    else{
	    echo json_encode(['code'=>404]);
        echo $error;
    }
?>