<?php

class ManejadorComputadora extends Conexion {

    public function __construct() {
        parent::__construct();
    }

    public function insertarComputadora(Computadora $computadora) {
        try {

            $this->conectar();

            if ($stmt = $this->getConexion()->prepare('INSERT INTO Computadora (placa, tipo, procesador, cant_memoria_hhd, criterio) '
                    . 'VALUES (?,?,?,?,?)')) {
                $stmt->bind_param('issss', $computadora->getPlaca(), $computadora->getTipo(), $computadora->getProcesador(), $computadora->getCantMemoriaHhd(), $computadora->getCriterio());
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

    public function isComputadora($placa) {
        $this->conectar();
        $sql = 'SELECT placa FROM Computadora WHERE placa = ' . $placa;
        $result = $this->getConexion()->query($sql);
        if ($result->num_rows > 0) {
            $this->cerrarConexion();
            return true;
        } else {
            $this->cerrarConexion();
            return false;
        }
    }

    public function buscarComputadora($placa) {

        $this->conectar();
        if ($stmt = $this->getConexion()->prepare('SELECT Equipo.placa, Equipo.marca, Equipo.modelo, Equipo.serie,'
                . 'Equipo.estado, Equipo.observacion, Equipo.anio_ingreso,'
                . 'Computadora.procesador, Computadora.cant_memoria_hhd, Computadora.criterio, Computadora.tipo'
                . ' FROM Computadora, Equipo WHERE Equipo.placa = Computadora.placa and Equipo.placa = ?')) {
            $stmt->bind_param('i', $placa);
            $stmt->execute();

            $stmt->bind_result($pla, $marca, $modelo, $serie, $estado, $observacion, $anioIngreso, $procesador, $cantMemoria, $criterio, $tipo);
            $computadora = new Computadora();
            $stmt->fetch();

            $computadora->setPlaca($pla);
            $computadora->setMarca($marca);
            $computadora->setModelo($modelo);
            $computadora->setSerie($serie);
            $computadora->setCantMemoriaHhd($cantMemoria);
            $computadora->setCriterio($criterio);
            $computadora->setEstado($estado);
            $computadora->setAnioIngreso($anioIngreso);
            $computadora->setObservacion($observacion);
            $computadora->setProcesador($procesador);
            $computadora->setTipo($tipo);
            $this->cerrarConexion();
            $stmt->close();
            return $computadora;
        }

        $stmt->close();
        $this->cerrarConexion();
        return false;
    }

    public function modificarComputadora($placa, $criterio, $estado, $observacion) {

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
        /*
          if($stmt = $this->getConexion()->prepare('UPDATE Equipo SET observacion = ?, estado = ? WHERE placa = ?')){
          $stmt->bind_param('ssi', $observacion, $estado, $placa);
          $stmt->execute();
          $stmt->close();
          $retornar = true;
          }

          if($stmt = $this->getConexion()->prepare('UPDATE Computadora SET criterio= ? WHERE placa = ?')){
          $stmt->bind_param('si', $criterio, $placa);
          $stmt->execute();
          $stmt->close();
          $retornar = true;
          } */
        $this->cerrarConexion();
    }

    public function __destruct() {
        parent::__destruct();
    }

}
