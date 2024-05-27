<!-- MENÚ -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img class="logo-img" src="./assets/images/logotipo.jpeg" alt="logotipo"/> MarFit
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-lg-auto">
                <li class="nav-item">
                    <a href="./index.php#about" class="nav-link smoothScroll">Sobre Nosotros</a>
                </li>                        
                <li class="nav-item">
                    <a href="./index.php#schedule" class="nav-link smoothScroll">Horarios</a>
                </li>
                <li class="nav-item">
                    <a href="./index.php#contact" class="nav-link smoothScroll">Contacto</a>
                </li>
                <?php
                if (isset($_SESSION['nombre'])) {
                    ?>
                    <li class="nav-item">
                        <?php echo ($_SESSION['rol'] == 0) ? '<a href="./index.php?controller=Clase&action=mostrarEleccionClases" class="nav-link smoothScroll">Clases</a>' : ''; ?>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link smoothScroll dropdown-toggle a-button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['nombre']; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="./index.php?controller=Perfil&action=configurarPerfil">Mi Perfil</a>
                            <?php echo ($_SESSION['rol'] == 0) ? '<a class="dropdown-item" href="./index.php?controller=Clase&action=verClasesUsuario">Mis Clases</a>' : ''; ?>
                            <?php echo ($_SESSION['rol'] == 1) ? '<a class="dropdown-item" href="./index.php?controller=Perfil&action=verStockMaterial">Ver Stock</a>' : ''; ?>
                            <?php echo ($_SESSION['rol'] == 1) ? '<a class="dropdown-item" href="./index.php?controller=Monitor&action=gestionarMonitores">Gestionar Monitores</a>' : ''; ?>
                            <?php echo ($_SESSION['rol'] == 2) ? '<a class="dropdown-item" href="./index.php?controller=Clase&action=verMonitorClases">Ver mis clases</a>' : ''; ?>                                    
                            <a class="dropdown-item" href="./index.php?controller=Login&action=cerrarSesion">Cerrar Sesión</a>
                        </div>
                    </li>

                    <?php
                } else {
                    ?>
                    <li class="nav-item">
                        <a href="./index.php?controller=Login&action=mostrarLogin" class="nav-link smoothScroll">Iniciar Sesión</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>