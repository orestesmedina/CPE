<?php

class Equipo {

    private $placa;
    private $modelo;
    private $marca;
    private $serie;
    private $observacion;
    private $estado;
    private $anioIngreso;
    private $criterio;

    public function __construct() {
        
    }

    public function setPlaca($placa) {
        $this->placa = $placa;
    }

    public function getPlaca() {
        return $this->placa;
    }
    
    function getCriterio() {
        return $this->criterio;
    }

    function setCriterio($criterio) {
        $this->criterio = $criterio;
    }

    
    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function setSerie($serie) {
        $this->serie = $serie;
    }

    public function getSerie() {
        return $this->serie;
    }

    public function setObservacion($observacion) {
        $this->observacion = $observacion;
    }

    public function getObservacion() {
        return $this->observacion;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setAnioIngreso($anio) {
        $this->anioIngreso = $anio;
    }

    public function getAnioIngreso() {
        return $this->anioIngreso;
    }

}
