<?php

class ManejadorEquipo extends Conexion {

    public function __construct() {
        parent::__construct();
    }

    public function existeEquipo($placa) {
        $this->conectar();
        $sql = 'SELECT placa FROM Equipo WHERE placa =' . $placa;
        $result = $this->getConexion()->query($sql);
        if ($result->num_rows > 0) {
            $this->cerrarConexion();
            return true;
        } else {
            $this->cerrarConexion();
            return false;
        }
    }

    public function existeEquipoConTipo($placa, $tipoEquipo) {
        $this->conectar();
        $sql = "SELECT placa FROM Equipo WHERE placa = " . $placa . " and tipoEquipo = '" . $tipoEquipo . "' ";
        $result = $this->getConexion()->query($sql);
        if ($result->num_rows > 0) {
            $this->cerrarConexion();
            return true;
        } else {
            $this->cerrarConexion();
            return false;
        }
    }

    public function modificarEstadoObservacion($estado, $observacion, $placa) {
        $this->conectar();
        $stmt = $this->getConexion()->prepare('UPDATE Equipo set estado = ?, observacion = ? WHERE placa = ?');
        
        if($stmt) {
            $stmt->bind_param('ssi', $estado, $observacion, $placa);
            $stmt->execute();
            $stmt->close();
            $this->cerrarConexion();
            return true;
        } else {
            $this->cerrarConexion();
            return false;
        }
    }

    public function insertarEquipo(Equipo $equipo, $tipo) {

        $this->conectar();
        $stmt = $this->getConexion()->prepare('INSERT INTO Equipo (placa, serie, marca, modelo, estado, anio_ingreso, observacion, tipoEquipo) '
                . 'VALUES (?,?,?,?,?,?,?,?)');
        if ($stmt) {
            $stmt->bind_param('issssiss', $equipo->getPlaca(), $equipo->getSerie(), $equipo->getMarca(), $equipo->getModelo(), $equipo->getEstado(), $equipo->getAnioIngreso(), $equipo->getObservacion(), $tipo);
            $stmt->execute();
            $stmt->close();
            $this->cerrarConexion();
            return true;
        } else {
            $this->cerrarConexion();
            return false;
        }
    }

    function __destruct() {
        parent::__destruct();
    }

}
