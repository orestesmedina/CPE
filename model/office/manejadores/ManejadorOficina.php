<?php

class ManejadorOficina extends Conexion {

    public function __construct() {

        parent::__construct();
    }

    public function getOficinas() {

        $this->conectar();
        $query = "SELECT idOficina, nombreOficina FROM Oficina";
        $resultado = $this->getConexion()->query($query);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                echo '<option value="' . $row["idOficina"] . '">' . $row["nombreOficina"] . '</option>';
            }
        } else {
            echo "0 results";
        }

        $this->cerrarConexion();
    }

    public function existeNombreOficina($nombreOficina) {
        $this->conectar();
        $query = 'SELECT nombreOficina FROM Oficina WHERE nombreOficina = "' . $nombreOficina . '"';
        $result = $this->getConexion()->query($query);

        if ($result->num_rows > 0) {
            $this->cerrarConexion();
            return true;
        } else {
            $this->cerrarConexion();
            return false;
        }
    }

    public function insertarOficina(Oficina $oficina) {
        $this->conectar();
        $stmt = $this->getConexion()->prepare('INSERT INTO Oficina (nombreOficina, unidad) VALUES(?,?)');
        if ($stmt) {
            $stmt->bind_param('ss', $oficina->getNombreOficina(), $oficina->getUnidad());
            $stmt->execute();
            $stmt->close();
            $this->cerrarConexion();
            return true;
        } else {
            $this->cerrarConexion();
            return false;
        }
    }

    public function getIdOficina($nombreOficina) {
        $this->conectar();
        $query = 'SELECT idOficina FROM Oficina WHERE nombreOficina = "' . $nombreOficina . '"';
        $result = $this->getConexion()->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id = $row['idOficina'];
            $this->cerrarConexion();
            return $id;
        } else {
            $this->cerrarConexion();
            return 0;
        }
    }

    public function eliminarOfiina($idOficina) {
        $this->conectar();
        $sql = "DELETE FROM Oficina WHERE idOficina = " . $idOficina;

        if ($this->getConexion()->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

}
