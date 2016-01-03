<?php

class Persona {

    private $idPersona;
    private $nombrePersona;

    public function __construct() {
        
    }
    
    function getIdPersona() {
        return $this->idPersona;
    }

    function getNombrePersona() {
        return $this->nombrePersona;
    }

    function setIdPersona($idPersona) {
        $this->idPersona = $idPersona;
    }

    function setNombrePersona($nombrePersona) {
        $this->nombrePersona = $nombrePersona;
    }
}
