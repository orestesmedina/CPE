<?php

class ManejadorProyector extends Conexion {

    public function __construct() {
        parent::__construct();
    }

    public function isProyector($placa) {
        $this->conectar();
        $sql = 'SELECT placa FROM Proyector WHERE placa = ' . $placa;
        $result = $this->getConexion()->query($sql);
        if ($result->num_rows > 0) {
            $this->cerrarConexion();
            return true;
        } else {
            $this->cerrarConexion();
            return false;
        }
    }

    public function modificarFuncionalidad($funcionalidad, $placa) {
        $this->conectar();
        $stmt = $this->getConexion()->prepare('UPDATE Proyector set funcionalidad = ? WHERE placa = ?');

        if ($stmt) {
            $stmt->bind_param('si', $funcionalidad, $placa);
            $stmt->execute();
            $stmt->close();
            $this->cerrarConexion();
            return true;
        } else {
            $this->cerrarConexion();
            return false;
        }
    }

    public function insertarProyector(Proyector $proyector) {
        try {

            $this->conectar();

            if ($stmt = $this->getConexion()->prepare('INSERT INTO Proyector (placa, funcionalidad) '
                    . 'VALUES (?,?)')) {
                $stmt->bind_param('is', $proyector->getPlaca(), $proyector->getFuncionalidad());
                $stmt->execute();
                $stmt->close();
                $this->cerrarConexion();
                return true;
            } else {
                $this->cerrarConexion();
                return false;
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    public function getProyector($placa) {

        $this->conectar();
        $stmt = $this->getConexion()->prepare('SELECT Equipo.placa, Equipo.marca, Equipo.modelo, Equipo.serie,'
                . 'Equipo.estado, Equipo.observacion, Equipo.anio_ingreso, Proyector.funcionalidad, Equipo.criterio'
                . ' FROM Proyector, Equipo WHERE Equipo.placa = Proyector.placa and Equipo.placa = ?');
        if ($stmt) {
            $stmt->bind_param('i', $placa);
            $stmt->execute();

            $stmt->bind_result($pla, $marca, $modelo, $serie, $estado, $observacion, $anioIngreso, $funcionalidad, $criterio);
            $stmt->fetch();

            $proyector['placa'] = $pla;
            $proyector['marca'] = $marca;
            $proyector['modelo'] = $modelo;
            $proyector['serie'] = $serie;
            $proyector['estado'] = $estado;
            $proyector['anioIngreso'] = $anioIngreso;
            $proyector['observacion'] = $observacion;
            $proyector['funcionalidad'] = $funcionalidad;
            $proyector['criterio'] = $criterio;
            $this->cerrarConexion();
            $stmt->close();
            return $proyector;
        }

        $stmt->close();
        $this->cerrarConexion();
        return false;
    }

    public function modificarProyector($placa, $criterio, $estado, $observacion) {

        $this->conectar();
        $sql = "UPDATE Equipo SET observacion = '" . $observacion . "', estado = '" . $estado . "' WHERE placa = " . $placa;

        if ($this->getConexion()->query($sql) === TRUE) {

            $sql = "UPDATE Computadora SET criterio = '" . $criterio . "' WHERE placa = " . $placa;

            if ($this->getConexion()->query($sql) === TRUE) {
                $this->cerrarConexion();
                return true;
            } else {
                $this->cerrarConexion();
                return false;
            }
        } else {
            $this->cerrarConexion();
            return false;
        }

        $this->cerrarConexion();
    }

    public function __destruct() {
        parent::__destruct();
    }

}
