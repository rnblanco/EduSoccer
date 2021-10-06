<?php   
    include_once 'sesiones.php';
    require("conexion.php");
    $id = $_SESSION['id'];

    $error="";$alumno="";$fecha="";$ano="";$cobro="";

    if(empty($_POST['alumno'])) $error = "falta alumno";
    else $alumno = $_POST['alumno'];

    if(empty($_POST['fecha'])) $error .= "falta fecha";
    else $fecha = $_POST['fecha'];

	if(empty($_POST['cobro'])) $error .= "falta cobro";
	else $cobro = $_POST['cobro'];

    
    if( $alumno!=="" && $fecha!=="" && $cobro!=="" ) {
        $conexion = conectar();
        $agregarPago = $conexion->prepare('INSERT INTO Pagos (fecha, alumno, cobro) VALUES (?,?,?)');
        $agregarPago->execute([$fecha, $alumno, $cobro]);

        if($agregarPago->rowCount() >= 1)echo json_encode(['code'=>200]);
        else {
            echo json_encode(['code'=>404]);
            echo $error;
        }
    }

    else{
        echo json_encode(['code'=>400]);
        echo $error;
    }
?>