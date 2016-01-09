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
        
        if($stmt) {
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
                . 'Equipo.estado, Equipo.observacion, Equipo.anio_ingreso, Impresora.consumible, Impresora.tipo'
                . ' FROM Impresora, Equipo WHERE Equipo.placa = Impresora.placa and Equipo.placa = ?');
        if ($stmt) {
            $stmt->bind_param('i', $placa);
            $stmt->execute();

            $stmt->bind_result($pla, $marca, $modelo, $serie, $estado, $observacion, $anioIngreso, $consumible, $tipo);
            $stmt->fetch();

            $telefono['placa'] = $pla;
            $telefono['marca'] = $marca;
            $telefono['modelo'] = $modelo;
            $telefono['serie'] = $serie;
            $telefono['estado'] = $estado;
            $telefono['anioIngreso'] = $anioIngreso;
            $telefono['observacion'] = $observacion;
            $telefono['consumible'] = $consumible;
            $telefono['tipo'] = $tipo;
            $this->cerrarConexion();
            $stmt->close();
            return $telefono;
        }

        $stmt->close();
        $this->cerrarConexion();
        return false;
    }

    public function modificarImpresora($placa, $criterio, $estado, $observacion) {

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
