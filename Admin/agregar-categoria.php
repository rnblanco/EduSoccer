<?php
    require_once '../Db/sesiones.php';
    require_once '../Db/conexion.php';
    $usuario = $_SESSION['usuario'];
    if($usuario == null || $usuario = '') header("Location: ../Db/logOut.php");
    else require_once 'Views/agregar-categoria.view.php';

	function Usuarios(){
		$conexion = conectar();
		$buscarUsuarios = $conexion->prepare("SELECT * FROM usuarios ORDER BY ID");
		$buscarUsuarios->execute();
		$Usuarios = $buscarUsuarios->fetchAll();

		foreach($Usuarios as list($id, $usuario, $pass, $nombre, $apellido, $edad, $cargo, $estado)){
			$nombreCompleto = $nombre . " " . $apellido;
			echo" 
                <option value='$id'> $nombreCompleto </option>
            ";
		}
	}
?>


