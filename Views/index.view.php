<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>EduSoccer</title>
		<!-- Favicon-->
		<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
		<!-- Font Awesome icons (free version)-->
		<script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
		<!-- Google fonts-->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
		<!-- Core theme CSS (includes Bootstrap)-->
		<link href="css/styles.css" rel="stylesheet" />
	</head>
	<body id="page-top">
		<!-- Navigation-->
		<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
			<div class="container">
				<a class="navbar-brand" href="#page-top"><img src="assets/img/edu_logo.png" alt="..." /></a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					Menu
					<i class="fas fa-bars ms-1"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
						<li class="nav-item"><a class="nav-link" href="#services">Servicios</a></li>
						<li class="nav-item"><a class="nav-link" href="#portfolio">Categorias</a></li>
						<li class="nav-item"><a class="nav-link" href="#about">Sobre nosotros</a></li>
						<li class="nav-item"><a class="nav-link" href="#team">Equipo</a></li>
						<li class="nav-item"><a class="nav-link" href="#contact">Contactos</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- Masthead-->
		<header class="masthead">
			<div class="container">
				<div class="masthead-subheading">Bienvenido a EduSoccer</div>
				<div class="masthead-heading text-uppercase">Es un placer conocerte</div>
				<a class="btn btn-primary btn-xl text-uppercase" href="#services">Dime mas</a>
			</div>
		</header>
		<!-- Services-->
		<section class="page-section" id="services">
			<div class="container">
				<div class="text-center">
					<h2 class="section-heading text-uppercase">Informacion general</h2>
					<h3 class="section-subheading text-muted">Aqui puedes ver la informacion general de la Academia EduSoccer</h3>
				</div>
				<div class="row text-center">
					<?php Servicios() ?>
				</div>
			</div>
		</section>
		<!-- Portfolio Grid-->
		<section class="page-section bg-light" id="portfolio">
			<div class="container">
				<div class="text-center">
					<h2 class="section-heading text-uppercase">Categorias</h2>
					<h3 class="section-subheading text-muted">A continuacion se muestran las distintas categorias que hay en la academia.</h3>
				</div>
				<div class="row">
					<?php Categorias(1) ?>
				</div>
			</div>
		</section>
		<!-- About-->
		<section class="page-section" id="about">
			<div class="container">
				<div class="text-center">
					<h2 class="section-heading text-uppercase">Nuestra historia</h2>
					<h3 class="section-subheading text-muted">A través de los años la academia ha pasado por</h3>
				</div>
				<ul class="timeline">
					<?php Historia() ?>
					<li>
						<div class="timeline-image">
							<h4>
								¡Se parte
								<br />
								de nuestra
								<br />
								Historia!
							</h4>
						</div>
					</li>
				</ul>
			</div>
		</section>
		<!-- Team-->
		<section class="page-section bg-light" id="team">
			<div class="container">
				<div class="text-center">
					<h2 class="section-heading text-uppercase">Contactos</h2>
					<h3 class="section-subheading text-muted">Puedes saber mas de nosotros y contactarnos a travez de</h3>
				</div>
				<div class="row">
					<?php Contacto() ?>
				</div>
				<div class="row">
					<div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Contáctanos, será un placer atenderte.</p></div>
				</div>
			</div>
		</section>
		<!-- Contact-->
		<section class="page-section" id="contact">
			<div class="container">
				<div class="text-center">
					<h2 class="section-heading text-uppercase">Contactanos</h2>
					<h3 class="section-subheading text-muted">Llena el formulario para poder ponerte en contacto con nosotros.</h3>
				</div>
				<!-- * * * * * * * * * * * * * * *-->
				<!-- * * SB Forms Contact Form * *-->
				<!-- * * * * * * * * * * * * * * *-->
				<!-- This form is pre-integrated with SB Forms.-->
				<!-- To make this form functional, sign up at-->
				<!-- https://startbootstrap.com/solution/contact-forms-->
				<!-- to get an API token!-->
				<form id="contactForm" data-sb-form-api-token="API_TOKEN" action="enviar.php" method="post">
					<div class="row align-items-stretch mb-5">
						<div class="col-md-6">
							<div class="form-group">
								<!-- Name input-->
								<input class="form-control" name="name" id="name" type="text" placeholder="Nombre *" data-sb-validations="required" />
								<div class="invalid-feedback" data-sb-feedback="name:required">Se requiere de un nombre.</div>
							</div>
							<div class="form-group">
								<!-- Email address input-->
								<input class="form-control" name="mail" id="email" type="email" placeholder="Correo Electronico *" data-sb-validations="required,email" />
								<div class="invalid-feedback" data-sb-feedback="email:required">Se requiere de un correo electronico.</div>
								<div class="invalid-feedback" data-sb-feedback="email:email">El correo electronico no es valido.</div>
							</div>
							<div class="form-group mb-md-0">
								<!-- Phone number input-->
								<input class="form-control" name="phone" id="phone" type="tel" placeholder="Telefono *" data-sb-validations="required" />
								<div class="invalid-feedback" data-sb-feedback="phone:required">Se requiere de un numero telefonico.</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group form-group-textarea mb-md-0">
								<!-- Message input-->
								<textarea class="form-control" name="message" id="message" placeholder="Mensaje *" data-sb-validations="required"></textarea>
								<div class="invalid-feedback" data-sb-feedback="message:required">Se requiere un mensaje.</div>
							</div>
						</div>
					</div>
					<!-- Submit success message-->
					<!---->
					<!-- This is what your users will see when the form-->
					<!-- has successfully submitted-->
					<div class="d-none" id="submitSuccessMessage">
						<div class="text-center text-white mb-3">
							<div class="fw-bolder">Mensaje enviado correctamente!</div>
							To activate this form, sign up at
							<br />
							<a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
						</div>
					</div>
					<!-- Submit error message-->
					<!---->
					<!-- This is what your users will see when there is-->
					<!-- an error submitting the form-->
					<div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error al mandar el mensaje!</div></div>
					<!-- Submit Button-->
					<div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">Enviar mensaje</button></div>
				</form>
			</div>
		</section>
		<!-- Footer-->
		<footer class="footer py-4">

		</footer>
		<!-- Portfolio Modals-->
		<?php Categorias(2) ?>

		<!-- Bootstrap core JS-->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
		<!-- Core theme JS-->
		<script src="js/scripts.js"></script>
		<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
		<!-- * *                               SB Forms JS                               * *-->
		<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
		<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
		<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
	</body>
</html>
