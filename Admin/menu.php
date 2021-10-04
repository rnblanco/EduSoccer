<?php

	function User(){
		echo "
        <li class='nav-item dropdown no-arrow'>
            <a class='nav-link dropdown-toggle' href='#' id='userDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
            <i class='fas fa-user mr-3 mb-1'></i>
            <span class='mr-2 d-none d-lg-inline text-gray-600 small'>";
		echo $_SESSION['usuario'];
		echo "</span>
            </a>
            <!-- Dropdown - User Information -->
            <div class='dropdown-menu dropdown-menu-right shadow animated--grow-in' aria-labelledby='userDropdown'>
            
            <a class='dropdown-item' href='#' data-toggle='modal' data-target='#logoutModal'>
                <i class='fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400'></i>
                Cerrar sesión
            </a>
            </div>
        </li>
    ";
	}

	function Menu($tipo){
		switch($tipo){

			case 1:
				echo '
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <a class="sidebar-brand d-flex align-items-center justify-content-left" href="index.php">
                    <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-futbol"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Profesor</div>
                </a>

                <hr class="sidebar-divider">
                
                <div class="sidebar-heading" style="color:white!important;">
                    Clases
                </div>
                
                <li class="nav-item">
                    <a class="nav-link" href="alumnos.php">
                    <i class="fas fa-plus"></i>
                    <span>Alumnos</span></a>
                </li>
            </ul>
            ';
				break;

			case 2:
				echo '
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <a class="sidebar-brand d-flex align-items-center justify-content-left" href="index.php">
                    <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-futbol"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Administrador</div>
                </a>

                <hr class="sidebar-divider">

                <div class="sidebar-heading" style="color:white!important;">
                    Editables
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="servicios.php">
                    <i class="fas fa-concierge-bell"></i>
                    <span>Servicios</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="historia.php">
                    <i class="fas fa-history"></i>
                    <span>Historia </span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="contacto.php">
                    <i class="fas fa-address-book"></i>
                    <span>Contacto</span></a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link active" href="categorias.php">
                    <i class="fas fa-list"></i>
                    <span>Categorías</span></a>
                </li>
                
                <hr class="sidebar-divider">

                <div class="sidebar-heading" style="color:white!important;">
                    Clases
                </div>
                
                <li class="nav-item">
                    <a class="nav-link" href="alumnos.php">
                    <i class="fas fa-plus"></i>
                    <span>Alumnos</span></a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="usuarios.php">
                    <i class="fas fa-address-book"></i>
                    <span>Profesores</span></a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="pagos.php">
                    <i class="fas fa-credit-card"></i>
                    <span>Pagos</span></a>
                </li>
                
            </ul>
            ';
				break;
		}
	}
?>