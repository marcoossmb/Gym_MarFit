<?php

// Definición de la clase PerfilView
class PerfilView {

    // Método para mostrar el perfil del usuario
    public function mostrarPerfil($nuevouser) {
        ?>
        <link rel="stylesheet" href="css/profile.css">
        <div class="profile">
            <div class="profile-welcome p-5">
                <div class="container">
                    <h1>Hola <?php echo $nuevouser->getNombre(); ?></h1>
                    <p class="text-light">A continuación, encontrarás los datos personales que nos ha facilitado.</p>
                </div>
            </div>
            <div class="profile-data mt-4 p-5 container mb-5">
                <h2>MIS DATOS</h2>
                <h3 class="mt-4">Mis datos personales</h3>

                <!-- INICIO CAJAS -->
                <div class="d-flex mt-4 mb-4">
                    <div class="d-flex flex-column">
                        <span>Nombre de Usuario</span>
                        <span>Email</span>
                        <span>Nombre</span>
                        <span>Apellido</span>
                        <span>Fecha de nacimiento</span>
                        <span class="<?php echo $nuevouser->getFecha_nacim() == "" ? 'imc-camp' : 'pt-2' ?>">Índice de masa corporal</span>
                    </div>
                    <div class="d-flex flex-column ml-5">
                        <span><?php echo $nuevouser->getUsername(); ?></span>                            
                        <span><?php echo $nuevouser->getEmail(); ?></span>
                        <span><?php echo $nuevouser->getNombre(); ?></span>
                        <span><?php echo $nuevouser->getApellido(); ?></span>
                        <span>
                            <?php
                            if ($nuevouser->getFecha_nacim() == "") {
                                ?>
                                <form action="./index.php?controller=Perfil&action=guardarFecha" method="POST" class="d-flex">
                                    <input type="hidden" name="id" value="<?php echo $nuevouser->getId_usuario(); ?>">
                                    <div class="form-row">
                                        <div class="col">
                                            <input class="border-0 btn-form" type="date" name="date" required>
                                        </div>
                                        <div class="col"><button type="submit" class="btn-prof">Guardar</button></div>
                                    </div>
                                </form>
                                <?php
                            } else {
                                echo $nuevouser->getFecha_nacim();
                            }
                            ?>
                        </span>
                        <span class="mt-2">
                            <?php
                            if ($nuevouser->getImc() == 0) {
                                ?>
                                <form action="<?php echo $_SESSION['rol'] == 0 ? './index.php?controller=Perfil&action=calcularImc' : './index.php?controller=Monitor&action=calcularImcMonitor' ?>" method="POST">
                                    <input type="hidden" name="id" value="<?php echo isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : $_SESSION['id_monitor'] ?>">
                                    <div class="form-row">
                                        <div class="col">
                                            <input class="border-0 btn-form" type="number" placeholder="Peso, ej:77" name="peso" min="30" max="700" required>
                                        </div>
                                        <div class="col">
                                            <input class="border-0 btn-form" type="number" placeholder="Altura, ej:181" name="altura" min="60" max="300" required>
                                        </div>
                                        <div class="col"><button type="submit" class="btn-prof">Calcular</button></div>
                                    </div>
                                </form>
                                <?php
                            } else {
                                echo $nuevouser->getImc();
                                if ($nuevouser->getImc() <= 18.4) {
                                    echo '<span class="text-warning font-weight-bold"> Peso bajo</span>';
                                } elseif ($nuevouser->getImc() >= 18.5 && $nuevouser->getImc() <= 24.9) {
                                    echo '<span class="text-success font-weight-bold"> Saludable</span>';
                                } elseif ($nuevouser->getImc() >= 25 && $nuevouser->getImc() <= 29.9) {
                                    echo '<span class="text-warning font-weight-bold"> Sobrepeso</span>';
                                } elseif ($nuevouser->getImc() >= 30) {
                                    echo '<span class="text-danger font-weight-bold"> Obesidad</span>';
                                }
                            }
                            ?>
                        </span>                            
                    </div>
                </div>
                <!-- FIN CAJAS -->
                <?php
                if ($nuevouser->getImc() != 0) {
                    ?>
                    <h4>Actualizar peso y altura</h4>  
                    <form action="<?php echo $_SESSION['rol'] == 0 ? './index.php?controller=Perfil&action=calcularImc' : './index.php?controller=Monitor&action=calcularImcMonitor' ?>" method="POST">
                        <input type="hidden" name="id" value="<?php echo isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : $_SESSION['id_monitor'] ?>">
                        <div class="form-row">
                            <div class="col">
                                <input class="border-0 btn-form" type="number" placeholder="Peso, ej:77" name="peso" min="30" max="700" required>
                            </div>
                            <div class="col">
                                <input class="border-0 btn-form" type="number" placeholder="Altura, ej:181" name="altura" min="60" max="300" required>
                            </div>
                            <div class="col"><button type="submit" class="btn btn-dark mb-2">Actualizar</button></div>
                        </div>
                    </form>
                    <?php
                }
                ?>
                <div class="d-flex justify-content-between">
                    <a href="./index.php" class="bg-dark p-2 text-light rounded">Volver</a>
                </div>
            </div>
        </div>
        <?php
        require_once './components/Footer/footer.php';
    }

    public function verStockMaterial() {
        require_once './components/Header/header.php';
        ?>
        <div class="container mt-5">
            <h2 style="margin-top: 150px">Stock del material</h2>
            <canvas id="grafica" class="mt-3"></canvas>

            <h2 style="margin-top: 125px" class="mb-5">Alumnos por clase</h2>
            <canvas id="grafica_alum" class="mb-5"></canvas>

            <div class="d-flex justify-content-between mb-5">
                <a href="./index.php" class="bg-dark p-2 text-light rounded">Volver</a>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
        <script src="./js/graficas.js"></script>
        <?php
    }
}
