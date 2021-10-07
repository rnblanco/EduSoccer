<?php
    require("../Db/conexion.php");
    require_once '../Db/sesiones.php';

    $id = $_GET["id"];
    $usuario = $_SESSION['usuario'];
    $tipo = $_SESSION['tipo'];

    if($usuario == null || $usuario = '') header("Location: ../Db/logOut.php");
    else{
        if($id == null || $id = '') header("Location: ../Admin/");
        else{
            $conexion = conectar();
            $verificarId = $conexion->query("SELECT COUNT(*) FROM usuarios WHERE ID = '$id' ");
            $verificarId->execute();
            $rows=$verificarId->fetchAll();

            if($rows){
                if($tipo==2) require_once 'Views/editar-usuario.view.php';
                else header("Location: ../Admin/");
            }
            else header("Location: ../Admin/");
        }
        
    }
    
    function CargarPublicacion(){
        $id = $_GET['id'];
        $conexion = conectar();
        $buscarUsuario = $conexion->prepare("SELECT * FROM usuarios WHERE ID = ? ");
        $buscarUsuario->execute([$id]);
        $Usuario = $buscarUsuario->fetchAll();

        foreach($Usuario as list($id, $usuario, $pass, $nombre, $apellido, $edad, $cargo, $estado)){
            echo"
				<input id='ids' class='seccion-input' value='"; echo $id; echo "'>
				<input id='estado' class='seccion-input' value='"; echo $estado; echo "'>
				<input id='cargo' class='seccion-input' value='"; echo $cargo; echo "'>
                <input id='password' class='seccion-input' value='"; echo $pass; echo "'>
				<div class='form-group'> <label class='form-control-label'>Nombre:</label> <input onkeypress='javascript:return nprotection(event)'' type='text' id='nombre' class='form-control' onblur='validate1(1)' value='$nombre'></div>
		        <div class='form-group'> <label class='form-control-label'>Apellido:</label> <input onkeypress='javascript:return pprotection(event)'' type='text' id='apellido' class='form-control' onblur='validate1(2)' value='$apellido'></div>
		        <div class='form-group'> <label class='form-control-label'>Edad:</label> <input onkeypress='javascript:return notnumprotection(event)'' type='number' id='edad' class='form-control ageValidation' onblur='validate1(5)' value='$edad'></div>
		        <div class='form-group'> <label class='form-control-label'>Nombre de usuario:</label> <input onkeypress='javascript:return eprotection(event)'' type='text' id='usuario' class='form-control' onblur='validate1(3)' value='$usuario'></div>
		        <div class='form-group'>
			        <div class='form-check'>
					  <input class='form-check-input' type='checkbox' onchange='showPassword()' value='' id='flexCheckDefault'>
					  <label class='form-check-label' for='flexCheckDefault'>
					    Cambiar contraseña
					  </label>
					</div>
				</div>
		        <div class='form-group seccion-input' id='password-div'> <label class='form-control-label'>Contraseña:</label> <input onkeypress='javascript:return cprotection(event)'' type='password' id='pass' class='form-control' onblur='validate1(4)' placeholder='*******'></div>
		        <button id='next' class='btn-block btn-primary mt-3 mb-1 next mt-4' type='submit'>EDITAR<span class='fa fa-long-arrow-right'></span></button>
            ";
        }

    }
?>