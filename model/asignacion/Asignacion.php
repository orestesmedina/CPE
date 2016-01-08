<?php

class Asignacion {

    private $placa;
    private $idOficina;
    private $idPersona;
    private $fechaPrestamo;
    private $fechaDevolucion;
    private $estado;

    public function __construct() {
        
    }

    public function getPlaca() {
        return $this->placa;
    }

    public function getIdOficina() {
        return $this->idOficina;
    }

    public function getIdPersona() {
        return $this->idPersona;
    }

    public function getFechaPrestamo() {
        return $this->fechaPrestamo;
    }

    public function getFechaDevolucion() {
        return $this->fechaDevolucion;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setPlaca($placa) {
        $this->placa = $placa;
    }

    public function setIdOficina($idOficina) {
        $this->idOficina = $idOficina;
    }

    function setIdPersona($idPersona) {
        $this->idPersona = $idPersona;
    }

    public function setFechaPrestamo($fechaPrestamo) {
        $this->fechaPrestamo = $fechaPrestamo;
    }

    public function setFechaDevolucion($fechaDevolucion) {
        $this->fechaDevolucion = $fechaDevolucion;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function __destruct() {
        
    }

}
