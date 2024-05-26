<?php

// Definición de la clase Monitor
class Monitor {

    // Definición de los atributos
    private $id_monitor;
    private $username;
    private $password;
    private $nombre;
    private $apellido;
    private $email;
    private $fecha_nac;
    private $rol;
    private $imc;

    // Método constructor
    public function __construct($id_monitor, $username, $password, $nombre, $apellido, $email, $fecha_nac, $rol, $imc) {
        $this->id_monitor = $id_monitor;
        $this->username = $username;
        $this->password = $password;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->fecha_nac = $fecha_nac;
        $this->rol = $rol;
        $this->imc = $imc;
    }

    // Métodos Getter y Setter
    public function getId_monitor() {
        return $this->id_monitor;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getFecha_nac() {
        return $this->fecha_nac;
    }

    public function getRol() {
        return $this->rol;
    }

    public function getImc() {
        return $this->imc;
    }

    public function setId_monitor($id_monitor): void {
        $this->id_monitor = $id_monitor;
    }

    public function setUsername($username): void {
        $this->username = $username;
    }

    public function setPassword($password): void {
        $this->password = $password;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido): void {
        $this->apellido = $apellido;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setFecha_nac($fecha_nac): void {
        $this->fecha_nac = $fecha_nac;
    }

    public function setRol($rol): void {
        $this->rol = $rol;
    }

    public function setImc($imc): void {
        $this->imc = $imc;
    }

    // Método destructor
    public function __destruct() {
        
    }
}
