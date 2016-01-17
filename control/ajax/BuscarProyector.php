<?php

require '../../model/database/Conexion.php';
require '../../model/components/Equipo.php';
require '../../model/components/Computadora.php';
require '../../model/components/manejadores/ManejadorComputadora.php';
require '../../model/components/manejadores/ManejadorEquipo.php';
require '../../model/components/manejadores/ManejadorImpresora.php';
require '../../model/components/manejadores/ManejadorProyector.php';
require '../../model/components/manejadores/ManejadorTelefono.php';
require '../../model/ajax/manejadores/manejadorAjax.php';


if (isset($_POST['placa']) && !empty($_POST['placa'])
        && isset($_POST['accion']) && !empty($_POST['accion'])) {
    
$accion = $_POST['accion'];
    $manejadorAjax = new ManejadorAjax();
    $computadora = $manejadorAjax->buscarAsignacionProyector($_POST['placa'], $accion);

}
