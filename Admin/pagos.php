<?php
	require("../Db/conexion.php");
    require_once '../Db/sesiones.php';

    $usuario = $_SESSION['usuario'];
    
    if($usuario == null || $usuario = '') header("Location: ../Db/logOut.php");
    else require_once 'Views/pagos.view.php';


    /* 
    Orden de tabla publicaciones:
   <th>ID</th>
	<th>Alumno</th>
	<th>Mes</th>
	<th>Año</th>
	<th>Cobro</th>
    */

    function Pagos(){
        $conexion = conectar();
        $buscarPagos = $conexion->prepare("SELECT * FROM pagos ORDER BY Fecha DESC");
        $buscarPagos->execute();
        $Pagos = $buscarPagos->fetchAll();

        foreach($Pagos as list($id, $alumno, $fecha, $cobro)){

	        $conexion = conectar();
	        $buscarUsuarios = $conexion->prepare("SELECT * FROM alumnos WHERE ID=:ID");
	        $buscarUsuarios->bindParam(':ID', $alumno, PDO::PARAM_STR);
	        $buscarUsuarios->execute();
	        $Usuarios = $buscarUsuarios->fetchAll();
	        foreach($Usuarios as list($id2, $nombre)){ $alumno = $nombre; }

            echo" 
                <tr>
                    <td>$fecha</td>
                    <td>$alumno</td>
                    <td>$$cobro</td>
                </tr>
            ";
        }
    }  
    
?>