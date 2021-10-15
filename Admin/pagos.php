<?php
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
	<th>Acciones</th>
    */

    function Pagos(){

        $conexion = conectar();
        $buscarPagos = $conexion->prepare("SELECT * FROM pagos ORDER BY Fecha DESC");
        $buscarPagos->execute();
        $Pagos = $buscarPagos->fetchAll();

        foreach($Pagos as list($idPago, $alumno, $fecha, $cobro)){
	        $cat="Alumno sin categoría asignada";
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
                    <td class='btn-actions'>
                        <a href='editar-pago.php?id=$idPago' class='btn btn-warning btn-icon-split btn-block justify-content-start'><span class='icon text-white-50'><i class='fas fa-edit'></i></span><span class='text'>Editar</span></a><div class='my-2'></div>
                        <a style='color:white' class='btn btn-danger btn-icon-split btn-block justify-content-start' onclick='del($idPago)'><span class='icon text-white-50'><i class='fas fa-trash'></i></span><span class='text'>Borrar</span></a>
                    </td>
                </tr>
            ";
        }
    }  
    
?>