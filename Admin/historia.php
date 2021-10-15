<?php
    require_once '../Db/sesiones.php';
    $usuario = $_SESSION['usuario'];

    if($usuario == null || $usuario = '') header("Location: ../Db/logOut.php");
    else require_once 'Views/historia.view.php';

    /* 
    Orden de tabla publicaciones:
    <th>ID</th>
	<th>Titulo</th>
	<th>Fecha</th>
	<th>Contenido</th>
	<th>Imagen</th>
	<th>Acciones</th>
    */

    function Historias(){
	    $conexion = conectar();
	    $buscarHistoria = $conexion->prepare("SELECT * FROM historia ORDER BY ID");
	    $buscarHistoria->execute();
	    $Historia = $buscarHistoria->fetchAll();

	    foreach($Historia as list($id, $titulo, $subtitulo, $contenido, $imagen)){
		    $imagen==""?$imagen="default.png":$imagen;
		    if( strlen($contenido) >=300 ){
			    $contenido = substr($contenido, 0, 200); $contenido .= "...";
		    }

		    echo" 
                <tr>
                    <td>$id</td>
                    <td>$titulo</td>
                    <td>$subtitulo</td>
                    <td>$contenido</td>
                    <td><img class='card-img-top' src='../assets/img/EduSoccer/$imagen' alt='Card image cap' style='height:150px!important;width:200px!important;'></td>            
                    <td class='btn-actions'>
                        <a href='editar-historia.php?id=$id' class='btn btn-warning btn-icon-split btn-block justify-content-start'>
                        	<span class='icon text-white-50'>
                        		<i class='fas fa-edit'></i>
                            </span>
                            <span class='text'>Editar</span>
                        </a>
                        <div class='my-2'></div>
                        <a style='color:white' class='btn btn-danger btn-icon-split btn-block justify-content-start' onclick='del($id)'>
	                        <span class='icon text-white-50'>
	                        	<i class='fas fa-trash'></i>
	                        </span>
	                        <span class='text'>Borrar</span>
                        </a>
                    </td>
                </tr>
            ";
	    }
    }  
    
?>