<?php

class Impresora {

    private $tipo;
    private $consumible;
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

    public function setConsumible($consumible) {
        $this->consumible = $consumible;
    }

    public function getConsumible() {
        return $this->consumible;
    }

}
