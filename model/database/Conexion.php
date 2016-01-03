<?php

abstract class Conexion {

    protected $password;
    protected $userName;
    protected $serverName;
    protected $dbName;
    protected $conexion;

    public function __construct() {
        $this->dbName = 'CPE';
        $this->serverName = 'localhost';
        $this->userName = 'root';
        $this->password = 'orestes';
    }

    public function conectar() {
        $this->conexion = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);
        if ($this->conexion->connect_error) {
            die("Error al conectar a la base de datos: " . $this->conexion->connect_error);
        }
    }

    public function cerrarConexion() {
        $this->conexion->close();
    }

    public function getConexion() {
        return $this->conexion;
    }

}
