<?php

class LoginController {

    // Obtiene una instancia de la vista del login
    private $service;
    private $view;

    public function __construct() {
        $this->service = new LoginService();
        $this->view = new LoginView();
    }

    // Muestra el login
    public function mostrarLogin() {
        $this->view->mostrarLogin();
    }

    // Procesa el login para verificar usuario
    public function procesarLogin() {
        // Recupera los datos del login
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = hash("sha256", $_POST['password']);
        }

        $usuarioLogin = $this->service->comprobarUsuario($email, $password);

        if ($usuarioLogin != '"SIN DATOS"') {

            // Decodificar el JSON en un array asociativo
            $usuarioData = json_decode($usuarioLogin, true);

            if (isset($usuarioData['id_usuario'])) {
                // Crear un objeto Usuario con la información obtenida
                $nuevouser = new Usuario($usuarioData['id_usuario'], $usuarioData['username'], $usuarioData['password'], $usuarioData['nombre'], $usuarioData['apellido'], $usuarioData['email'], $usuarioData['fecha_nacim'], $usuarioData['rol'], $usuarioData['imc']);
            } else {
                // Crear un objeto Monitor con la información obtenida
                $nuevouser = new Monitor($usuarioData['id_monitor'], $usuarioData['username'], $usuarioData['password'], $usuarioData['nombre'], $usuarioData['apellido'], $usuarioData['email'], $usuarioData['fecha_nac'], $usuarioData['rol'], $usuarioData['imc']);
            }

            // Iniciar sesión y establecer variables de sesión con la información del usuario
            session_start();
            $_SESSION['nombre'] = $nuevouser->getNombre();
            $_SESSION['rol'] = $nuevouser->getRol();
            $_SESSION['email'] = $nuevouser->getEmail();
            if (isset($usuarioData['id_usuario'])) {
                $_SESSION['id_usuario'] = $nuevouser->getId_usuario();
            } else {
                $_SESSION['id_monitor'] = $nuevouser->getId_monitor();
            }


            header("Location: ./index.php?login=true");
        } else {
            header("Location: ./index.php?controller=Login&action=mostrarLogin&login=error");
        }
    }

    public function procesarRegistro() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recupera los datos del register
            $password = hash("sha256", $_POST['password']);
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $fecha_nacim = $_POST['date'];

            $rand = rand(1, 100);
            $username = strtolower($nombre) . "_" . strtolower($apellido) . $rand;

            $usuarioInsertado = $this->service->insertarUsuario($password, $nombre, $apellido, $email, $fecha_nacim, $username);

            if ($usuarioInsertado['resultado'] == 'El email ya esta registrado') {
                header("Location: ./index.php?controller=Login&action=mostrarLogin&login=error2");
                exit();
            } else {
                $this->procesarLogin();
            }
        }
    }

    public function procesarGoogle() {
        include('./lib/google_account_config.php');

        if (isset($_GET["code"])) {

            $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
            $google_client->setAccessToken($token['access_token']);
            $google_service = new Google_Service_Oauth2($google_client);
            $data = $google_service->userinfo->get();

            $nombre = $data['given_name'];
            $priemrApe = explode(" ", $data['family_name']);
            $apellido = $priemrApe[0];
            $email = $data['email'];

            $rand = rand(1, 100);
            $username = strtolower($data['given_name']) . "_" . strtolower($priemrApe[0]) . $rand;

            $password = hash("sha256", $data['id']);
            $fecha_nacim;

            $this->procesarRegistroGoogle($password, $nombre, $apellido, $email, $fecha_nacim, $username);

            // Redireccionar después de autenticar
            header("Location: ./index.php?login=true");
            exit;
        }
    }

    public function procesarRegistroGoogle($password, $nombre, $apellido, $email, $fecha_nacim, $username) {

        $this->service->insertarUsuario($password, $nombre, $apellido, $email, $fecha_nacim, $username);

        $this->procesarLoginGoogle($email);
    }

    public function procesarLoginGoogle($email) {
        // Recupera los datos del login

        $usuarioLogin = $this->service->comprobarUsuarioGoogle($email);

        if ($usuarioLogin != '"SIN DATOS"') {

            // Decodificar el JSON en un array asociativo
            $usuarioData = json_decode($usuarioLogin, true);

            // Crear un objeto Usuario con la información obtenida
            $nuevouser = new Usuario($usuarioData['id_usuario'], $usuarioData['username'], $usuarioData['password'], $usuarioData['nombre'], $usuarioData['apellido'], $usuarioData['email'], $usuarioData['fecha_nacim'], $usuarioData['rol'], $usuarioData['id_monitor'], $usuarioData['imc']);

            // Iniciar sesión y establecer variables de sesión con la información del usuario
            session_start();
            $_SESSION['nombre'] = $nuevouser->getNombre();
            $_SESSION['rol'] = $nuevouser->getRol();
            $_SESSION['id_usuario'] = $nuevouser->getId_usuario();
            $_SESSION['email'] = $nuevouser->getEmail();

            header("Location: ./index.php?login=true");
        }
    }

    public function enviarEmailPassword() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once './lib/sendemailpassword.php';
        } else {
            header("Location: ./index.php");
        }
    }

    public function mostrarCambioPassword() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = $_POST['email'];

            $this->view->mostrarCambioPassword($email);
        }
    }

    public function cambiarPassword() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = $_POST['email'];

            if ($_POST['password1'] == $_POST['password2']) {
                $prePassword = $_POST['password1'];
                $password = hash("sha256", $prePassword);

                $actualizaPassword = $this->service->actualizarPassword($email, $password);

                if ($actualizaPassword['mensaje'] == 'El email no esta registrado') {
                    header("Location: ./index.php?controller=Login&action=mostrarLogin&login=false");
                    exit();
                } else {
                    header('Location: ./index.php?controller=Login&action=mostrarLogin&contraseña=true');
                }
            }
        }
    }

    // Función para cerrar sesión
    public function cerrarSesion() {
        session_start();

        //Borramos las sesiones existentes
        $_SESSION = array();
        session_destroy();

        //Redireccionamiento
        header('Location: ./index.php?sesion=close');
    }
}
