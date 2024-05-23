<?php

// Definición de la clase Clase
class Clase {

    // Definición de los atributos
    private $id_clase;
    private $title;
    private $tipo;
    private $descripcion;
    private $duracion;

    // Método constructor
    public function __construct($id_clase, $title, $tipo, $descripcion, $duracion) {
        $this->id_clase = $id_clase;
        $this->title = $title;
        $this->tipo = $tipo;
        $this->descripcion = $descripcion;
        $this->duracion = $duracion;
    }

    // Métodos Getter y Setter
    public function getId_clase() {
        return $this->id_clase;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getDuracion() {
        return $this->duracion;
    }

    public function setId_clase($id_clase): void {
        $this->id_clase = $id_clase;
    }

    public function setTitle($title): void {
        $this->title = $title;
    }

    public function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

    public function setDescripcion($descripcion): void {
        $this->descripcion = $descripcion;
    }

    public function setDuracion($duracion): void {
        $this->duracion = $duracion;
    }

    // Método destructor
    public function __destruct() {
        
    }
}
