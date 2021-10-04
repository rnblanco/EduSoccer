<?php   
    include_once 'sesiones.php';
    require("conexion.php");
    $id = $_SESSION['id'];

    $error="";$alumno="";$mes="";$ano="";$cobro="";

    if(empty($_POST['alumno'])) $error = "falta alumno";
    else $alumno = $_POST['alumno'];

    if(empty($_POST['mes'])) $error .= "falta mes";
    else $mes = $_POST['mes'];

	if(empty($_POST['ano'])) $error .= "falta ano";
	else $ano = $_POST['ano'];

	if(empty($_POST['cobro'])) $error .= "falta cobro";
	else $cobro = $_POST['cobro'];

    
    if( $ano!=="" && $alumno!=="" && $mes!=="" && $cobro!=="" ) {
        $conexion = conectar();
        $agregarPago = $conexion->prepare('INSERT INTO Pagos (mes, ano, alumno, cobro) VALUES (?,?,?,?)');
        $agregarPago->execute([$mes, $ano, $alumno, $cobro]);

        if($agregarPago->rowCount() >= 1){
	        echo json_encode(['code'=>200]);
        }
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