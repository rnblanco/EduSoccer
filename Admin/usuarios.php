<?php
    require("../Db/conexion.php");
    require_once '../Db/sesiones.php';

    $usuario = $_SESSION['usuario'];
    if($usuario == null || $usuario = '') header("Location: ../Db/logOut.php");
    else require_once 'Views/usuarios.view.php';

    /* 
    Orden de tabla publicaciones:
      <th>ID</th>
	  <th>Nombre</th>
	  <th>Usuario</th>
	  <th>Apellido</th>
	  <th>Edad</th>
	  <th>Cargo</th>
	  <th>Estado</th>
	  <th>Acciones</th>
    */

    function Usuarios(){
        $ids = $_SESSION['id'];
        $stipo = $_SESSION['tipo'];
        $conexion = conectar();
        $buscarUsuarios = $conexion->prepare("SELECT * FROM usuarios ORDER BY ID");
        $buscarUsuarios->execute();
        $Usuarios = $buscarUsuarios->fetchAll();

        foreach($Usuarios as list($id, $usuario, $pass, $nombre, $apellido, $edad, $cargo, $estado)){
			if($id != $ids){
				echo" 
                <tr>
                    <td>$id</td>
                    <td>$nombre</td>
                    <td>$usuario</td>
                    <td>$apellido</td>
                    <td>$edad</td>
                    <td>";
				if($cargo==2){
					echo "Administrador";
				}
				else if($cargo==1){
					echo "Profesor";
				}
				echo "</td>";
				if($estado==2){
					echo"<td>
                        Deshabilitado<br>
                        <a onclick='hab($id)' style='color:white!important' class='btn btn-success btn-icon-split'>
                            <span class='icon text-white-50'>
                            <i class='fas fa-check'></i>
                            </span>
                            <span class='text'>Habilitar</span>
                        </a>
                        </td>";
				}
				else if($estado==1){
					echo"<td class='btn-actions'>
                        Habilitado<br>
                        <a onclick='deshab($id)' style='color:white!important' class='btn btn-secondary btn-icon-split'>
                            <span class='icon text-white-50'>
                            <i class='fas fa-times'></i>
                            </span>
                            <span class='text'>Deshabilitar</span>
                        </a>
                        </td>";
				}
				echo"
                    <td class='btn-actions'>
                        <a href='editar-usuario.php?id=$id' class='btn btn-warning btn-icon-split btn-block'><span class='icon text-white-50'><i class='fas fa-edit'></i></span><span class='text'>Editar</span></a><div class='my-2'></div>
                        <a style='color:white' class='btn btn-danger btn-icon-split btn-block' onclick='del($id,$stipo)'><span class='icon text-white-50'><i class='fas fa-trash'></i></span><span class='text'>Borrar</span></a>
                    </td>
                </tr>
            ";
			}
        }
    }  
    
?>