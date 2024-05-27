<?php

class MonitorController {

    // Obtiene una instancia de la vista y otra para el servicio del monitor
    private $service;
    private $view;

    public function __construct() {
        $this->service = new MonitorService();
        $this->view = new MonitorView();
    }

    public function calcularImcMonitor() {

        session_start();

        if ($_SESSION['rol'] != 2) {
            header("Location: ./index.php");
            exit();
        }

        $peso = $_POST['peso'];
        $altura = $_POST['altura'];

        // Calcular el IMC
        $altura_metros = $altura / 100;
        $imc = $peso / ($altura_metros * $altura_metros);
        $imc = round($imc, 1);

        // Actualizar el IMC en la base de datos
        $this->service->updateImcMonitor($_POST['id'], $imc);

        $this->configurarPerfil();
    }

    public function gestionarMonitores() {

        session_start();

        if ($_SESSION['rol'] != 1) {
            header("Location: ./index.php");
            exit();
        }

        $monitores = json_decode($this->service->allMonitores(), true);

        $allMonitores = [];

        foreach ($monitores as $monitor) {
            $allMonitores = new Monitor($monitor['id_monitor'], $monitor['username'], $monitor['password'], $monitor['nombre'], $monitor['apellido'], $monitor['email'], $monitor['fecha_nac'], $monitor['rol'], $monitor['imc']);
        }

        $this->view->gestionarMonitores($monitores);
    }

    public function eliminarMonitor() {

        $id_monitor = $_POST['id_monitor'];

        $this->service->eliminarMonitor($id_monitor);

        $this->gestionarMonitores();
    }

    // En el controlador, agregar un método para manejar la acción de agregar monitor

    public function agregarMonitor() {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $password = $_POST['password'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $fecha_nac = $_POST['fecha_nac'];

            $rand = rand(1, 100);
            $username = strtolower($nombre) . "_" . strtolower($apellido) . $rand;

            $monitorAgregado = $this->service->agregarMonitor($username, $password, $nombre, $apellido, $email, $fecha_nac);

            if ($monitorAgregado['resultado'] == 'El email ya esta registrado') {
                header("Location: ./index.php?controller=Monitor&action=gestionarMonitores&aniadir=error");
            } else {
                header("Location: ./index.php?controller=Monitor&action=gestionarMonitores&aniadir=true");
            }
        }
    }
}
