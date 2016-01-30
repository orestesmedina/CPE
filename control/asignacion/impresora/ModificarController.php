<?php

require_once '../../../model/database/Conexion.php';
require_once '../../../model/person/Persona.php';
require_once '../../../model/asignacion/Asignacion.php';
require_once '../../../model/components/Impresora.php';
require_once '../../../model/components/Equipo.php';
require_once '../../../model/components/manejadores/ManejadorEquipo.php';
require_once '../../../model/person/manejadores/ManejadorPersona.php';
require_once '../../../model/components/manejadores/ManejadorImpresora.php';
require_once '../../../model/asignacion/manejador/ManejadorAsignacion.php.php';

if (isset($_POST['placa']) && !empty($_POST['placa']) &&
        isset($_POST['modelo']) && !empty($_POST['modelo']) &&
        isset($_POST['marca']) && !empty($_POST['marca']) &&
        isset($_POST['serie']) && !empty($_POST['serie']) &&
        isset($_POST['tipo']) && !empty($_POST['tipo']) &&
        isset($_POST['consumible']) && !empty($_POST['consumible']) &&
        isset($_POST['anioIngreso']) && !empty($_POST['anioIngreso']) &&
        isset($_POST['criterio']) && !empty($_POST['criterio']) &&
        isset($_POST['estado']) && !empty($_POST['estado']) &&
        isset($_POST['idOficina']) && !empty($_POST['idOficina']) &&
        isset($_POST['idPersona']) && !empty($_POST['idPersona']) &&
        isset($_POST['observacion']) && !empty($_POST['observacion'])) {

    $placa = $_POST['placa'];
    $modelo = mb_strtoupper($_POST['modelo'], 'UTF-8');
    $marca = mb_strtoupper($_POST['marca'], 'UTF-8');
    $serie = mb_strtoupper($_POST['serie'], 'UTF-8');
    $tipo = mb_strtoupper($_POST['tipo'], 'UTF-8');
    $consumible = mb_strtoupper($_POST['consumible'], 'UTF-8');
    $anioIngreso = $_POST['anioIngreso'];
    $criterio = mb_strtoupper($_POST['criterio'], 'UTF-8');
    $estado = mb_strtoupper($_POST['estado'], 'UTF-8');
    $observacion = mb_strtoupper($_POST['observacion'], 'UTF-8');
    $idOficina = $_POST['idOficina'];
    $nombrePersona = mb_strtoupper($_POST['idPersona'], 'UTF-8');
    $fecha = date('y-m-d');
    
    echo 'primer  ' . $consumible;

    $manejadorPersona = new ManejadorPersona();
    $manejadorImpresora = new ManejadorImpresora();
    $manejadorAsignacion = new ManejadorAsignacion();
    $persona = new Persona();


    $idPersona = $manejadorPersona->getIdPersona($nombre);

    if ($idPersona != false) {
        $persona->setIdPersona($idPersona);
        $persona->setNombrePersona($nombrePersona);
        $manejadorPersona->modificarPersona($persona);
    } else {
        $idPersona = $manejadorPersona->getIdPersona($nombrePersona);
    }

    $impresora = $manejadorImpresora->getImpresora($placa);
    if ($marca == $impresora['marca'] && $modelo == $impresora['modelo'] && $serie == $impresora['serie'] &&
            $tipo == $impresora['tipo'] && $consumible == $impresora['consumible'] &&
            $anioIngreso == $impresora['anioIngreso'] && $criterio == $impresora['criterio'] &&
            $estado == $impresora['estado'] && $observacion == $impresora['observacion']) {

        $idOficinaAsignacion = $manejadorAsignacion->getIdOficinaAsignacion($placa);
        if ($idOficinaAsignacion != $idOficina) {
            $asignacion = new Asignacion();
            $asignacion->setEstado(1);
            $asignacion->setFechaPrestamo($fecha);
            $asignacion->setIdOficina($idOficina);
            $asignacion->setIdPersona($idPersona);
            $asignacion->setPlaca($placa);

            if ($manejadorAsignacion->deshabilitarAsignacion($placa, $fecha)) {
                if ($manejadorAsignacion->insertarAsignacion($asignacion)) {
                    echo '<script language="javascript">alert("Asignación modificada correctamente.");'
                    . 'window.location.href="../../../web/asignacion/impresora/modificar.php";</script>';
                } else {
                    echo "<script> alert('No se pudo modificar correctamente.');</script>";
                }
            }
        }
    } else {
        $equipo = new Equipo();
        $manejadorEquipo = new ManejadorEquipo();
        $impresora = new Impresora();

        $equipo->setAnioIngreso($anioIngreso);
        $equipo->setCriterio($criterio);
        $equipo->setEstado($estado);
        $equipo->setMarca($marca);
        $equipo->setModelo($modelo);
        $equipo->setObservacion($observacion);
        $equipo->setSerie($serie);
        $equipo->setPlaca($placa);
echo 'ultimo  ' . $consumible;
        $impresora->setConsumible($consumible);
        $impresora->setTipo($tipo);
        $impresora->setPlaca($placa);


        if ($manejadorEquipo->modificarEquipo($equipo) === true) {

            if ($manejadorImpresora->modificarImpresora($impresora) === true) {

                $idOficinaAsignacion = $manejadorAsignacion->getIdOficinaAsignacion($placa);
                if ($idOficinaAsignacion != $idOficina) {

                    $asignacion = new Asignacion();
                    $asignacion->setEstado(1);
                    $asignacion->setFechaPrestamo($fecha);
                    $asignacion->setIdOficina($idOficina);
                    $asignacion->setIdPersona($idPersona);
                    $asignacion->setPlaca($placa);

                    if ($manejadorAsignacion->deshabilitarAsignacion($placa, $fecha)) {
                        if ($manejadorAsignacion->insertarAsignacion($asignacion)) {
                            echo '<script language="javascript">alert("Asignación modificada correctamente.");'
                            . 'window.location.href="../../../web/asignacion/impresora/modificar.php";</script>';
                        } else {
                            echo "<script> alert('No se pudo modificar correctamente.');</script>";
                        }
                    }
                } else {
                    echo '<script language="javascript">alert("Asignación modificada correctamente.");'
                    . 'window.location.href="../../../web/asignacion/impresora/modificar.php";</script>';
                }
            }
        }
    }
}
