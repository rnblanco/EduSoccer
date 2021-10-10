<?php
    require_once '../Db/sesiones.php';
	require("../Db/conexion.php");
    $usuario = $_SESSION['usuario'];
    if($usuario == null || $usuario = '') header("Location: ../Db/logOut.php");
    else require_once 'Views/editar-alumno.view.php';

	function Cargar(){
		$conexion = conectar();
		$id = $_GET['id'];

		$buscarAlumnos = $conexion->prepare("SELECT * FROM alumnos WHERE ID = ? ");
		$buscarAlumnos->execute([$id]);
		$Alumnos = $buscarAlumnos->fetchAll();

		foreach($Alumnos as list($id, $nombre, $edad, $nacimiento, $ingreso, $matricula, $imagen, $padre, $padreTel, $madre, $madreTel, $contacto, $categoria)){

			$padre = $padre!='null'? $padre : '';
			$padreTel = $padreTel!='null'? $padreTel : '';
			$madre = $madre!='null'? $madre : '';
			$madreTel = $madreTel!='null'? $madreTel : '';

			echo"
				<input id='ids' class='seccion-input' value='"; echo ("{$_GET['id']}"); echo "'>
				<input id='imagen' class='seccion-input' value='"; echo $imagen; echo "'>
				<div class='form-group'> <label class='form-control-label'>Foto:</label> <br><img src='../assets/img/EduSoccer/Alumnos/$imagen' id='preview' class='img-thumbnail' style='height:250px!important;width:300px!important;'><br><div id='msg'></div><input type='file' name='img' id='img' class='file' accept='image/*' onblur='validate1(3)'><div class='input-group my-3'><input type='text' class='form-control' disabled placeholder='Subir imagen' id='file'><div class='input-group-append'><button type='button' class='browse btn btn-primary'>Subir</button></div></div></div>
                <div class='form-group'> <label class='form-control-label'>Nombre * :</label> <input value='$nombre' onkeypress='javascript:return tprotection(event)' type='text' id='nombre' class='form-control' onblur='validate1(1)'></div>
                <div class='form-group'> <label class='form-control-label'>Edad * :</label> <input value='$edad' onkeypress='javascript:return bprotection(event)' type='number' id='edad' class='form-control ageValidation' onblur='validate1(4)'></div>
                <div class='form-group'> <label class='form-control-label'>Nacimiento * :</label> <input value='$nacimiento' onkeypress='javascript:return bprotection(event)' type='date' id='nacimiento' class='form-control dateValidation' onblur='validate1(2)'></div>
                <div class='form-group'> <label class='form-control-label'>Padre:</label> <input value='$padre' onkeypress='javascript:return tprotection(event)' type='text' id='padre' class='form-control' onblur='validate1(5)'></input></div>
                <div class='form-group'> <label class='form-control-label'>Teléfono:</label> <input value='$padreTel' onkeypress='javascript:return bprotection(event)' type='number' id='padreTel' class='form-control phoneValidation' onblur='validate1(6)'></input></div>
			    <div class='form-group'> <label class='form-control-label'>Madre:</label> <input value='$madre' onkeypress='javascript:return tprotection(event)' type='text' id='madre' class='form-control' onblur='validate1(7)'></input></div>
                <div class='form-group'> <label class='form-control-label'>Teléfono:</label> <input value='$madreTel' onkeypress='javascript:return bprotection(event)' type='number' id='madreTel' class='form-control phoneValidation' onblur='validate1(8)'></input></div>
                <div class='form-group'> <label class='form-control-label'>Contacto * :</label> <input value='$contacto' onkeypress='javascript:return bprotection(event)' type='number' id='contacto' class='form-control phoneValidation' onblur='validate1(9)'></input></div>
                <div class='form-group'> <label class='form-control-label'>Categoría:</label>
                    <select type='text' id='categoria' class='form-control' onblur='validate1(10)'>";Categorias($categoria);echo"</select>
				</div>
				<button id='next' class='btn-block btn-primary mt-3 mb-1 next mt-4' type='submit'>EDITAR<span class='fa fa-long-arrow-right'></span></button>
            ";
		}
	}
	function Categorias($id){
		$conexion = conectar();
		$buscarCategorias = $conexion->prepare("SELECT * FROM Categorias ORDER BY ID");
		$buscarCategorias->execute();
		$Categorias = $buscarCategorias->fetchAll();

		foreach($Categorias as list($id2, $titulo2, $subtitulo2, $contenido2, $profesor2, $imagen2)){
			if($id==$id2) echo" <option value='$id2' selected='selected'> $titulo2 </option>";
			else echo" <option value='$id2'> $titulo2 </option>";
		}
	}
?>

