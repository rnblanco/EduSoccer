<?php
    require("../Db/conexion.php");
    require_once '../Db/sesiones.php';

    $usuario = $_SESSION['usuario'];
    if($usuario == null || $usuario = '' && empty($_GET['id'] && empty($_GET['fecha']))) header("Location: ../Db/logOut.php");
    else require_once 'Views/asistencia.view.php';
    /* 
    Orden de tabla publicaciones:
    <th>ID</th>
    <th>Alumno</th>
    <th>Asistencia</th>
    */

    function Alumnos(){
	    $idCategoria = $_GET["id"];
	    $fecha = $_GET["fecha"];
	    $conexion = conectar();
	    $buscarAsistencias = $conexion->prepare("SELECT * FROM Alumnos WHERE Categoria=:Categoria ");
	    $buscarAsistencias->bindParam(':Categoria',$idCategoria, PDO::PARAM_STR);
	    $buscarAsistencias->execute();
	    $Alumnos = $buscarAsistencias->fetchAll();

	    foreach($Alumnos as list($id, $nombre)){
		    $buscarAsistencias = $conexion->prepare("SELECT Asistencia FROM Asistencia WHERE Fecha=:Fecha AND Alumno=:Alumno ");
		    $buscarAsistencias->bindParam(':Fecha',$fecha, PDO::PARAM_STR);
		    $buscarAsistencias->bindParam(':Alumno',$id, PDO::PARAM_STR);
		    $buscarAsistencias->execute();
		    $asistente = $buscarAsistencias->fetchAll();
			$presente_ausente = "";
			foreach($asistente as list ($asistencia2)){ $presente_ausente = $asistencia2; }
		    $asistencia = $buscarAsistencias->rowCount();
		    echo" 
                <tr>
                    <td>$id</td>
                    <td>$nombre</td>
                    ";
			if($asistencia >=1){
				echo "<td>
						<select type='text' id='asistencia' class='form-control' onchange='ReloadDb()'>
						";
						if($presente_ausente=="Ausente"){
							echo "
								<option value='Presente,$id'>Presente</option>
								<option value='Ausente,$id' selected='selected'>Ausente</option>
							";
						}
						else{
							echo "
								<option value='Presente,$id' selected='selected'>Presente</option>
								<option value='Ausente,$id'>Ausente</option>
							";
						}echo "
						</select>
					</td>";
			}
			else echo "<td>
						<select type='text' id='asistencia' class='form-control' onchange='ReloadDb()'>
							<option>Elegir</option>
							<option value='Presente,$id'>Presente</option>
							<option value='Ausente,$id'>Ausente</option>
						</select>";
		    echo "</tr>";
	    }
    }

?>