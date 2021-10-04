<?php
    require("../Db/conexion.php");
    require_once '../Db/sesiones.php';

    $usuario = $_SESSION['usuario'];
    $tipo = $_SESSION['tipo'];
    
    if($usuario == null || $usuario = '') header("Location: ../Db/logOut.php");
    else{
        if($tipo==2) require_once 'Views/agregar-usuario.view.php';
        else header("Location: ../Admin/");
    }
    
    function CargarForm(){

	    echo "
	        <label class='mb-3'>Para proteger la información que ingresa al sitio, se ha bloqueado la función de pegar texto. Además, no es posible introducir los siguientes caracteres '<  >  =  .'</label><br>                            
	        <div class='form-group'> <label class='form-control-label'>Nombre:</label> <input onkeypress='javascript:return nprotection(event)'' type='text' id='nombre' class='form-control' onblur='validate1(1)'></div>
	        <div class='form-group'> <label class='form-control-label'>Apellido:</label> <input onkeypress='javascript:return pprotection(event)'' type='text' id='apellido' class='form-control' onblur='validate1(2)'></div>
	        <div class='form-group'> <label class='form-control-label'>Edad:</label> <input onkeypress='javascript:return notnumprotection(event)'' type='number' id='edad' class='form-control ageValidation' onblur='validate1(5)'></div>
	        <div class='form-group'> <label class='form-control-label'>Nombre de usuario:</label> <input onkeypress='javascript:return eprotection(event)'' type='text' id='usuario' class='form-control' onblur='validate1(3)'></div>
	        <div class='form-group'> <label class='form-control-label'>Contraseña:</label> <input onkeypress='javascript:return cprotection(event)'' type='password' id='pass' class='form-control' onblur='validate1(4)' placeholder='*******'></div>
	        <button id='next' class='btn-block btn-primary mt-3 mb-1 next mt-4' type='submit'>AGREGAR<span class='fa fa-long-arrow-right'></span></button>
	    ";
    }
?>