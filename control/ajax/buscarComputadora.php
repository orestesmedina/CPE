<?php

require '../../model/database/Conexion.php';
require '../../model/components/Equipo.php';
require '../../model/components/Computadora.php';
require '../../model/components/manejadores/ManejadorComputadora.php';
require '../../model/ajax/manejadores/manejadorAjax.php';


if (isset($_POST['placa']) && !empty($_POST['placa'])) {
    

    $manejadorAjax = new ManejadorAjax();
    $computadora = $manejadorAjax->buscarPrestamo($_POST['placa']);

    if ($computadora == null) {
        echo '<script> alert("Ese componente ya se encuentra en prestamo");</script>';
    } else {
        echo '<script> colocarDatosComputadora("' . $computadora->getModelo() .'", "'
                . $computadora->getSerie() . '", "'
                . $computadora->getMarca() . '", "'
                . $computadora->getAnioIngreso() . '", "'
                . $computadora->getProcesador() . '", "'
                . $computadora->getTipo() . '", "'
                . $computadora->getCantMemoriaHhd() . '", "'
                . $computadora->getCriterio() . '", "'
                . $computadora->getObservacion() . '", "'
                . $computadora->getEstado() . '");</script>';
        
    }
}
