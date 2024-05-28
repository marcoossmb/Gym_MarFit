<?php

class PerfilController {

    // Obtiene una instancia de la vista del login
    private $service;
    private $view;

    public function __construct() {
        $this->service = new PerfilService();
        $this->view = new PerfilView();
    }

    public function configurarPerfil() {
        session_start();

        if (!isset($_SESSION['nombre'])) {
            header("Location: ./index.php");
        }

        $usuarioLogin = $this->service->procesarUsuario($_SESSION['email']);

        if ($usuarioLogin != '"SIN DATOS"') {

            // Decodificar el JSON en un array asociativo
            $usuarioData = json_decode($usuarioLogin, true);

            // Crear un objeto Usuario con la información obtenida
            $nuevouser = new Usuario(isset($usuarioData['id_usuario']) ? $usuarioData['id_usuario'] : $usuarioData['id_monitor'], $usuarioData['username'], $usuarioData['password'], $usuarioData['nombre'], $usuarioData['apellido'], $usuarioData['email'], isset($usuarioData['fecha_nacim']) ? $usuarioData['fecha_nacim'] : $usuarioData['fecha_nac'], $usuarioData['rol'], $usuarioData['imc']);
        }

        $this->view->mostrarPerfil($nuevouser);
    }

    public function guardarFecha() {

        // Actualizar la fecha de nacimiento en la base de datos        
        $this->service->updateFecha($_POST['id'], $_POST['date']);

        // Recargar el perfil del usuario        
        $this->configurarPerfil();
    }

    public function calcularImc() {
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];

        // Calcular el IMC
        $altura_metros = $altura / 100;
        $imc = $peso / ($altura_metros * $altura_metros);
        $imc = round($imc, 1);

        // Actualizar el IMC en la base de datos
        $this->service->updateImc($_POST['id'], $imc);

        $this->configurarPerfil();
    }

    public function verStockMaterial() {
        
        session_start();
        
        if ($_SESSION['rol'] != 1) {
            header("Location: ./index.php");
        }
        
        $this->view->verStockMaterial();
        
    }
}
