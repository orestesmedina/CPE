<?php

class ManejadorPersona extends Conexion {

    public function getIdPersona($nombre) {
        $this->conectar();
        $sql = "SELECT idPersona FROM Persona WHERE nombrePersona = '" . $nombre . "'";
        $result = $this->getConexion()->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $idPersona = $row['idPersona'];
            $this->cerrarConexion();
            return $idPersona;
        } else {
            $this->cerrarConexion();
            return false;
        }
    }

    public function insertarPersona($nombre) {
        $this->conectar();
        if($stmt = $this->getConexion()->prepare('INSERT INTO Persona (nombrePersona) VALUES (?)')){
            $stmt->bind_param('s', $nombre);
            $stmt->execute();
            $stmt->close();
            $this->cerrarConexion();
        } else {
            $this->cerrarConexion();
        }
    }
    
    public function modificarPersona(Persona $persona) {
        $this->conectar();
        if($stmt = $this->getConexion()->prepare('UPDATE Persona SET nombrePersona = ? WHERE idPersona = ?')) {
            $stmt->bind_param('si', $persona->getNombrePersona(), $persona->getIdPersona());
            $stmt->execute();
            $stmt->close();
            $this->cerrarConexion();
        } else {
            $this->cerrarConexion();
        }
    }

}
