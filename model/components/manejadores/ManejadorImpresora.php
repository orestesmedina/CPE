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


    public function __destruct() {
        parent::__destruct();
    }

}
