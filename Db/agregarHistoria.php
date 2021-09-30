<?php   
    include_once 'sesiones.php';
    require("conexion.php");
    $id = $_SESSION['id'];

    $error="";$contenido="";$titulo="";$subtitulo="";$test="";$ext="";$name="";$locacion="";$nuevalocacion="";

    if(empty($_POST['contenido'])) $error = "falta contenido";
    else $contenido = $_POST['contenido'];

    if(empty($_POST['titulo'])) $error .= "falta titulo";
    else $titulo = $_POST['titulo'];

	if(empty($_POST['subtitulo'])) $error .= "falta subtitulo";
	else $subtitulo = $_POST['subtitulo'];

    if( $_FILES['img'] ){
	    $locacion = '../assets/img/EduSoccer/' . $_FILES['img']['name'];
        $nuevalocacion = $_FILES['img']['name'];
    }
    else $error .= "falta img";
    
    if( $subtitulo!=="" && $contenido!=="" && $titulo!=="" && $nuevalocacion!=="" ) {
        $conexion = conectar();
        $agregarHistoria = $conexion->prepare('INSERT INTO historia (Titulo, Subtitulo, Contenido, Imagen) VALUES (?,?,?,?)');
        $agregarHistoria->execute([$titulo, $subtitulo, $contenido, $nuevalocacion]);

        if($agregarHistoria->rowCount() >= 1){
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