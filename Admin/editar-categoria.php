<?php
    require_once '../Db/sesiones.php';
    require("../Db/conexion.php");
    $usuario = $_SESSION['usuario'];
    if($usuario == null || $usuario = '') header("Location: ../Db/logOut.php");
    else require_once 'Views/editar-Categoria.view.php';

    function Cargar(){
        $conexion = conectar();
        $id = $_GET['id'];

            $buscarCategoria = $conexion->prepare("SELECT * FROM Categorias WHERE ID = ? ");
            $buscarCategoria->execute([$id]);
            $Categoria = $buscarCategoria->fetchAll();

            foreach($Categoria as list($idCategorial, $titulo, $subtitulo, $contenido, $profesor, $imagen)){

                $imagen==""?$imagen="./Images/DefaultImages/imagen_no_disponible.png":$imagen;
                $imagen2 = $imagen;
                $imagen2 = explode("/", $imagen2);

                echo"
                    <input id='ids' class='seccion-input' value='"; echo ("{$_GET['id']}"); echo "'>
                    <div class='form-group'> <label class='form-control-label'>Imagen * :</label> <br><img src='../assets/img/EduSoccer/$imagen' id='preview' class='img-thumbnail' style='height:250px!important;width:300px!important;'><br><div id='msg'></div><input type='file' name='img' id='img' class='file' accept='image/*' onblur='validate1(3)'><div class='input-group my-3'><input type='text' class='form-control' disabled id='file'><div class='input-group-append'><button type='button' class='browse btn btn-primary'>Subir</button></div></div></div> 
                    <div class='form-group'> <label class='form-control-label'>Título:</label> <input onkeypress='javascript:return tprotection(event)'' type='text' id='titulo' class='form-control' onblur='validate1(1)' value='$titulo'></div>
                    <div class='form-group'> <label class='form-control-label'>Subtítulo:</label> <input onkeypress='javascript:return notnumprotection(event)'' type='text' id='subtitulo' class='form-control' onblur='validate1(5)' value='$subtitulo'></div>
                    <div class='form-group'> <label class='form-control-label'>Profesor:</label> <input onkeypress='javascript:return tprotection(event)'' type='text' id='profesor' class='form-control' onblur='validate1(6)' value='$profesor'></div>
                    <div class='form-group'> <label class='form-control-label'>Contenido:</label> <textarea onkeypress='javascript:return bprotection(event)'' type='text' id='contenido' class='form-control' onblur='validate1(2)'>$contenido</textarea></div>
                    <button id='next' class='btn-block btn-primary mt-3 mb-1 next mt-4' type='submit'>EDITAR<span class='fa fa-long-arrow-right'></span></button>
                ";
            }
    }
?>