<?php
    require_once '../Db/sesiones.php';
    $usuario = $_SESSION['usuario'];

    if($usuario == null || $usuario = '') header("Location: ../Db/logOut.php");
    else require_once 'Views/agregar-pago.view.php';

	function Alumnos(){
		$conexion = conectar();
		$buscarAlumnos = $conexion->prepare("SELECT * FROM alumnos ORDER BY ID");
		$buscarAlumnos->execute();
		$Alumnos = $buscarAlumnos->fetchAll();

		foreach($Alumnos as list($id, $nombre)){
			echo" <option value='$id'> $nombre </option> ";
		}
	}
?>


