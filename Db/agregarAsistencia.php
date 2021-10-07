<?php   
    include_once 'sesiones.php';
    require("conexion.php");
    $id = $_SESSION['id'];

    $error="";$fecha="";$alumno="";$asistencia="";

    if(empty($_POST['fecha'])) $error = "falta fecha";
    else $fecha = $_POST['fecha'];

    if(empty($_POST['alumno'])) $error .= "falta alumno";
    else $alumno = $_POST['alumno'];

	if(empty($_POST['asistencia'])) $error .= "falta asistencia";
	else $asistencia = $_POST['asistencia'];

    
    if( $asistencia!=="" && $fecha!=="" && $alumno!=="" ) {
        $conexion = conectar();

	    $buscarAsistencias = $conexion->prepare("SELECT Asistencia FROM asistencia WHERE Fecha=:Fecha AND Alumno=:Alumno");
	    $buscarAsistencias->bindParam(':Fecha',$fecha, PDO::PARAM_STR);
	    $buscarAsistencias->bindParam(':Alumno',$alumno, PDO::PARAM_STR);
	    $buscarAsistencias->execute();

		if($buscarAsistencias->rowCount()>=1){
			$editarAsistencias = $conexion->prepare("UPDATE asistencia SET Asistencia=:Asistencia WHERE Fecha=:Fecha AND Alumno=:Alumno");
			$editarAsistencias->bindParam(':Fecha',$fecha, PDO::PARAM_STR);
			$editarAsistencias->bindParam(':Alumno',$alumno, PDO::PARAM_STR);
			$editarAsistencias->bindParam(':Asistencia',$asistencia, PDO::PARAM_STR);
			$editarAsistencias->execute();
			if($editarAsistencias->rowCount() >= 1) echo json_encode(['code'=>200]);
			else {
				echo json_encode(['code'=>404]);
				echo $error;
			}
		}
	    else{
		    $agregarHistoria = $conexion->prepare('INSERT INTO asistencia (Fecha, Alumno, Asistencia) VALUES (?,?,?)');
		    $agregarHistoria->execute([$fecha, $alumno, $asistencia]);
		    if($agregarHistoria->rowCount() >= 1) echo json_encode(['code'=>200]);
		    else {
			    echo json_encode(['code'=>404]);
			    echo $error;
		    }
	    }
    }
    else{
        echo json_encode(['code'=>400]);
        echo $error;
    }
?>