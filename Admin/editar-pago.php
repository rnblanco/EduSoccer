<?php
    require_once '../Db/sesiones.php';
    $id = $_GET["id"];
    $usuario = $_SESSION['usuario'];

	if($usuario == null || $usuario = '') header("Location: ../Db/logOut.php");
	else require_once 'Views/editar-pago.view.php';
    
    function CargarPublicacion(){
        $id = $_GET['id'];
        $conexion = conectar();
        $buscarPago = $conexion->prepare("SELECT * FROM pagos WHERE ID = ? ");
        $buscarPago->execute([$id]);
        $Pago = $buscarPago->fetchAll();

        foreach($Pago as list($id, $alumno, $fecha, $cobro)){
	        $buscarAlumno = $conexion->prepare("SELECT Nombre FROM alumnos WHERE ID = ? ");
	        $buscarAlumno->execute([$alumno]);
	        $Alumno = $buscarAlumno->fetchAll();
			$name = "Alumno no encontrado";
			foreach($Alumno as list($nombre)){ $name = $nombre; }
            echo"
				<input id='ids' class='seccion-input' value='"; echo ("{$_GET['id']}"); echo "'>
				<input id='idAlumno' class='seccion-input' value='"; echo $alumno; echo "'>
				<div class='form-group'> <label class='form-control-label'>Alumno:</label> <input readonly onkeypress='javascript:return nprotection(event)' type='text' id='alumno' class='form-control' onblur='validate1(1)' value='$name'></div>
		        <div class='form-group'> <label class='form-control-label'>Fecha:</label> <input onkeypress='javascript:return pprotection(event)' type='date' id='fecha' class='form-control dateValidation' onblur='validate1(4)' value='$fecha'></div>
		        <div class='form-group'> <label class='form-control-label'>Cobro:</label> <input onkeypress='javascript:return notnumprotection(event)' type='number' id='cobro' class='form-control moneyValidation' onblur='validate1(5)' value='$cobro'></div>
		        <button id='next' class='btn-block btn-primary mt-3 mb-1 next mt-4' type='submit'>EDITAR<span class='fa fa-long-arrow-right'></span></button>
            ";
        }

    }
?>