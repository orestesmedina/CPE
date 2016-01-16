<?php

require '../../../model/database/Conexion.php';
require '../../../model/asignacion/Asignacion.php';
require '../../../model/components/Equipo.php';
require '../../../model/components/Computadora.php';
require '../../../model/components/manejadores/ManejadorEquipo.php';
require '../../../model/person/manejadores/ManejadorPersona.php';
require '../../../model/asignacion/manejador/ManejadorAsignacion.php.php';
require '../../../model/components/manejadores/ManejadorComputadora.php';

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

    $placa = $_POST['placa'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $serie = $_POST['serie'];
    $tipo = $_POST['tipo'];
    $procesador = $_POST['procesador'];
    $cantMemoria = $_POST['cantMemoria'];
    $anioIngreso = $_POST['anioIngreso'];
    $criterio = $_POST['criterio'];
    $estado = $_POST['estado'];
    $observacion = $_POST['observacion'];
    $idOficina = $_POST['idOficina'];

    $manejadorEquipo = new ManejadorEquipo();
    $asignacion = new Asignacion();
    $manejadorPersona = new ManejadorPersona();
    $manejadorAsignacion = new ManejadorAsignacion();

    $asignacion->setPlaca($placa);
    $asignacion->setEstado(1);
    $asignacion->setIdOficina($idOficina);
    $asignacion->setFechaPrestamo(date('y-m-d'));

    $persona = $manejadorPersona->bucarPersonaPorNombre(mb_strtoupper($_POST['idPersona'], 'UTF-8'));
    if ($persona != false) {
        $asignacion->setIdPersona($persona);
    } else {
        $manejadorPersona->insertarPersona(mb_strtoupper($_POST['idPersona'], 'UTF-8'));
        $persona = $manejadorPersona->bucarPersonaPorNombre(mb_strtoupper($_POST['idPersona'], 'UTF-8'));
        $asignacion->setIdPersona($persona);
    }

    $existeEquipo = $manejadorEquipo->existeEquipoConTipo($placa, 'COMPUTADORA');
    if ($existeEquipo == true) {
        $insertar = $manejadorAsignacion->insertarAsignacion($asignacion);
        if ($insertar == true) {
            $ModificarEquipo = $manejadorEquipo->modificarEstadoCriterioObservacion(mb_strtoupper($estado, 'UTF-8'), mb_strtoupper($criterio, 'UTF-8'), mb_strtoupper($observacion, 'UTF-8'), $placa);
            echo '<script language="javascript">alert("Asignación realiazada satisfactoriamente.");'
            . 'window.location.href="../../../web/asignacion/computadora/nuevo.php";</script>';
        } else {
            echo '<script language="javascript">alert("Error al asignar computadora.");'
            . 'window.location.href="../../../web/asignacion/computadora/nuevo.php";</script>';
        }
    } else {
        $equipo = new Equipo();  
        $equipo->setPlaca($placa);
        $equipo->setAnioIngreso($anioIngreso);
        $equipo->setEstado(mb_strtoupper($estado, 'UTF-8'));
        $equipo->setMarca(mb_strtoupper($marca, 'UTF-8'));
        $equipo->setModelo(mb_strtoupper($modelo, 'UTF-8'));
        $equipo->setObservacion(mb_strtoupper($observacion, 'UTF-8'));
        $equipo->setSerie(mb_strtoupper($serie, 'UTF-8'));
        $equipo->setCriterio(mb_strtoupper($criterio, 'UTF-8'));
        $tipoEquipo = 'COMPUTADORA';
        
        $computadora = new Computadora();
        $computadora->setPlaca($placa);
        $computadora->setTipo(mb_strtoupper($tipo, 'UTF-8'));
        $computadora->setCantMemoriaHhd(mb_strtoupper($cantMemoria, 'UTF-8'));
        
        $computadora->setProcesador(mb_strtoupper($procesador, 'UTF-8'));
        
        $manejadorComputadora = new ManejadorComputadora();
        
        if ($manejadorEquipo->insertarEquipo($equipo, $tipoEquipo)) {
            if ($manejadorComputadora->insertarComputadora($computadora)) {
                if ($manejadorAsignacion->insertarAsignacion($asignacion)) {
                    echo '<script language="javascript">alert("Asignación realiazada satisfactoriamente.");'
                    . 'window.location.href="../../../web/asignacion/computadora/nuevo.php";</script>';
                } else {
                    echo '<script language="javascript">alert("Error al guardar, presta.");'
                    . 'window.location.href="../../../web/asignacion/computadora/nuevo.php";</script>';
                }
            } else {
                echo '<script language="javascript">alert("Error al guardar, computadora.");'
                . 'window.location.href="../../../web/asignacion/computadora/nuevo.php";</script>';
            }
        } else {
            echo '<script language="javascript">alert("Error al guardar, el nuevo equipo.");'
            . 'window.location.href="../../../web/asignacion/computadora/nuevo.php";</script>';
        }
    }
} else {
    echo '<script language="javascript">alert("Algo salio mal");'
    . 'window.location.href="../../../web/asignacion/computadora/nuevo.php";</script>';
}



