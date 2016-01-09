<?php

class ManejadorAjax extends Conexion {

    public function buscarAsignacionComputadora($placa) {
        $this->conectar();
        $sql = 'SELECT placa FROM Prestamo WHERE placa = ' . $placa . ' and estado = 1 ';

        $result = $this->getConexion()->query($sql);

        if ($result->num_rows > 0) {
            $this->cerrarConexion();
            echo '<script>limpiarCamposEquipo();</script>';
            echo '<script>limpiarCamposComputadora();</script>';
            echo '<script>limpiarCamposAsignacion();</script>';
            echo '<script>deshabilitarCamposEquipo();</script>';
            echo '<script>deshabilitarCamposComputadora();</script>';
            echo '<script>deshabilitarCamposAsignacion();</script>';
            $this->imprimirMensaje("El componente ya se encuentra asignado.");
        } else {
            $this->cerrarConexion();
            $manejadorEquipo = new ManejadorEquipo();
            if ($manejadorEquipo->existeEquipo($placa) == true) {
                $manejadorComputadora = new ManejadorComputadora();
                if ($manejadorComputadora->isComputadora($placa) == true) {
                    $computadora = $manejadorComputadora->getComputadora($placa);
                    echo '<script>limpiarCamposEquipo();</script>';
                    echo '<script>limpiarCamposComputadora();</script>';
                    echo '<script>limpiarCamposAsignacion();</script>';
                    echo '<script>deshabilitarCamposEquipo();</script>';
                    echo '<script>habilitarCamposAsignacion();</script>';
                    echo '<script>deshabilitarCamposComputadora();</script>';
                    $this->imprimirComputadora($computadora);
                } else {
                    $manejadorImpresora = new ManejadorImpresora();
                    if ($manejadorImpresora->isImpresora($placa) == true) {
                        echo '<script>limpiarCamposEquipo();</script>';
                                echo '<script>limpiarCamposComputadora();</script>';
                                echo '<script>limpiarCamposAsignacion();</script>';
                                echo '<script>deshabilitarCamposEquipo();</script>';
                                echo '<script>deshabilitarCamposComputadora();</script>';
                                echo '<script>deshabilitarCamposAsignacion();</script>';
                        $this->imprimirMensaje("El componente se encuentra disponible pero no es una computadora. Por favor seleccione la opción (Asignación Impresora).");
                    } else {
                        $manejadorProyector = new ManejadorProyector();
                        if ($manejadorProyector->isProyector($placa) == true) {
                            echo '<script>limpiarCamposEquipo();</script>';
                                echo '<script>limpiarCamposComputadora();</script>';
                                echo '<script>limpiarCamposAsignacion();</script>';
                                echo '<script>deshabilitarCamposEquipo();</script>';
                                echo '<script>deshabilitarCamposComputadora();</script>';
                                echo '<script>deshabilitarCamposAsignacion();</script>';
                            $this->imprimirMensaje("El componente se encuentra disponible pero no es una computadora. Por favor seleccione la opción (Asignación Proyector).");
                        } else {
                            $manejadorTelefono = new ManejadorTelefono();
                            if ($manejadorTelefono->isTelefono($placa) == true) {
                                echo '<script>limpiarCamposEquipo();</script>';
                                echo '<script>limpiarCamposComputadora();</script>';
                                echo '<script>limpiarCamposAsignacion();</script>';
                                echo '<script>deshabilitarCamposEquipo();</script>';
                                echo '<script>deshabilitarCamposComputadora();</script>';
                                echo '<script>deshabilitarCamposAsignacion();</script>';
                                $this->imprimirMensaje("El componente se encuentra disponible pero no es una computadora. Por favor seleccione la opción (Asignación Teléfono).");
                            }
                        }
                    }
                }
            } else {
                echo '<script>limpiarCamposEquipo();</script>';
                echo '<script>limpiarCamposComputadora();</script>';
                echo '<script>limpiarCamposAsignacion();</script>';
                echo '<script>habilitarCamposEquipo();</script>';
                echo '<script>habilitarCamposComputadora();</script>';
                echo '<script>habilitarCamposAsignacion();</script>';
            }
        }
    }

    private function imprimirMensaje($mensaje) {
        echo '<script> alert("' . $mensaje . '");</script>';
    }

    private function imprimirComputadora($computadora) {
        echo '<script> colocarDatosEquipo("' . $computadora['modelo'] . '", "'
        . $computadora['serie'] . '", "'
        . $computadora['marca'] . '", "'
        . $computadora['anioIngreso'] . '", "'
        . $computadora['observacion'] . '", "'
        . $computadora['estado'] . '");</script>';
        echo '<script> colocarDatosComputadora("' . $computadora['procesador'] . '", "'
        . $computadora['tipo'] . '", "'
        . $computadora['cantMemoria'] . '", "'
        . $computadora['criterio'] . '");</script>';
    }

