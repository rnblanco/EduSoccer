<?php   
    include_once 'sesiones.php';
    require("conexion.php");
    $id = $_SESSION['id'];

    $error="";$contenido="";$titulo="";$subtitulo="";$profesor="";$test="";$ext="";$name="";$locacion="";$nuevalocacion="";

    if(empty($_POST['contenido'])) $error = "falta contenido";
    else $contenido = $_POST['contenido'];

    if(empty($_POST['titulo'])) $error .= "falta titulo";
    else $titulo = $_POST['titulo'];

	if(empty($_POST['subtitulo'])) $error .= "falta subtitulo";
	else $subtitulo = $_POST['subtitulo'];

	if(empty($_POST['profesor'])) $error .= "falta profesor";
	else $profesor = $_POST['profesor'];

    if( $_FILES['img'] ){
	    $locacion = '../assets/img/EduSoccer/' . $_FILES['img']['name'];
        $nuevalocacion = $_FILES['img']['name'];
    }
    else $error .= "falta img";
    
    if( $subtitulo!=="" && $contenido!=="" && $titulo!=="" && $nuevalocacion!=="" && $profesor!=="" ) {
        $conexion = conectar();
        $agregarHistorial = $conexion->prepare('INSERT INTO categorias (Titulo, Subtitulo, Contenido, Profesor, Imagen) VALUES (?,?,?,?,?)');
        $agregarHistorial->execute([$titulo, $subtitulo, $contenido, $profesor, $nuevalocacion]);

        if($agregarHistorial->rowCount() >= 1){
	        move_uploaded_file($_FILES['img']['tmp_name'], $locacion);
	        echo json_encode(['code'=>200]);
	        exit;
        }
        else {
            echo json_encode(['code'=>404]);
            echo $error;
        }
    }

    else{
        echo json_encode(['code'=>400]);
        echo $error;
    }
?>