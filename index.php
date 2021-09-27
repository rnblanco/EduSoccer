<?php
	require("Db/conexion.php");
	require_once 'Views/index.view.php';

	function Servicios(){
		$conexion = conectar();
		$buscarServicios = $conexion->prepare("SELECT * FROM servicios ORDER BY ID");
		$buscarServicios->execute();
		$servicios = $buscarServicios->fetchAll();

		foreach($servicios as list($id, $titulo, $contenido)){
			echo"
				<div class='col-md-4'>
					<span class='fa-stack fa-4x'>
						<i class='fas fa-circle fa-stack-2x text-primary'></i>
						<i class='far fa-clock fa-stack-1x fa-inverse'></i>
					</span>
					<h4 class='my-3'>$titulo</h4>
					<p class='text-muted'>$contenido</p>
				</div>
            ";
		}
	}

	function Categorias($tipo){
		$conexion = conectar();
		$buscarCategorias = $conexion->prepare("SELECT * FROM categorias ORDER BY ID");
		$buscarCategorias->execute();
		$Categorias = $buscarCategorias->fetchAll();

		foreach($Categorias as list($id, $titulo, $subtitulo, $contenido, $profesor, $imagen)){

			$imagen==""?$imagen="default.png":$imagen;

			switch($tipo){
				case 1:
					echo"
						<div class='col-lg-4 col-sm-6 mb-4'>
							<div class='portfolio-item'>
								<a class='portfolio-link' data-bs-toggle='modal' href='#portfolioModal$id'>
									<div class='portfolio-hover'>
										<div class='portfolio-hover-content'><i class='fas fa-plus fa-3x'></i></div>
									</div>
									<img class='img-fluid' src='assets/img/EduSoccer/$imagen' alt='...' />
								</a>
								<div class='portfolio-caption'>
									<div class='portfolio-caption-heading'>$titulo</div>
									<div class='portfolio-caption-subheading text-muted'>$subtitulo</div>
								</div>
							</div>
						</div>
            		";
				break;
				case 2:
					echo"
						<div class='portfolio-modal modal fade' id='portfolioModal$id' tabindex='-1' role='dialog' aria-hidden='true'>
							<div class='modal-dialog'>
								<div class='modal-content'>
									<div class='close-modal' data-bs-dismiss='modal'><img src='assets/img/close-icon.svg' alt='Close modal' /></div>
									<div class='container'>
										<div class='row justify-content-center'>
											<div class='col-lg-8'>
												<div class='modal-body'>
													<!-- Project details-->
													<h2 class='text-uppercase'>$titulo</h2>
													<p class='item-intro text-muted'>$subtitulo</p>
													<img class='img-fluid d-block mx-auto' src='assets/img/EduSoccer/$imagen' alt='...' />
													<p>$contenido</p>
													<ul class='list-inline'>
														<li>
															<strong>Profesor:</strong>
															$profesor
														</li>
													</ul>
													<button class='btn btn-primary btn-xl text-uppercase' data-bs-dismiss='modal' type='button'>
														<i class='fas fa-times me-1'></i>
														Cerrar
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
            		";
			}
		}
	}

	function Historia(){
		$conexion = conectar();
		$buscarHistoria = $conexion->prepare("SELECT * FROM Historia ORDER BY ID");
		$buscarHistoria->execute();
		$Historia = $buscarHistoria->fetchAll();

		foreach($Historia as list($id, $titulo, $subtitulo, $contenido, $imagen)){
			$imagen==""?$imagen="default.png":$imagen;
			$class = $id % 2 == 0 ? 'timeline-inverted': '';
			echo"
				<li class='$class'>
					<div class='timeline-image'><img class='rounded-circle img-fluid' src='assets/img/EduSoccer/$imagen' alt='...' /></div>
					<div class='timeline-panel'>
						<div class='timeline-heading'>
							<h4>$subtitulo</h4>
							<h4 class='subheading'>$titulo</h4>
						</div>
						<div class='timeline-body'><p class='text-muted'>$contenido</p></div>
					</div>
				</li>
            ";
		}
	}

	function Contacto(){
		$conexion = conectar();
		$buscarContacto = $conexion->prepare("SELECT * FROM Contacto ORDER BY ID");
		$buscarContacto->execute();
		$Contacto = $buscarContacto->fetchAll();

		foreach($Contacto as list($id, $titulo, $contenido, $imagen, $icono, $enlace)){
			$imagen==""?$imagen="default.png":$imagen;
			echo"
				<div class='col-lg-4'>
					<div class='team-member'>
						<img class='mx-auto rounded-circle' src='assets/img/EduSoccer/$imagen' alt='...' />
						<h4>$titulo</h4>
						<p class='text-muted'>$contenido</p>
						<a class='btn btn-dark btn-social mx-2' href='$enlace'><i class='$icono'></i></a>
					</div>
				</div>
            ";
		}
	}
?>


