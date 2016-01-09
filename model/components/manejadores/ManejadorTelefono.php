<?php

class ManejadorTelefono extends Conexion {

    public function __construct() {
        parent::__construct();
    }

    public function isTelefono($placa) {
        $this->conectar();
        $sql = 'SELECT placa FROM Telefonia WHERE placa = ' . $placa;
        $result = $this->getConexion()->query($sql);
        if ($result->num_rows > 0) {
            $this->cerrarConexion();
            return true;
        } else {
            $this->cerrarConexion();
            return false;
        }
    }
    
    public function modificarExtension($extension, $placa) {
        $this->conectar();
        $stmt = $this->getConexion()->prepare('UPDATE Telefonia set extension = ? WHERE placa = ?');
        
        if($stmt) {
            $stmt->bind_param('si', $extension, $placa);
            $stmt->execute();
            $stmt->close();
            $this->cerrarConexion();
            return true;
        } else {
            $this->cerrarConexion();
            return false;
        }
    }

    public function insertarTelefono(Telefono $telefono) {
        try {

            $this->conectar();

            if ($stmt = $this->getConexion()->prepare('INSERT INTO Telefonia (placa, extension) '
                    . 'VALUES (?,?)')) {
                $stmt->bind_param('is', $telefono->getPlaca(), $telefono->getExtension());
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

    public function getTelefono($placa) {

        $this->conectar();
        $stmt = $this->getConexion()->prepare('SELECT Equipo.placa, Equipo.marca, Equipo.modelo, Equipo.serie,'
                . 'Equipo.estado, Equipo.observacion, Equipo.anio_ingreso, Telefonia.extension'
                . ' FROM Telefonia, Equipo WHERE Equipo.placa = Telefonia.placa and Equipo.placa = ?');
        if ($stmt) {
            $stmt->bind_param('i', $placa);
            $stmt->execute();

            $stmt->bind_result($pla, $marca, $modelo, $serie, $estado, $observacion, $anioIngreso, $extension);
            $stmt->fetch();

            $telefono['placa'] = $pla;
            $telefono['marca'] = $marca;
            $telefono['modelo'] = $modelo;
            $telefono['serie'] = $serie;
            $telefono['estado'] = $estado;
            $telefono['anioIngreso'] = $anioIngreso;
            $telefono['observacion'] = $observacion;
            $telefono['extension'] = $extension;
            $this->cerrarConexion();
            $stmt->close();
            return $telefono;
        }

        $stmt->close();
        $this->cerrarConexion();
        return false;
    }

    public function modificarTelefono($placa, $criterio, $estado, $observacion) {

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
