<?php

class ManejadorAjax extends Conexion {

    public function buscarPrestamoComputadora($placa) {
        $this->conectar();
        $sql = 'SELECT placa FROM Prestamo WHERE placa = ' . $placa . ' and estado = 1 ';

        $result = $this->getConexion()->query($sql);

        if ($result->num_rows > 0) {
            $this->cerrarConexion();
            echo '<script>limpiarCampos();</script>';
            echo '<script>desabilitarCampos();</script>';
            $this->imprimirMensaje("El componente ya se encuentra asignado.");
        } else {
            $this->cerrarConexion();
            $manejadorEquipo = new ManejadorEquipo();
            if ($manejadorEquipo->existeEquipo($placa) == true) {
                $manejadorComputadora = new ManejadorComputadora();
                if ($manejadorComputadora->isComputadora($placa) == true) {
                    $computadora = $manejadorComputadora->buscarComputadora($placa);
                    echo '<script>limpiarCampos();</script>';
                    echo '<script>desabilitarCampos();</script>';
                    $this->imprimirComputadora($computadora);
                } else {
                    $manejadorImpresora = new ManejadorImpresora();
                    if ($manejadorImpresora->isImpresora($placa)== true) {
                        echo '<script>limpiarCampos();</script>';
                        echo '<script>desabilitarCampos();</script>';
                        $this->imprimirMensaje("El componente se encuentra disponible pero no es una computadora. Por favor seleccione la opción (Asignación Impresora).");
                    } else {
                        $manejadorProyector= new ManejadorProyector();
                        if ($manejadorProyector->isProyector($placa )== true) {
                            echo '<script>limpiarCampos();</script>';
                            echo '<script>desabilitarCampos();</script>';
                            $this->imprimirMensaje("El componente se encuentra disponible pero no es una computadora. Por favor seleccione la opción (Asignación Proyector).");
                        } else {
                            $manejadorTelefono = new ManejadorTelefono();
                            if ($manejadorTelefono->isTelefono($placa )== true) {
                                echo '<script>limpiarCampos();</script>';
                                echo '<script>desabilitarCampos();</script>';
                                $this->imprimirMensaje("El componente se encuentra disponible pero no es una computadora. Por favor seleccione la opción (Asignación Teléfono).");
                            }
                        }
                    }
                }
            } else {
                echo '<script>limpiarCampos();</script>';
                echo '<script>habilitarCampos();</script>';
            }
        }
    }

    private function imprimirMensaje($mensaje) {
        echo '<script> alert("' . $mensaje  . '");</script>';
    }

    private function imprimirComputadora(Computadora $computadora) {
        echo '<script> colocarDatosComputadora("' . $computadora->getModelo() . '", "'
        . $computadora->getSerie() . '", "'
        . $computadora->getMarca() . '", "'
        . $computadora->getAnioIngreso() . '", "'
        . $computadora->getProcesador() . '", "'
        . $computadora->getTipo() . '", "'
        . $computadora->getCantMemoriaHhd() . '", "'
        . $computadora->getCriterio() . '", "'
        . $computadora->getObservacion() . '", "'
        . $computadora->getEstado() . '");</script>';
    }

}
