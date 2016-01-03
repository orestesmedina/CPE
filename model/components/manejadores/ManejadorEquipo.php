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

    
    public function __destruct() {
        parent::__destruct();
    }
}