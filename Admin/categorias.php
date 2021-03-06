<?php
    require_once '../Db/sesiones.php';
    $usuario = $_SESSION['usuario'];

    if($usuario == null || $usuario = '') header("Location: ../Db/logOut.php");
    else require_once 'Views/categorias.view.php';

    /* 
    Orden de tabla publicaciones:
    <th>ID</th>
    <th>Titulo</th>
    <th>Subtitulo</th>
    <th>Contenido</th>
    <th>Profesor</th>
    <th>Imagen</th>
    <th>Acciones</th>
    */

    function Categorias(){
	    $conexion = conectar();
	    $buscarCategorias = $conexion->prepare("SELECT * FROM categorias ORDER BY ID");
	    $buscarCategorias->execute();
	    $Categorias = $buscarCategorias->fetchAll();

	    foreach($Categorias as list($id, $titulo, $subtitulo, $contenido, $profesor, $imagen)){

		    $buscarUsuarios = $conexion->prepare("SELECT * FROM usuarios WHERE ID=:ID");
		    $buscarUsuarios->bindParam(':ID', $profesor, PDO::PARAM_STR);
		    $buscarUsuarios->execute();
		    $Usuarios = $buscarUsuarios->fetchAll();
			if($buscarUsuarios->rowCount()>=1){
				foreach($Usuarios as list($id2, $usuario2, $pass2, $nombre2, $apellido2, $edad2, $cargo2, $estado2)){ $profesor = $nombre2 . " " . $apellido2; }
			}
		    else $profesor = "Categoría sin profesor asignado";

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
                    <td>$profesor</td>
                    <td><img class='card-img-top' src='../assets/img/EduSoccer/$imagen' alt='Card image cap' style='height:150px!important;width:200px!important;'></td>            
                    <td class='btn-actions'>
                        <a href='editar-categoria.php?id=$id' class='btn btn-warning btn-icon-split btn-block justify-content-start'><span class='icon text-white-50'><i class='fas fa-edit'></i></span><span class='text'>Editar</span></a><div class='my-2'></div>
                        <a style='color:white' class='btn btn-danger btn-icon-split btn-block justify-content-start' onclick='del($id)'><span class='icon text-white-50'><i class='fas fa-trash'></i></span><span class='text'>Borrar</span></a>
                    </td>
                </tr>
            ";
	    }
    }  
    
?>