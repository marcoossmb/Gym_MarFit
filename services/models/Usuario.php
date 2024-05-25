<?php

// Definición de la clase Usuario
class Usuario {

    // Definición de los atributos
    private $id_usuario;
    private $username;
    private $password;
    private $nombre;
    private $apellido;
    private $email;
    private $fecha_nacim;
    private $rol;
    private $imc;

    // Método constructor
    public function __construct($id_usuario, $username, $password, $nombre, $apellido, $email, $fecha_nacim, $rol, $imc) {
        $this->id_usuario = $id_usuario;
        $this->username = $username;
        $this->password = $password;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->fecha_nacim = $fecha_nacim;
        $this->rol = $rol;
        $this->imc = $imc;
    }

    // Métodos Getter y Setter
    public function getId_usuario() {
        return $this->id_usuario;
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

    public function getFecha_nacim() {
        return $this->fecha_nacim;
    }

    public function getRol() {
        return $this->rol;
    }

    public function getImc() {
        return $this->imc;
    }

    public function setId_usuario($id_usuario): void {
        $this->id_usuario = $id_usuario;
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

    public function setFecha_nacim($fecha_nacim): void {
        $this->fecha_nacim = $fecha_nacim;
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
