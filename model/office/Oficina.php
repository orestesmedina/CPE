<?php

class Oficina {

    private $nombreOficina;
    private $unidad;

    public function __construct() {
        
    }

    public function setNombreOficina($nombre) {
        $this->nombreOficina = $nombre;
    }

    public function getNombreOficina() {
        return $this->nombreOficina;
    }

    public function setUnidad($unidad) {
        $this->unidad = $unidad;
    }

    public function getUnidad() {
        return $this->unidad;
    }

}
