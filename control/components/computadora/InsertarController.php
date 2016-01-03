<?php

require '../../../model/database/Conexion.php';
require '../../../model/components/Equipo.php';
require '../../../model/components/Computadora.php';
require '../../../model/components/manejadores/ManejadorComputadora.php';
require '../../../model/person/manejadores/ManejadorPersona.php';

if (isset($_POST['placa']) && !empty($_POST['placa']) &&
        isset($_POST['modelo']) && !empty($_POST['modelo']) &&
        isset($_POST['marca']) && !empty($_POST['marca']) &&
        isset($_POST['serie']) && !empty($_POST['serie']) &&
        isset($_POST['tipo']) && !empty($_POST['tipo']) &&
        isset($_POST['procesador']) && !empty($_POST['procesador']) &&
        isset($_POST['cantMemoria']) && !empty($_POST['cantMemoria']) &&
        isset($_POST['anioIngreso']) && !empty($_POST['anioIngreso']) &&
        isset($_POST['criterio']) && !empty($_POST['criterio']) &&
        isset($_POST['estado']) && !empty($_POST['estado']) &&
        isset($_POST['idOficina']) && !empty($_POST['idOficina']) &&
        isset($_POST['idPersona']) && !empty($_POST['idPersona']) &&
        isset($_POST['observacion']) && !empty($_POST['observacion'])) {

    $computadora = new Computadora();
    $manejadorPersona = new ManejadorPersona();
    $persona = $manejadorPersona->bucarPersonaPorNombre(mb_strtoupper($_POST['idPersona'], 'UTF-8'));
    if ($persona != false) {
        $computadora->setIdPersona($persona);
    } else {
        $manejadorPersona->insertarPersona(mb_strtoupper($_POST['idPersona'], 'UTF-8'));
        $persona = $manejadorPersona->bucarPersonaPorNombre(mb_strtoupper($_POST['idPersona'], 'UTF-8'));
        $computadora->setIdPersona($persona);
    }

    $computadora->setAnioIngreso($_POST['anioIngreso']);
    $computadora->setCantMemoriaHhd(mb_strtoupper($_POST['cantMemoria'], 'UTF-8'));
    $computadora->setCriterio(mb_strtoupper($_POST['criterio'], 'UTF-8'));
    $computadora->setEstado(mb_strtoupper($_POST['estado'], 'UTF-8'));
    $computadora->setIdOficina($_POST['idOficina']);
    $computadora->setMarca(mb_strtoupper($_POST['marca'], 'UTF-8'));
    $computadora->setModelo(mb_strtoupper($_POST['modelo'], 'UTF-8'));
    $computadora->setObservacion(mb_strtoupper($_POST['observacion'], 'UTF-8'));
    $computadora->setPlaca($_POST['placa']);
    $computadora->setProcesador(mb_strtoupper($_POST['procesador'], 'UTF-8'));
    $computadora->setSerie(mb_strtoupper($_POST['serie'], 'UTF-8'));
    $computadora->setTipo(mb_strtoupper($_POST['tipo'], 'UTF-8'));

    $manejadorComputadora = new ManejadorComputadora();
    if ($manejadorComputadora->insertarComputadora($computadora)) {
        echo '<script language="javascript">alert("Registro guardado correctamente.");'
        . 'window.location.href="../../../web/componente/computadora/nuevaComputadora.php";</script>';
    } else {
        echo '<script language="javascript">alert("Error al guardar, ya existe una computadora con la misma placa.");'
        . 'window.location.href="../../../web/componente/computadora/nuevaComputadora.php";</script>';
    }
}



