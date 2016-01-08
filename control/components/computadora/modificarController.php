<?php

require '../../../model/database/Conexion.php';
require '../../../model/components/Equipo.php';
require '../../../model/components/Computadora.php';
require '../../../model/components/manejadores/ManejadorComputadora.php';

if (isset($_POST['placa'])) {
    $manejadorComputadora = new ManejadorComputadora();
    $computadora = $manejadorComputadora->getComputadora($_POST['placa']);
    if ($computadora != false) {
        require '../../../web/componente/computadora/modificar.php';
    } else {
        echo '<script language="javascript">alert("No existe una computadora con esa placa.");'
        . 'window.location.href="../../../web/componente/computadora/modificarComputadora.php";</script>';
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

