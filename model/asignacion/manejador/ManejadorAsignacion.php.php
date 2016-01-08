<?php

class ManejadorAsignacion extends Conexion {

    public function insertarAsignacion(Asignacion $prestamo) {
        try {

            $this->conectar();
            if ($stmt = $this->getConexion()->prepare('INSERT INTO Prestamo (placa, estado, idOficina, idPersona, fechaPrestamo, fechaDevolucion) '
                    . 'VALUES (?,?,?,?,?,?)')) {

                $stmt->bind_param('iiiiss', $prestamo->getPlaca(), $prestamo->getEstado(), $prestamo->getIdOficina()
                        , $prestamo->getIdPersona(), $prestamo->getFechaPrestamo(), $prestamo->getFechaDevolucion());
                $stmt->execute();
                $stmt->close();
                $this->cerrarConexion();
                return true;
            } else {
                return false;
            }
            
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

}
