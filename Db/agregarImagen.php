<?php   
    include_once 'sesiones.php';
    require("conexion.php");

    $error="";$test="";$ext="";$name="";$locacion="";$nuevalocacion="";

    if( $_FILES['img'] ){
        $nuevalocacion="../assets/img/EduSoccer/" . $_FILES['img']['name'];
		$locacion = $_FILES['img']['name'];
    }
    else $error .= "falta img";

    
    if( $nuevalocacion!=="" ) {
        $conexion = conectar();
        $agregarPublicacion = $conexion->prepare('INSERT INTO slider (Imagen, Estado) VALUES (?,?)');
        $agregarPublicacion->execute([$locacion, 2]);

        if($agregarPublicacion->rowCount() >= 1){
            move_uploaded_file($_FILES['img']['tmp_name'], $nuevalocacion);
            echo json_encode(['code'=>200]);
        }
        else {
            echo json_encode(['code'=>404]);
            echo $error;
        }
    }

    else{
        echo json_encode(['code'=>404]);
        echo $error;
    }
    

?>