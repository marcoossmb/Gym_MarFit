<?php

// Definición de la clase ClaseController
class ClaseController {

    // Declaración de propiedades privadas
    private $service;
    private $view;

    // Constructor de la clase
    public function __construct() {
        $this->service = new ClaseService();
        $this->view = new ClaseView();
    }

    public function mostrarEleccionClases() {

        session_start();

        if (!isset($_SESSION['id_usuario'])) {
            header("Location: ./index.php");
            exit();
        }

        // Obtener los vuelos del servicio y decodificar el JSON
        $clases = json_decode($this->service->allClases(), true);

        $allClases = [];

        // Iterar sobre cada vuelo obtenido y crear objetos Clase
        foreach ($clases as $clase) {
            $allClases[] = new Clase($clase['id_clase'], $clase['title'],
                    $clase['tipo'], $clase['descripcion'], $clase['duracion']);
        }

        $this->view->mostrarEleccionClases($allClases);
    }

    public function verMonitorClases() {

        session_start();

        if (!isset($_SESSION['id_monitor'])) {
            header("Location: ./index.php");
            exit();
        }

        $this->view->verMonitorClases();
    }

    public function reservarClase() {

        session_start();

        if (!isset($_SESSION['id_usuario'])) {
            header("Location: ./index.php?controller=Login&action=mostrarLogin");
            exit();
        }

        //Cojo el id de la clase a partir del nombre
        $title = $_POST['clase'];
        //Paso el json a string
        $json_response = $this->service->oneClaseByTitle($title);
        $response_array = json_decode($json_response, true);

        //Lo guardo en la variable id_clase
        $id_clase = $response_array['id_clase'];

        //Defino las demás variables
        $start = $_POST['date'];
        $hora_clase = $_POST['time'];
        $id_usuario = $_SESSION['id_usuario'];

        $insertaReserva = $this->service->reservarClase($id_usuario, $id_clase, $start, $hora_clase);

        if ($insertaReserva['resultado'] == 'Ya has realizado esta reserva') {
            header("Location: ./index.php?controller=Home&action=mostrarHome&reserva=false");
        } else {
            header("Location: ./index.php?controller=Home&action=mostrarHome&reserva=true");
        }
    }

    public function verClasesUsuario() {

        session_start();

        if (!isset($_SESSION['id_usuario'])) {
            header("Location: ./index.php");
            exit();
        }

        $clasesPorUsuario = json_decode($this->service->request_clasesUsuario($_SESSION['id_usuario']), true);

        $this->view->verClasesUsuario($clasesPorUsuario);
    }
}
