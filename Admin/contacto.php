<?php
    require_once '../Db/sesiones.php';
    $usuario = $_SESSION['usuario'];
    
    if($usuario == null || $usuario = '') header("Location: ../Db/logOut.php");
    else require_once 'Views/contacto.view.php';


    /* 
    Orden de tabla publicaciones:
    <th>ID</th>
    <th>Titulo</th>
    <th>Contenido</th>
    <th>Imagen</th>
    <th>Acciones</th>
    */

    function Contactos(){
        $stipo = $_SESSION['tipo'];
        $conexion = conectar();
        $buscarServicios = $conexion->prepare("SELECT * FROM contacto ORDER BY ID");
        $buscarServicios->execute();
        $servicios = $buscarServicios->fetchAll();

        foreach($servicios as list($id, $titulo, $contenido, $imagen)){
	        $imagen==""?$imagen="default.png":$imagen;
            echo" 
                <tr>
                    <td>$id</td>
                    <td>$titulo</td>
                    <td>$contenido</td>
                    <td><img class='card-img-top' src='../assets/img/EduSoccer/$imagen' alt='Card image cap' style='height:150px!important;width:200px!important;'></td>    
                    <td class='btn-actions'>
                        <a href='editar-contacto.php?id=$id' class='btn btn-warning btn-block justify-content-start'><span class='icon text-white-50'><i class='fas fa-edit'></i></span><span class='text'>  Editar</span></a><div class='my-2'></div>
                    </td>
                </tr>
            ";
        }
    }  
    
?>