<?php
    require_once '../Db/sesiones.php';
    $usuario = $_SESSION['usuario'];

    if($usuario == null || $usuario = '') header("Location: ../Db/logOut.php");
    else require_once 'Views/password.view.php';
	echo '
	<script type="text/javascript">
		let idUsuario = '. $_SESSION['id'] .';
	</script>
	';
?>


