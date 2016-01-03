<?php

class ManejadorAjax extends Conexion {

    public function buscarPrestamo($placa) {
        $this->conectar();
        $sql = 'SELECT placa, tipoEquipo FROM Prestamo WHERE placa = ' . $placa . ' and estado = 1 ';
       
        $result = $this->getConexion()->query($sql);
        
        if ($result->num_rows > 0) {
            $this->cerrarConexion();
            return null;
        } else {
            $this->cerrarConexion();
                $manejadorComputadora = new ManejadorComputadora();
                $computadora = $manejadorComputadora->buscarComputadora($placa);
                
                return $computadora;
        }
    }

}
