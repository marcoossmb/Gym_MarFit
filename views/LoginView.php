<?php

// Definición de la clase LoginView
class LoginView {

    // Método para mostrar el formulario de inicio de sesión
    public function mostrarLogin() {
        include('./lib/google_account_config.php');
        ?>
        <link rel="stylesheet" href="css/loginstyle.css">
        <div class="login-reg-panel">
            <div class="login-info-box">
                <h2>¿Tienes cuenta?</h2>
                <label id="label-register" for="log-reg-show">Inicia Sesión</label>
                <input type="radio" name="active-log-panel" id="log-reg-show"  checked="checked">
            </div>

            <div class="register-info-box">
                <h2>¿No tienes cuenta?</h2>
                <label id="label-login" for="log-login-show">Registrate</label>
                <input type="radio" name="active-log-panel" id="log-login-show">
            </div>

            <div class="white-panel">
                <form class="login-show" action="./index.php?controller=Login&action=procesarLogin" method="POST">
                    <h2>INICIAR SESIÓN</h2>
                    <input type="email" placeholder="Email" name="email" required>
                    <div class="password-input-container">
                        <input type="password" placeholder="Contraseña" name="password" required id="login-password">
                        <button type="button" id="password-toggle-btn-login" class="border-0 bg-white">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                    <input type="submit" value="Entrar">
                    <a href="./index.php">Volver</a>
                    <div class="d-flex justify-content-center mt-3">
                        <a class="text-primary"  data-toggle="modal" data-target="#exampleModal">
                            ¿Has olvidado tu contraseña?
                        </a>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-center">
                        <div class="d-flex justify-content-center mb-2 w-75 align-items-center" id="google-login-button">
                            <a class="a-google btn-google rounded px-5" href="<?php echo $google_client->createAuthUrl() ?>"><i class="fa-brands fa-google"></i> Seguir con Google</a>
                        </div>
                    </div>
                </form>

                <form class="register-show" action="./index.php?controller=Login&action=procesarRegistro" method="POST">
                    <h2>REGISTRO</h2>
                    <div class="row">
                        <div class="col-6">
                            <input type="text" placeholder="Nombre" class="mb-0" name="nombre" required>
                        </div>
                        <div class="col-6">
                            <input type="text" placeholder="Apellido" class="mb-0" name="apellido" required>
                        </div>
                    </div>
                    <input type="date" placeholder="Fecha de Nacimiento" name="date" required>
                    <input type="email" placeholder="Email" name="email" required>
                    <div class="password-input-container">
                        <input type="password" placeholder="Contraseña" name="password" required id="register-password">
                        <button type="button" id="password-toggle-btn-register" class="border-0 bg-white">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                    <input type="submit" value="Registrarse">
                    <a href="./index.php">Volver</a>
                </form>

            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Introduce tus datos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="./index.php?controller=Login&action=enviarEmailPassword" method="POST">
                            <input type="text" placeholder="Nombre" name="nombre" required>
                            <input type="email" placeholder="Email" name="email" required>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-google">Enviar</button>                                
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <?php

        function generarAlerta($simbolo, $mensaje, $color) {
            ?>
            <div class="container">
                <div class="row">
                    <div class="popupunder alert alert-<?php echo $color; ?> fade in">
                        <button type="button" class="close close-sm" data-dismiss="alert">
                            <i class="fa-solid fa-x"></i>
                        </button>
                        <i class="fa-solid <?php echo $simbolo; ?>"></i> <?php echo $mensaje; ?></div>
                </div>
            </div>
            <?php
        }

        if (isset($_GET['login'])) {
            if ($_GET['login'] == 'error') {
                generarAlerta("fa-x", "Error: Email o contraseña incorrectos", "danger");
            } else {
                generarAlerta("fa-x", "Error: Email ya registrado", "danger");
            }
        }

        if (isset($_GET['contraseña'])) {
            if ($_GET['contraseña'] == 'true') {
                generarAlerta("fa-check", "Se ha cambiado correctamente la contraseña", "success");
            } else {
                generarAlerta("fa-x", "No se ha cambiado correctamente la contraseña", "danger");
            }
        }
    }

    public function mostrarCambioPassword($email) {
        ?>
        <link rel="stylesheet" href="css/loginstyle.css">
        <div class="login-reg-panel">
            <div class="white-panel-password">
                <form class="login-show" action="./index.php?controller=Login&action=cambiarPassword" method="POST" onsubmit="return validatePasswords()">
                    <h3 class="mb-3">Cambia tu contraseña</h3>
                    <span id="error-message" class="text-danger font-weight-bold"></span>
                    <input type="hidden" name="email" value="<?php echo $email ?>">
                    <div class="password-input-container">
                        <input type="password" placeholder="Contraseña nueva" name="password1" required id="login-password">
                        <button type="button" id="password-toggle-btn-login" class="border-0 bg-white">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                    <div class="password-input-container">
                        <input type="password" placeholder="Confirmar contraseña nueva" name="password2" required id="register-password">
                        <button type="button" id="password-toggle-btn-register" class="border-0 bg-white">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                    <input type="submit" value="Cambiar" id="btn-changepassword">
                </form>
            </div>
        </div>
        <?php
    }
}
