<?php

class Proyector {

    private $funcionalidad;
    private $placa;

    public function __construct() {
        
    }

    function getPlaca() {
        return $this->placa;
    }

    function setPlaca($placa) {
        $this->placa = $placa;
    }

    public function setFuncionalidad($funcionalidad) {
        $this->funcionalidad = $funcionalidad;
    }

    public function getFuncionalidad() {
        return $this->funcionalidad;
    }

}
