<?php
    require_once '../Db/sesiones.php';
    $usuario = $_SESSION['usuario'];

    if($usuario == null || $usuario = '') header("Location: ../Db/logOut.php");
    else require_once 'Views/agregar-alumno.view.php';

	function Categorias(){
		$conexion = conectar();
		$buscarCategorias = $conexion->prepare("SELECT * FROM categorias");
		$buscarCategorias->execute();
		$Categorias = $buscarCategorias->fetchAll();
		foreach($Categorias as list($id2, $titulo2, $subtitulo2, $contenido2, $profesor2, $imagen2)){ echo" <option value='$id2'> $titulo2 </option>"; }
	}
?>