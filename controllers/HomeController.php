<?php

// Definición de la clase VueloController
class HomeController {

    // Declaración de propiedades privadas
    private $service;
    private $view;

    // Constructor de la clase
    public function __construct() {
        $this->service = new HomeService();
        $this->view = new HomeView();
    }

    public function mostrar() {

        $this->view->mostrarHome();
    }
    
    public function enviarEmail() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once './lib/sendemail.php';
        } else {
            header("Location: ./index.php");
        }
    }       
}
