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
	        $cat="Categoría inexistente";
	        $conexion = conectar();
	        $buscarAlumnos = $conexion->prepare("SELECT * FROM alumnos WHERE ID=:ID");
	        $buscarAlumnos->bindParam('ID', $alumno, PDO::PARAM_STR);
	        $buscarAlumnos->execute();
	        $Alumnos = $buscarAlumnos->fetchAll();

	        foreach($Alumnos as list ($id, $nombre, $edad, $nacimiento, $ingreso, $matricula, $imagen, $padre, $padreTel, $madre, $madreTel, $contacto, $categoria)){
				$alumno = $nombre;
		        $buscarCategoria = $conexion->prepare("SELECT * FROM categorias WHERE ID=:ID");
		        $buscarCategoria->bindParam('ID', $categoria, PDO::PARAM_STR);
		        $buscarCategoria->execute();
		        $Categorias = $buscarCategoria->fetchAll();
				foreach($Categorias as list($id, $cate)){
					$cat = $cate;
				}
			}

            echo" 
                <tr>
                    <td>$fecha</td>
                    <td>$cat</td>
                    <td>$alumno</td>
                    <td>$$cobro</td>
                </tr>
            ";
        }
    }  
    
?>