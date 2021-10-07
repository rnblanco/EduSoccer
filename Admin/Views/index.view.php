<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" type="image/x-icon" href="Images/DefaultImages/icon.ico"/>
		<title>Index</title>
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		<link href="css/sb-admin-2.css" rel="stylesheet">
		<link href="css/form.css" rel="stylesheet">

	</head>

	<body id="page-top">
		<!-- Page Wrapper -->
		<div id="wrapper">
			<!-- Sidebar -->
			<?php
				require 'menu.php';
				Menu($_SESSION['tipo']);
			?>
			<div id="content-wrapper" class="d-flex flex-column">
				<div id="content">
					<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
						<form class="form-inline justify-content-center">
							<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3 mt-3">
								<i class="fa fa-bars"></i>
							</button>
						</form>
						<ul class="navbar-nav ml-auto">
							<div class="topbar-divider d-none d-sm-block"></div>
							<?php
								User();
							?>
						</ul>
					</nav>
					<!-- Begin Page Content -->
					<div class="container-fluid"></div>
				</div>
				<!-- Footer -->
				<?php require 'footer.php';?>
			</div>
		</div>

		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>

		<!-- Logout Modal-->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">¿Seguro que quieres cerrar sesión?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">Selecciona "cerrar sesión" si estás seguro de irte.</div>
					<div class="modal-footer" style="align-items: center;">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
						<a class="btn btn-primary" style="color:white!important;" href="../Db/logOut.php">Cerrar sesión</a>
					</div>
				</div>
			</div>
		</div>

		<script src="vendor/jquery/jquery.js"></script>
		<script src="vendor/jquery-easing/jquery.easing.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
		<script src="js/sb-admin-2.js"></script>
	</body>
</html>
