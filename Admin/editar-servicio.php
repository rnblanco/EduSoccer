<?php

    require_once '../Db/sesiones.php';
    require("../Db/conexion.php");

    $usuario = $_SESSION['usuario'];
    
    if($usuario == null || $usuario = ''){
        header("Location: ../Db/logOut.php");
    }
    else{
        require_once 'Views/editar-servicio.view.php';
    }
    
    function Cargar(){
        $conexion = conectar();
        $id = $_GET['id'];

            $buscarServicios = $conexion->prepare("SELECT * FROM servicios WHERE ID = ? ");
            $buscarServicios->execute([$id]);
            $Servicios = $buscarServicios->fetchAll();

            foreach($Servicios as list($id, $titulo, $contenido)){
                echo"
                    <input id='ids' class='seccion-input' value='"; echo ("{$_GET['id']}"); echo "'>
                    <div class='form-group'> <label class='form-control-label'>Título:</label> <input onkeypress='javascript:return tprotection(event)'' type='text' id='titulo' class='form-control' onblur='validate1(1)' value='$titulo'></div>
                    <div class='form-group'> <label class='form-control-label'>Contenido:</label> <textarea onkeypress='javascript:return bprotection(event)'' type='text' id='contenido' class='form-control' onblur='validate1(2)'>$contenido</textarea></div>
                    <button id='next' class='btn-block btn-primary mt-3 mb-1 next mt-4' type='submit'>EDITAR<span class='fa fa-long-arrow-right'></span></button>
                ";
            }
    }

?>