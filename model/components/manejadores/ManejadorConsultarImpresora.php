<?php
require '../../../model/database/Conexion.php';
$conexion = new Conexion();


$conexion->conectar();
$sql = 'select Equipo.placa, Equipo.marca, Equipo.modelo, Equipo.serie, Impresora.tipo, Impresora.consumible, Oficina.nombreOficina, Equipo.estado'
        . ' from Equipo, Oficina, Prestamo, Impresora'
        . ' where Equipo.placa = Prestamo.placa and Oficina.idOficina = Prestamo.idOficina and Impresora.placa = Equipo.placa and Prestamo.estado = 1';
$result = $conexion->getConexion()->query($sql);

if ($result->num_rows > 0) {
    $json = array();
    while ($row = $result->fetch_assoc()) {

        $json[] = array(
            'placa' => $row['placa'],
            'marca' => $row['marca'],
            'modelo' => $row['modelo'],
            'serie' => $row['serie'],
            'tipo' => $row['tipo'],
            'consumible' => $row['consumible'],
            'oficina' => $row['nombreOficina'],
            'estado' => $row['estado']
                
        );
    }
}

$conexion->cerrarConexion();
$json['success'] = true;
echo json_encode($json);

