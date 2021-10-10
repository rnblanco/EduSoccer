<?php   
    include_once 'sesiones.php';
    $titulo="";$contenido="";$id="";$error="";

    if(empty($_POST['titulo'])) $error .= "falta titulo";
    else $titulo = $_POST['titulo'];

    if(empty($_POST['contenido'])) $error .= "falta contenido";
    else $contenido = $_POST['contenido'];

    if(empty($_POST['id'])) $error .= "falta id";
    else $id = $_POST['id'];

    if ($contenido!=="" && $titulo!=="" && $id!==""){

        $conexion = conectar();
        $editarContacto = $conexion->prepare(" UPDATE contacto SET titulo = :titulo, contenido = :contenido WHERE ID = :id ");
        $editarContacto->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $editarContacto->bindParam(':contenido', $contenido, PDO::PARAM_STR);
        $editarContacto->bindParam(':id', $id, PDO::PARAM_STR);
        $editarContacto->execute();

        if($editarContacto->rowCount() >= 1){
            echo $editarContacto->execute();
	        echo json_encode(['code'=>200]);
			exit;
        }
        else {
            echo $editarContacto->execute();
	        echo json_encode(['code'=>500]);
			exit;
        }

    }

    else{
	    echo json_encode(['code'=>404]);
        echo $error;
    }
?>