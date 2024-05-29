<?php

// Definición de la clase error404Controller
class error404Controller {

    // Declaración de propiedades privadas
    private $view;

    // Constructor de la clase
    public function __construct() {
        $this->view = new error404View();
    }

    public function mostrarError404() {
        $this->view->mostrarError404();
    }
}
