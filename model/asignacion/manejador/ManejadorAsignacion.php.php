<?php

class ManejadorAsignacion extends Conexion {

    public function insertarAsignacion(Asignacion $asignacion) {
        try {

            $this->conectar();
            if ($stmt = $this->getConexion()->prepare('INSERT INTO Prestamo (placa, estado, idOficina, idPersona, fechaPrestamo, fechaDevolucion) '
                    . 'VALUES (?,?,?,?,?,?)')) {

                $stmt->bind_param('iiiiss', $asignacion->getPlaca(), $asignacion->getEstado(), $asignacion->getIdOficina()
                        , $asignacion->getIdPersona(), $asignacion->getFechaPrestamo(), $asignacion->getFechaDevolucion());
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

    private function getIdAsignacion($placa) {
        $idAsignacion = 0;
        $this->conectar();

        $sql = 'SELECT idPrestamo FROM Prestamo WHERE placa =  ' . $placa . ' AND estado = 1';
        $result = $this->getConexion()->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $idAsignacion = $row['idPrestamo'];
            }
            $this->cerrarConexion();
            return $idAsignacion;
        } else {
            $this->cerrarConexion();
            return $idAsignacion;
        }
    }

    public function getIdOficinaAsignacion($placa) {
        $this->conectar();
        $idOficina = 0;

        $sql = 'SELECT idOficina FROM Prestamo WHERE placa =  ' . $placa . ' AND estado = 1';
        $result = $this->getConexion()->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $idOficina = $row['idOficina'];
            }
            $this->cerrarConexion();
            return $idOficina;
        } else {
            $this->cerrarConexion();
            return $idOficina;
        }
    }

    public function deshabilitarAsignacion($placa, $fechaDevolucion) {
        $idAsignacion = $this->getIdAsignacion($placa);
        $this->conectar();
        $sql = 'UPDATE Prestamo Set estado = 0, fechaDevolucion = "' . $fechaDevolucion . '" WHERE idPrestamo = ' . $idAsignacion;

        if ($this->getConexion()->query($sql) === true) {
            $this->cerrarConexion();
            return true;
        } else {
            $this->cerrarConexion();
            return false;
        }
    }

}
