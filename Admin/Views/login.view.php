<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="icon" type="image/x-icon" href="Images/DefaultImages/icon.ico" />
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				
				<form class="login100-form validate-form"  id="loginform" method="POST" style="background-color: #1e2b49;">
					<span class="login100-form-title p-b-43">
						Inicio de sesión
					</span>
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input onkeypress="javascript:return uprotection(event)" class="input100" type="text" name="user" id="user">
						<span class="focus-input100"></span>
						<span class="label-input100">Usuario</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input onkeypress="javascript:return pprotection(event)" class="input100" type="password" name="pass" id="pass">
						<span class="focus-input100"></span>
						<span class="label-input100">Contraseña</span>
					</div>
                    <br>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" id="login">
							Ingresar
						</button>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('../img/edu_logo.png');">
				</div>
			</div>
		</div>
	</div>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="vendor/jquery/jquery.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<script src="js/login.js"></script>
	<script src="js/main.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.js"></script>
</body>
</html>