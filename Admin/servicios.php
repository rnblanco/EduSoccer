<?php
	require("../Db/conexion.php");
    require_once '../Db/sesiones.php';

    $usuario = $_SESSION['usuario'];
    
    if($usuario == null || $usuario = '') header("Location: ../Db/logOut.php");
    else require_once 'Views/servicios.view.php';


    /* 
    Orden de tabla publicaciones:
    <th>ID</th>
    <th>Titulo</th>
    <th>Contenido</th>
    <th>Acciones</th>
    */

    function Servicios(){
        $stipo = $_SESSION['tipo'];
        $conexion = conectar();
        $buscarServicios = $conexion->prepare("SELECT * FROM servicios ORDER BY ID");
        $buscarServicios->execute();
        $servicios = $buscarServicios->fetchAll();

        foreach($servicios as list($id, $titulo, $contenido)){
            echo" 
                <tr>
                    <td>$id</td>
                    <td>$titulo</td>
                    <td>$contenido</td>
                    <td>
                        <a href='editar-servicio.php?id=$id' class='btn btn-warning btn-block'><span class='icon text-white-50'><i class='fas fa-edit'></i></span><span class='text'>  Editar</span></a><div class='my-2'></div>
                    </td>
                </tr>
            ";
        }
    }  
    
?>