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

}
