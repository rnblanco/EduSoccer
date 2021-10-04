<?php   
    include_once 'sesiones.php';
    require("conexion.php");

    $edad="";$nombre="";$locacion="";$id="";$error=""; $nacimiento="";$padre="";$padreTel="";$madre="";$madreTel="";$contacto="";$categoria="";
    $nuevalocacion="";

    if(empty($_POST['edad'])) $error = "falta edad";
    else $edad = $_POST['edad'];

	if(empty($_POST['nacimiento'])) $error .= "falta nacimiento";
	else $nacimiento = $_POST['nacimiento'];

    if(empty($_POST['nombre'])) $error .= "falta nombre";
    else $nombre = $_POST['nombre'];

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

    if(empty($_POST['id'])) $error .= "falta id";
    else $id = $_POST['id'];

    if( $_FILES['img'] ) $locacion="hay imagen";
    else $error .= "falta img";

	if(empty($_POST['categoria'])) $error .= "falta categoria";
	else $categoria = $_POST['categoria'];

    //con imagen
    if( $edad!=="" && $nombre!=="" && $nacimiento!=="" && $id!=="" && $padre!=="" && $padreTel!=="" && $madre!=="" && $madreTel!=="" && $contacto!=="" && $categoria!=""){
        
        $conexion = conectar();
        $AlumnoActual  = $conexion ->prepare ("SELECT * from Alumnos WHERE ID = :id ");
        $AlumnoActual->bindParam(':id', $id, PDO::PARAM_STR);
        $AlumnoActual->execute();
        foreach($AlumnoActual as list($anombre, $aedad, $anacimiento, $apadre, $apadreTel, $amadre, $amadreTel, $acontacto, $acategoria)){

                $imagenes = $conexion ->prepare("SELECT imagen from Alumnos WHERE ID = :id ");
                $imagenes->bindParam(':id', $id, PDO::PARAM_STR);
                $imagenes->execute();

                foreach($imagenes as list($imagen)){
	                if($imagen !="" && $imagen!=NULL && $imagen!="null"){
						if($_FILES['img']['name']){
							$locacion = '../assets/img/EduSoccer/Alumnos/' . $imagen;
							$success = unlink($locacion);
							move_uploaded_file($_FILES['img']['tmp_name'], $locacion);
						}
		                else $success = true;
						if($success)http_response_code(200);
						else http_response_code(500);
	                }
					else{
						$imagen = $_FILES['img']['name'];
						$locacion = '../assets/img/EduSoccer/Alumnos/' . $imagen;
						move_uploaded_file($_FILES['img']['tmp_name'], $locacion);
						$editarAlumno = $conexion->prepare(" UPDATE Alumnos SET Edad=:Edad, Nombre=:Nombre, Fecha_Nacimiento=:Fecha_Nacimiento, 
						Nombre_Padre=:Nombre_Padre, Telefono_Padre=:Telefono_Padre, Nombre_Madre=:Nombre_Madre, Telefono_Madre=:Telefono_Madre,
                    	Contacto=:Contacto, Imagen=:Imagen, Categoria=:Categoria WHERE ID=:ID ");
						$editarAlumno->bindParam(':Edad', $edad, PDO::PARAM_STR);
						$editarAlumno->bindParam(':Nombre', $nombre, PDO::PARAM_STR);
						$editarAlumno->bindParam(':Fecha_Nacimiento', $nacimiento, PDO::PARAM_STR);
						$editarAlumno->bindParam(':Nombre_Padre', $padre, PDO::PARAM_STR);
						$editarAlumno->bindParam(':Telefono_Padre', $padreTel, PDO::PARAM_STR);
						$editarAlumno->bindParam(':Nombre_Madre', $madre, PDO::PARAM_STR);
						$editarAlumno->bindParam(':Telefono_Madre', $madreTel, PDO::PARAM_STR);
						$editarAlumno->bindParam(':Contacto', $contacto, PDO::PARAM_STR);
						$editarAlumno->bindParam(':Imagen', $imagen, PDO::PARAM_STR);
						$editarAlumno->bindParam(':Categoria', $categoria, PDO::PARAM_STR);
						$editarAlumno->bindParam(':ID', $id, PDO::PARAM_STR);
						$editarAlumno->execute();

						if($editarAlumno->rowCount() >= 1){
							echo $editarAlumno->execute();
							http_response_code(200);
						}else{
							echo $editarAlumno->execute();
							echo $imagen;
							http_response_code(500);
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