<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require '../phpmailer/src/PHPMailer.php';
	require '../phpmailer/src/SMTP.php';
	require '../phpmailer/src/Exception.php';
	require("../Db/conexion.php");

    session_start();
	// Máxima duración de sesión activa en hora
	define( 'MAX_SESSION_TIEMPO', 3600 * 1 );

	// Controla cuando se ha creado y cuando tiempo ha recorrido
	if ( isset( $_SESSION[ 'ULTIMA_ACTIVIDAD' ] ) &&
		( time() - $_SESSION[ 'ULTIMA_ACTIVIDAD' ] > MAX_SESSION_TIEMPO ) ) {
		// Si ha pasado el tiempo sobre el limite destruye la session
		destruir_session();
	}

	$_SESSION[ 'ULTIMA_ACTIVIDAD' ] = time();

	// Función para destruir y resetear los parámetros de sesión
	function destruir_session(){
		$_SESSION = [];
		if(ini_get('session.use_cookies')){
			$params = session_get_cookie_params();
			setcookie(session_name(), '', time() - MAX_SESSION_TIEMPO, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
		}
		@session_destroy();
	}

	$conexion = conectar();
	$primerDia = new DateTime();
	$primerDia->modify('first day of this month');
	$ultimoDia = new DateTime();
	$ultimoDia->modify('last day of this month');
	$primerDia = $primerDia->format('Y-m-d');
	$ultimoDia = $ultimoDia->format('Y-m-d');

	$buscarAsistencias = $conexion->prepare("SELECT Alumno FROM asistencia WHERE Asistencia ='Presente' AND Fecha BETWEEN '$primerDia' AND '$ultimoDia'");
	$buscarAsistencias->execute();
	//Si funcionó la búsqueda de asistencias por fecha
	if($buscarAsistencias->rowCount()>=1){
		$Alumnos = $buscarAsistencias->fetchAll();
		// Eliminar elementos repetidos
		$Alumnos = array_map("unserialize", array_unique(array_map("serialize", $Alumnos)));
		foreach($Alumnos as list ($alumno)){
			$buscarPagos = $conexion->prepare("SELECT * FROM pagos WHERE Alumno='$alumno' AND  Fecha BETWEEN '$primerDia' AND '$ultimoDia'");
			$buscarPagos->execute();

			$buscarRecordatorios = $conexion->prepare("SELECT * FROM recordatorios WHERE Alumno='$alumno'");
			$buscarRecordatorios->execute();

			if(!($buscarPagos->rowCount()>=1)){
				if(!($buscarRecordatorios->rowCount()>=1)){

					$buscarAlumno = $conexion->prepare("SELECT Nombre, Contacto FROM alumnos WHERE ID='$alumno'");
					$buscarAlumno->execute();
					$Alumno = $buscarAlumno->fetchAll();

					foreach($Alumno as list ($nombre, $contacto)){
						$mail = new PHPMailer(true);
						try {
							//enviar correo
							$mail->SMTPDebug = SMTP::DEBUG_OFF;
							$mail->isSMTP();
							$mail->Host = 'smtp.gmail.com';
							$mail->SMTPAuth = true;
							$mail->Username = 'academiaedusoccer@gmail.com';
							$mail->Password = 'Admin Edusoccer';
							$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
							$mail->Port = 587;
							$mail->SMTPOptions = array(
								'ssl' => array(
									'verify_peer' => false,
									'verify_peer_name' => false,
									'allow_self_signed' => true
								)
							);

							$mail->setFrom('academiaedusoccer@gmail.com', 'Academia EduSoccer');
							$mail->addAddress($contacto, $nombre);

							$mail->isHTML(true);
							$mail->Subject = 'Pago atrasado';
							$mail->Body = 'Por este medio se le hace el recordatorio que su hijo ha asistido a clases y su pago aún no ha sido recibido.<br/>
										Por favor acercase con el profesor para realizar el pago correspondiente a este mes.';
							$mail->send();

							//ingresar a base de datos que el recordatorio fue hecho
							$agregarRecordatorio = $conexion->prepare("INSERT INTO recordatorios(inicio,fin,alumno) VALUES(?,?,?)");
							$agregarRecordatorio->execute([$primerDia,$ultimoDia,$alumno]);
						} catch (Exception $e) {
							echo 'Mensaje ' . $mail->ErrorInfo;
						}
					}
				}
			}
		}
	}else{
		echo $primerDia;
		echo "<br>" . $ultimoDia;
	}
	$conexion = NULL;
?>