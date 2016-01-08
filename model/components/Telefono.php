<?php

class Telefono {

    private $extension;
    private $placa;

    public function __construct() {
        
    }

    function getPlaca() {
        return $this->placa;
    }

    function setPlaca($placa) {
        $this->placa = $placa;
    }

    public function setExtension($extension) {
        $this->extension = $extension;
    }

    public function getExtension() {
        return $this->extension;
    }

}
