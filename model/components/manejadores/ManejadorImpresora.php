<?php

class ManejadorImpresora extends Conexion {

    public function __construct() {
        parent::__construct();
    }

    public function isImpresora($placa) {
        $this->conectar();
        $sql = 'SELECT placa FROM Impresora WHERE placa = ' . $placa;
        $result = $this->getConexion()->query($sql);
        if ($result->num_rows > 0) {
            $this->cerrarConexion();
            return true;
        } else {
            $this->cerrarConexion();
            return false;
        }
    }

    public function modificarTipoConsumible($tipo, $consumible, $placa) {
        $this->conectar();
        $stmt = $this->getConexion()->prepare('UPDATE Impresora set tipo = ?, set consumible = ? WHERE placa = ?');

        if ($stmt) {
            $stmt->bind_param('ssi', $tipo, $consumible, $placa);
            $stmt->execute();
            $stmt->close();
            $this->cerrarConexion();
            return true;
        } else {
            $this->cerrarConexion();
            return false;
        }
    }

    public function insertarImpresora(Impresora $impresora) {
        try {

            $this->conectar();

            if ($stmt = $this->getConexion()->prepare('INSERT INTO Impresora (placa, consumible, tipo) '
                    . 'VALUES (?,?, ?)')) {
                $stmt->bind_param('iss', $impresora->getPlaca(), $impresora->getConsumible(), $impresora->getTipo());
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

    public function getImpresora($placa) {

        $this->conectar();
        $stmt = $this->getConexion()->prepare('SELECT Equipo.placa, Equipo.marca, Equipo.modelo, Equipo.serie,'
                . 'Equipo.estado, Equipo.observacion, Equipo.anio_ingreso, Impresora.consumible, Impresora.tipo, Equipo.criterio'
                . ' FROM Impresora, Equipo WHERE Equipo.placa = Impresora.placa and Equipo.placa = ?');
        if ($stmt) {
            $stmt->bind_param('i', $placa);
            $stmt->execute();

            $stmt->bind_result($pla, $marca, $modelo, $serie, $estado, $observacion, $anioIngreso, $consumible, $tipo, $criterio);
            $stmt->fetch();

            $impresora['placa'] = $pla;
            $impresora['marca'] = $marca;
            $impresora['modelo'] = $modelo;
            $impresora['serie'] = $serie;
            $impresora['estado'] = $estado;
            $impresora['anioIngreso'] = $anioIngreso;
            $impresora['observacion'] = $observacion;
            $impresora['consumible'] = $consumible;
            $impresora['tipo'] = $tipo;
            $impresora['criterio'] = $criterio;
            $this->cerrarConexion();
            $stmt->close();
            return $impresora;
        }

        $stmt->close();
        $this->cerrarConexion();
        return false;
    }

    public function modificarImpresora(Impresora $impresora) {
        $this->conectar();
        $sql = "UPDATE Impresora SET consumible = '" . $impresora->getConsumible() . "', tipo = '" . $impresora->getTipo() . "' WHERE placa = " . $impresora->getPlaca();
        if ($this->getConexion()->query($sql) === TRUE) {
            $this->cerrarConexion();
            return true;
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
