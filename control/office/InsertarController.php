<?php

require '../../model/database/Conexion.php';
require '../../model/office/Oficina.php';
require '../../model/office/manejadores/ManejadorOficina.php';

if (isset($_POST['oficina']) && !empty($_POST['oficina']) &&
        isset($_POST['unidad']) && !empty($_POST['unidad'])) {

    $nombreOficina = $_POST['oficina'];
    $unidad = $_POST['unidad'];

    $manejadorOficina = new ManejadorOficina();
    $oficina = new Oficina();

    $oficina->setNombreOficina(mb_strtoupper($nombreOficina, 'UTF-8'));
    $oficina->setUnidad(mb_strtoupper($unidad, 'UTF-8'));

    $existeOficina = $manejadorOficina->existeNombreOficina($oficina->getNombreOficina());

    if ($existeOficina == false) {
        $inserto = $manejadorOficina->insertarOficina($oficina);
        if ($inserto) {
            echo '<script language="javascript">alert("Oficina guardad satisfactoriamente.");'
            . 'window.location.href="../../web/oficina/nuevo.php";</script>';
        } else {
            echo '<script language="javascript">alert("Error al guardar oficina.");'
            . 'window.location.href="../../web/oficina/nuevo.php";</script>';
        }
    } else {
        echo '<script language="javascript">alert("Esa oficina ya existe.");'
        . 'window.location.href="../../web/oficina/nuevo.php";</script>';
    }
} else {
    echo '<script language="javascript">alert("Algo salio mal");'
    . 'window.location.href="../../web/oficina/nuevo.php";</script>';
}



