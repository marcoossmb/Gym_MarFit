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

        $this->view->verMonitorClases();
    }
}
