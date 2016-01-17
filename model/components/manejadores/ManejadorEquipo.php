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

    public function modificarEstadoCriterioObservacion($estado, $criterio, $observacion, $placa) {
        $this->conectar();
        $stmt = $this->getConexion()->prepare('UPDATE Equipo set estado = ?, criterio = ?, observacion = ? WHERE placa = ?');

        if ($stmt) {
            $stmt->bind_param('sssi', $estado, $criterio, $observacion, $placa);
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
        $stmt = $this->getConexion()->prepare('INSERT INTO Equipo (placa, serie, marca, modelo, estado, criterio, anio_ingreso, observacion, tipoEquipo) '
                . 'VALUES (?,?,?,?,?,?,?,?,?)');
        if ($stmt) {
            $stmt->bind_param('isssssiss', $equipo->getPlaca(), $equipo->getSerie(), $equipo->getMarca(), $equipo->getModelo(), $equipo->getEstado(), $equipo->getCriterio(), $equipo->getAnioIngreso(), $equipo->getObservacion(), $tipo);
            $stmt->execute();
            $stmt->close();
            $this->cerrarConexion();
            return true;
        } else {
            $this->cerrarConexion();
            return false;
        }
    }

    public function getAsignacion($placa) {
        $this->conectar();
        if ($stmt = $this->getConexion()->prepare('SELECT Prestamo.idOficina, Persona.nombrePersona FROM Prestamo, Persona '
                . 'WHERE Prestamo.placa = ? and Prestamo.idPersona = Persona.idPersona and Prestamo.estado = 1')) {
            $stmt->bind_param('i', $placa);
            $stmt->execute();

            $stmt->bind_result($idOficina, $nombrePersona);
            $stmt->fetch();

            $asignacion['idOficina'] = $idOficina;
            $asignacion['nombrePersona'] = $nombrePersona;

            $this->cerrarConexion();
            $stmt->close();
            return $asignacion;
        }
    }

    function __destruct() {
        parent::__destruct();
    }

}
