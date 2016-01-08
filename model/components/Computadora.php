<?php

class Computadora {

    private $tipo;
    private $procesador;
    private $cantMemoriaHhd;
    private $criterio;
    private $placa;

    public function __construct() {
        
    }
    function getPlaca() {
        return $this->placa;
    }

    function setPlaca($placa) {
        $this->placa = $placa;
    }

        public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setProcesador($procesador) {
        $this->procesador = $procesador;
    }

    public function getProcesador() {
        return $this->procesador;
    }

    public function setCantMemoriaHhd($cant) {
        $this->cantMemoriaHhd = $cant;
    }

    public function getCantMemoriaHhd() {
        return $this->cantMemoriaHhd;
    }

    public function setCriterio($criterio) {
        $this->criterio = $criterio;
    }

    public function getCriterio() {
        return $this->criterio;
    }

}