    public function buscarAsignacionTelefono($placa) {
        $this->conectar();
        $sql = 'SELECT placa FROM Prestamo WHERE placa = ' . $placa . ' and estado = 1 ';
        $result = $this->getConexion()->query($sql);

        if ($result->num_rows > 0) {
            $this->cerrarConexion();
            echo '<script>limpiarCamposEquipo();</script>';
            echo '<script>limpiarCamposTelefono();</script>';
            echo '<script>limpiarCamposAsignacion();</script>';
            echo '<script>deshabilitarCamposEquipo();</script>';
            echo '<script>deshabilitarCamposTelefono();</script>';
            echo '<script>deshabilitarCamposAsignacion();</script>';
            $this->imprimirMensaje("El componente ya se encuentra asignado.");
        } else {
            $this->cerrarConexion();
            $manejadorEquipo = new ManejadorEquipo();
            if ($manejadorEquipo->existeEquipo($placa) == true) {
                $manejadorTelefono = new ManejadorTelefono();
                if ($manejadorTelefono->isTelefono($placa) == true) {
                    $telefono = $manejadorTelefono->getTelefono($placa);
                    echo '<script>limpiarCamposEquipo();</script>';
                    echo '<script>limpiarCamposTelefono();</script>';
                    echo '<script>limpiarCamposAsignacion();</script>';
                    echo '<script>deshabilitarCamposEquipo();</script>';
                    echo '<script>habilitarCamposAsignacion();</script>';
                    echo '<script>habilitarCamposTelefono();</script>';
                    $this->imprimirTelefono($telefono);
                } else {
                    $manejadorImpresora = new ManejadorImpresora();
                    if ($manejadorImpresora->isImpresora($placa) == true) {
                        echo '<script>limpiarCamposEquipo();</script>';
                        echo '<script>limpiarCamposTelefono();</script>';
                        echo '<script>limpiarCamposAsignacion();</script>';
                        echo '<script>deshabilitarCamposEquipo();</script>';
                        echo '<script>deshabilitarCamposTelefono();</script>';
                        echo '<script>deshabilitarCamposAsignacion();</script>';
                        $this->imprimirMensaje("El componente se encuentra disponible pero no es una computadora. Por favor seleccione la opción (Asignación Impresora).");
                    } else {
                        $manejadorProyector = new ManejadorProyector();
                        if ($manejadorProyector->isProyector($placa) == true) {
                            echo '<script>limpiarCamposEquipo();</script>';
                            echo '<script>limpiarCamposTelefono();</script>';
                            echo '<script>limpiarCamposAsignacion();</script>';
                            echo '<script>deshabilitarCamposEquipo();</script>';
                            echo '<script>deshabilitarCamposTelefono();</script>';
                            echo '<script>deshabilitarCamposAsignacion();</script>';
                            $this->imprimirMensaje("El componente se encuentra disponible pero no es una computadora. Por favor seleccione la opción (Asignación Proyector).");
                        } else {
                            $manejadorComputadora = new ManejadorComputadora();
                            if ($manejadorComputadora->isComputadora($placa) == true) {
                                echo '<script>limpiarCamposEquipo();</script>';
                                echo '<script>limpiarCamposTelefono();</script>';
                                echo '<script>limpiarCamposAsignacion();</script>';
                                echo '<script>deshabilitarCamposEquipo();</script>';
                                echo '<script>deshabilitarCamposTelefono();</script>';
                                echo '<script>deshabilitarCamposAsignacion();</script>';
                                $this->imprimirMensaje("El componente se encuentra disponible pero no es una computadora. Por favor seleccione la opción (Asignación Computadora).");
                            }
                        }
                    }
                }
            } else {
                echo '<script>limpiarCamposEquipo();</script>';
                echo '<script>limpiarCamposTelefono();</script>';
                echo '<script>limpiarCamposAsignacion();</script>';
                echo '<script>habilitarCamposEquipo();</script>';
                echo '<script>habilitarCamposTelefono();</script>';
                echo '<script>habilitarCamposAsignacion();</script>';
            }
        }
    }

    private function imprimirTelefono($telefono) {
        echo '<script> colocarDatosEquipo("' . $telefono['modelo'] . '", "'
        . $telefono['serie'] . '", "'
        . $telefono['marca'] . '", "'
        . $telefono['anioIngreso'] . '", "'
        . $telefono['observacion'] . '", "'
        . $telefono['estado'] . '");</script>';
        echo '<script> colocarDatosTelefono("' . $telefono['extension'] . '");</script>';
    }

}
