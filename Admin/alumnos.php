<?php
    require("../Db/conexion.php");
    require_once '../Db/sesiones.php';

    $usuario = $_SESSION['usuario'];
    if($usuario == null || $usuario = '') header("Location: ../Db/logOut.php");
    else require_once 'Views/Alumnos.view.php';

    /* 
    Orden de tabla publicaciones:
    <th>ID</th>
    <th>Nombre</th>
    <th>Edad</th>
    <th>Fecha de nacimiento</th>
    <th>Fecha de ingreso</th>
    <th>Fecha de matrícula</th>
    <th>Imagen</th>
    <th>Nombre padre</th>
    <th>Teléfono</th>
    <th>Nombre madre</th>
    <th>Teléfono</th>
    <th>Contacto</th>
    */

    function Alumnos(){
	    $conexion = conectar();
	    $buscarAlumnos = $conexion->prepare("SELECT * FROM Alumnos ORDER BY ID");
	    $buscarAlumnos->execute();
	    $Alumnos = $buscarAlumnos->fetchAll();

	    foreach($Alumnos as list($id, $nombre, $edad, $nacimiento, $ingreso, $matricula, $imagen, $padre, $padreTel, $madre, $madreTel, $contacto)){
		    $imagen==""?$imagen="default_user.png":$imagen;
			$padre = $padre!='null'? $padre : '-';
			$padreTel = $padreTel!='null'? $padreTel : '-';
			$madre = $madre!='null'? $madre : '-';
		    $madreTel = $madreTel!='null'? $madreTel : '-';
		    echo" 
                <tr>
                    <td>$id</td>
                    <td>$nombre</td>
                    <td>$edad</td>
                    <td>$nacimiento</td>
                    <td>$ingreso</td>
                    <td>$matricula</td>
                    <td>$padre</td>
                    <td>$padreTel</td>
                    <td>$madre</td>
                    <td>$madreTel</td>
                    <td>$contacto</td>
                    <td><img class='card-img-top' src='../assets/img/EduSoccer/Alumnos/$imagen' alt='Card image cap' style='height:100px!important;width:150px!important;'></td>            
                    <td>
                        <a href='editar-categoria.php?id=$id' class='btn btn-warning btn-icon-split btn-block'><span class='icon text-white-50'><i class='fas fa-edit'></i></span><span class='text'>Editar</span></a><div class='my-2'></div>
                        <a style='color:white' class='btn btn-danger btn-icon-split btn-block' onclick='del($id)'><span class='icon text-white-50'><i class='fas fa-trash'></i></span><span class='text'>Borrar</span></a>
                    </td>
                </tr>
            ";
	    }
    }  
    
?>