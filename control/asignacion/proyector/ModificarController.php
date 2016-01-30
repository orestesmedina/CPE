<?php

require_once '../../../model/database/Conexion.php';
require_once '../../../model/person/Persona.php';
require_once '../../../model/asignacion/Asignacion.php';
require_once '../../../model/components/Proyector.php';
require_once '../../../model/components/Equipo.php';
require_once '../../../model/components/manejadores/ManejadorEquipo.php';
require_once '../../../model/person/manejadores/ManejadorPersona.php';
require_once '../../../model/components/manejadores/ManejadorProyector.php';
require_once '../../../model/asignacion/manejador/ManejadorAsignacion.php.php';

if (isset($_POST['placa']) && !empty($_POST['placa']) &&
        isset($_POST['modelo']) && !empty($_POST['modelo']) &&
        isset($_POST['marca']) && !empty($_POST['marca']) &&
        isset($_POST['serie']) && !empty($_POST['serie']) &&
        isset($_POST['funcionalidad']) && !empty($_POST['funcionalidad']) &&
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
    $funcionalidad = mb_strtoupper($_POST['funcionalidad'], 'UTF-8');
    $anioIngreso = $_POST['anioIngreso'];
    $criterio = mb_strtoupper($_POST['criterio'], 'UTF-8');
    $estado = mb_strtoupper($_POST['estado'], 'UTF-8');
    $observacion = mb_strtoupper($_POST['observacion'], 'UTF-8');
    $idOficina = $_POST['idOficina'];
    $nombrePersona = mb_strtoupper($_POST['idPersona'], 'UTF-8');
    $fecha = date('y-m-d');

    $manejadorPersona = new ManejadorPersona();
    $manejadorProyector= new ManejadorProyector();
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

    $proyector = $manejadorProyector->getProyector($placa);
    if ($marca == $proyector['marca'] && $modelo == $proyector['modelo'] && $serie == $proyector['serie'] &&
            $consumible == $proyector['funcionalidad'] &&
            $anioIngreso == $proyector['anioIngreso'] && $criterio == $proyector['criterio'] &&
            $estado == $proyector['estado'] && $observacion == $proyector['observacion']) {

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
                    . 'window.location.href="../../../web/asignacion/proyector/modificar.php";</script>';
                } else {
                    echo "<script> alert('No se pudo modificar correctamente.');</script>";
                }
            }
        }
    } else {
        $equipo = new Equipo();
        $manejadorEquipo = new ManejadorEquipo();
        $proyector = new Proyector();

        $equipo->setAnioIngreso($anioIngreso);
        $equipo->setCriterio($criterio);
        $equipo->setEstado($estado);
        $equipo->setMarca($marca);
        $equipo->setModelo($modelo);
        $equipo->setObservacion($observacion);
        $equipo->setSerie($serie);
        $equipo->setPlaca($placa);

        $proyector->setFuncionalidad($funcionalidad);
        $proyector->setPlaca($placa);


        if ($manejadorEquipo->modificarEquipo($equipo) === true) {

            if ($manejadorProyector->modificarProyector($proyector) === true) {

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
                            . 'window.location.href="../../../web/asignacion/proyector/modificar.php";</script>';
                        } else {
                            echo "<script> alert('No se pudo modificar correctamente.');</script>";
                        }
                    }
                } else {
                    echo '<script language="javascript">alert("Asignación modificada correctamente.");'
                    . 'window.location.href="../../../web/asignacion/proyector/modificar.php";</script>';
                }
            }
        }
    }
}
