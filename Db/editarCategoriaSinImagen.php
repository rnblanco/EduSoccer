<?php   
    include_once 'sesiones.php';
    require("conexion.php");

    $titulo="";$contenido="";$id="";$error="";$subtitulo="";$profesor="";

    if(empty($_POST['titulo'])) $error .= "falta titulo";
    else $titulo = $_POST['titulo'];

	if(empty($_POST['subtitulo'])) $error .= "falta subtitulo";
	else $subtitulo = $_POST['subtitulo'];

    if(empty($_POST['contenido'])) $error .= "falta contenido";
    else $contenido = $_POST['contenido'];

	if(empty($_POST['profesor'])) $error .= "falta profesor";
	else $profesor = $_POST['profesor'];

    if(empty($_POST['id'])) $error .= "falta id";
    else $id = $_POST['id'];


    //sin imagen
    if ($contenido!=="" && $titulo!=="" && $subtitulo!=="" && $id!=="" && $profesor!==""){

        $conexion = conectar();
        $editarCategoria = $conexion->prepare(" UPDATE categorias SET titulo = :titulo, subtitulo= :subtitulo, contenido = :contenido, profesor=:profesor WHERE ID = :id ");
        $editarCategoria->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $editarCategoria->bindParam(':subtitulo', $subtitulo, PDO::PARAM_STR);
        $editarCategoria->bindParam(':contenido', $contenido, PDO::PARAM_STR);
	    $editarCategoria->bindParam(':profesor', $profesor, PDO::PARAM_STR);
        $editarCategoria->bindParam(':id', $id, PDO::PARAM_STR);
        $editarCategoria->execute();

        if($editarCategoria->rowCount() >= 1){
            echo $editarCategoria->execute();
	        echo json_encode(['code'=>200]);
			exit;
        }
        else {
            echo $editarCategoria->execute();
	        echo json_encode(['code'=>500]);
			exit;
        }
    }

    else{
	    echo json_encode(['code'=>404]);
        echo $error;
    }
?>