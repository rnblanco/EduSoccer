<?php
    require("../Db/conexion.php");
    require_once '../Db/sesiones.php';

    $usuario = $_SESSION['usuario'];
    $tipo = $_SESSION['tipo'];
    
    
    if($usuario == null || $usuario = ''){
        header("Location: ../Db/logOut.php");
    }
    else{
        if($tipo==3 | $tipo==2){     
            require_once 'Views/agregar-usuario.view.php';
        }else{
            header("Location: ../Admin/");
        }
    }

    function Tipos($stipo){
        
        switch($stipo){
            case 1: 
                echo " <option value='1' selected='selected'> Escritor </option>
                <option value='2'> Administrador </option>
                <option value='3'> Súper Administrador </option>
                ";
            break;
            case 2:
                echo " <option value='2' selected='selected'> Administrador </option>
                <option value='1'> Escritor </option>
                <option value='3'> Súper Administrador </option>
                ";
            break;
            case 3:
                echo " <option value='3' selected='selected'> Súper Administrador </option>
                <option value='1'> Escritor </option>
                <option value='2'> Administrador </option>
                ";
            break;
            
        }
    }
    
    function CargarForm($tipo){

        if($tipo==3){
            echo "
                <label class='mb-3'>Para proteger la información que ingresa al sitio, se ha bloqueado la función de pegar texto. Además, no es posible introducir los siguientes caracteres '<  >  =  .'</label><br>                            
                <input id='stipo' class='seccion-input' value='"; echo ("{$_SESSION['tipo']}"); echo "'>
                <div class='form-group'> <label class='form-control-label'>Tipo:</label>
                    <select type='text' id='tipo' class='form-control' onblur='validate1(5)'>
                    <option value='1' selected='selected'> Escritor </option>
                    <option value='2'> Administrador </option>
                    <option value='3'> Súper Administrador</option></select>
                </div>
                <div class='form-group'> <label class='form-control-label'>Nombre:</label> <input onkeypress='javascript:return nprotection(event)'' type='text' id='nombre' class='form-control' onblur='validate1(1)'></div>
                <div class='form-group'> <label class='form-control-label'>País:</label> <input onkeypress='javascript:return pprotection(event)'' type='text' id='pais' class='form-control' onblur='validate1(2)'></div>
                <div class='form-group'> <label class='form-control-label'>Nombre de usuario:</label> <input onkeypress='javascript:return eprotection(event)'' type='text' id='email' class='form-control' onblur='validate1(3)'></div>
                <div class='form-group'> <label class='form-control-label'>Contraseña:</label> <input onkeypress='javascript:return cprotection(event)'' type='password' id='pass' class='form-control' onblur='validate1(4)' placeholder='*******'></div>
                <button id='next' class='btn-block btn-primary mt-3 mb-1 next mt-4' type='submit'>AGREGAR<span class='fa fa-long-arrow-right'></span></button>
            ";
        }
        else{
            echo "
                <label class='mb-3'>Para proteger la información que ingresa al sitio, se ha bloqueado la función de pegar texto. Además, no es posible introducir los siguientes caracteres '<  >  =  .'</label><br>                            
                <input id='stipo' class='seccion-input' value='"; echo ("{$_SESSION['tipo']}"); echo "'>
                <div class='form-group'> <label class='form-control-label'>Tipo:</label>
                    <select type='text' id='tipo' class='form-control' onblur='validate1(5)'>
                    <option value='1' selected='selected'> Escritor </option></select>

                </div>
                <div class='form-group'> <label class='form-control-label'>Nombre:</label> <input onkeypress='javascript:return nprotection(event)'' type='text' id='nombre' class='form-control' onblur='validate1(1)'></div>
                <div class='form-group'> <label class='form-control-label'>País:</label> <input onkeypress='javascript:return pprotection(event)'' type='text' id='pais' class='form-control' onblur='validate1(2)'></div>
                <div class='form-group'> <label class='form-control-label'>Nombre de usuario:</label> <input onkeypress='javascript:return eprotection(event)'' type='text' id='email' class='form-control' onblur='validate1(3)'></div>
                <div class='form-group'> <label class='form-control-label'>Contraseña:</label> <input onkeypress='javascript:return cprotection(event)'' type='password' id='pass' class='form-control' onblur='validate1(4)' placeholder='*******'></div>
                <button id='next' class='btn-block btn-primary mt-3 mb-1 next mt-4' type='submit'>AGREGAR<span class='fa fa-long-arrow-right'></span></button>
            ";
        }
        
    }
?>