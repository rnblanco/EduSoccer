<?php   
    include_once 'sesiones.php';
    $id = $_SESSION['id'];

    $error="";$nacimiento="";$nombre="";$edad="";$ingreso="";$locacion="";$nuevalocacion="";
	$matricula="";$padre=""; $padreTel=""; $madre=""; $madreTel=""; $contacto="";$categoria="";

    if(empty($_POST['nacimiento'])) $error = "falta nacimiento";
    else $nacimiento = $_POST['nacimiento'];

    if(empty($_POST['nombre'])) $error .= "falta nombre";
    else $nombre = $_POST['nombre'];

	if(empty($_POST['edad'])) $error .= "falta edad";
	else $edad = $_POST['edad'];

	if(empty($_POST['ingreso'])) $error .= "falta ingreso";
	else $ingreso = $_POST['ingreso'];

	if(empty($_POST['matricula'])) $error .= "falta matricula";
	else $matricula = $_POST['matricula'];

	if(empty($_POST['padre'])) $error .= "falta padre";
	else $padre = $_POST['padre'];

	if(empty($_POST['padreTel'])) $error .= "falta padreTel";
	else $padreTel = $_POST['padreTel'];

	if(empty($_POST['madre'])) $error .= "falta madre";
	else $madre = $_POST['madre'];

	if(empty($_POST['madreTel'])) $error .= "falta madreTel";
	else $madreTel = $_POST['madreTel'];

	if(empty($_POST['contacto'])) $error .= "falta contacto";
	else $contacto = $_POST['contacto'];

	if(empty($_POST['categoria'])) $error .= "falta categoria";
	else $categoria = $_POST['categoria'];

    if( $_FILES['img'] ){
	    $locacion = '../assets/img/EduSoccer/Alumnos/' . $_FILES['img']['name'];
        $nuevalocacion = $_FILES['img']['name'];
    }
    else $error .= "falta img";
    
    if( $edad!=="" && $nacimiento!=="" && $nombre!=="" && $ingreso!=="" && $matricula!="" && $contacto!="" && $categoria!=""){
        $conexion = conectar();
        $agregarAlumno = $conexion->prepare('INSERT INTO alumnos (nombre, edad, fecha_nacimiento, fecha_ingreso, fecha_matricula, 
                     Imagen, nombre_padre, telefono_padre, nombre_madre, telefono_madre, contacto, categoria) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)');
        $agregarAlumno->execute([$nombre, $edad, $nacimiento, $ingreso, $matricula, $nuevalocacion, $padre, $padreTel, $madre, $madreTel, $contacto, $categoria]);

        if($agregarAlumno->rowCount() >= 1){
	        If($nuevalocacion!="") move_uploaded_file($_FILES['img']['tmp_name'], $locacion);
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