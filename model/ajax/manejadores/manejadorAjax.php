<?php

class ManejadorAjax extends Conexion {

    public function buscarAsignacionComputadora($placa, $accion) {
        $this->conectar();
        $sql = 'SELECT Prestamo.placa FROM Prestamo, Equipo WHERE Prestamo.placa = ' . $placa . ' and Prestamo.estado = 1 and Equipo.placa = Prestamo.placa and Equipo.tipoEquipo = "COMPUTADORA"';

        $result = $this->getConexion()->query($sql);

        if ($result->num_rows > 0) {
            $this->cerrarConexion();
            if ($accion == 'insertar') {
                echo '<script>limpiarCamposEquipo();</script>';
                echo '<script>limpiarCamposComputadora();</script>';
                echo '<script>limpiarCamposAsignacion();</script>';
                echo '<script>deshabilitarCamposEquipo();</script>';
                echo '<script>deshabilitarCamposComputadora();</script>';
                echo '<script>deshabilitarCamposAsignacion();</script>';
                $this->imprimirMensaje("El componente ya se encuentra asignado.");
            } else if ($accion == 'modificar') {
                $manejadorComputadora = new ManejadorComputadora();
                $manejadorEquipo = new ManejadorEquipo();
                $computadora = $manejadorComputadora->getComputadora($placa);
                $asignacion = $manejadorEquipo->getAsignacion($placa);
                echo '<script>limpiarCamposEquipo();</script>';
                echo '<script>limpiarCamposComputadora();</script>';
                echo '<script>limpiarCamposAsignacion();</script>';
                echo '<script>habilitarCamposEquipo();</script>';
                echo '<script>habilitarCamposAsignacion();</script>';
                echo '<script>habilitarCamposComputadora();</script>';
                $this->imprimirComputadora($computadora);
                $this->imprimirAsignacion($asignacion);
            }
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
                    if ($accion == 'insertar') {
                        echo '<script>deshabilitarCamposEquipo();</script>';
                        echo '<script>habilitarCamposAsignacion();</script>';
                        echo '<script>deshabilitarCamposComputadora();</script>';
                    } else if ($accion == 'modificar') {
                        echo '<script>habilitarCamposEquipo();</script>';
                        echo '<script>habilitarCamposAsignacion();</script>';
                        echo '<script>habilitarCamposComputadora();</script>';
                    }

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

    private function imprimirAsignacion($asignacion) {
        echo '<script> colocarDatosAsignacion("' . $asignacion['nombrePersona'] . '", "'
        . $asignacion['idOficina'] . '");</script>';
    }

    private function imprimirComputadora($computadora) {
        echo '<script> colocarDatosEquipo("' . $computadora['modelo'] . '", "'
        . $computadora['serie'] . '", "'
        . $computadora['marca'] . '", "'
        . $computadora['anioIngreso'] . '", "'
        . $computadora['observacion'] . '", "'
        . $computadora['estado'] . '", "'
        . $computadora['criterio'] . '");</script>';
        echo '<script> colocarDatosComputadora("' . $computadora['procesador'] . '", "'
        . $computadora['tipo'] . '", "'
        . $computadora['cantMemoria'] . '");</script>';
    }

    public function buscarAsignacionTelefono($placa, $accion) {
        $this->conectar();
        $sql = 'SELECT Prestamo.placa FROM Prestamo, Equipo WHERE Prestamo.placa = ' . $placa . ' and Prestamo.estado = 1  and Prestamo.placa = Equipo.placa and Equipo.tipoEquipo = "TELEFONO"';
        $result = $this->getConexion()->query($sql);

        if ($result->num_rows > 0) {
            $this->cerrarConexion();
            if ($accion == 'insertar') {
                echo '<script>limpiarCamposEquipo();</script>';
                echo '<script>limpiarCamposTelefono();</script>';
                echo '<script>limpiarCamposAsignacion();</script>';
                echo '<script>deshabilitarCamposEquipo();</script>';
                echo '<script>deshabilitarCamposTelefono();</script>';
                echo '<script>deshabilitarCamposAsignacion();</script>';
                $this->imprimirMensaje("El componente ya se encuentra asignado.");
            } else if ($accion == 'modificar') {
                $manejadorTelefono = new ManejadorTelefono();
                $manejadorEquipo = new ManejadorEquipo();
                $telefono = $manejadorTelefono->getTelefono($placa);
                $asignacion = $manejadorEquipo->getAsignacion($placa);
                echo '<script>limpiarCamposEquipo();</script>';
                echo '<script>limpiarCamposTelefono();</script>';
                echo '<script>limpiarCamposAsignacion();</script>';
                echo '<script>habilitarCamposEquipo();</script>';
                echo '<script>habilitarCamposAsignacion();</script>';
                echo '<script>habilitarCamposTelefono();</script>';
                $this->imprimirTelefono($telefono);
                $this->imprimirAsignacion($asignacion);
            }
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
                    if ($accion == 'insertar') {
                        echo '<script>deshabilitarCamposEquipo();</script>';
                        echo '<script>habilitarCamposAsignacion();</script>';
                        echo '<script>habilitarCamposTelefono();</script>';
                    } else if ($accion == 'modificar') {
                        echo '<script>deshabilitarCamposEquipo();</script>';
                        echo '<script>habilitarCamposAsignacion();</script>';
                        echo '<script>habilitarCamposTelefono();</script>';
                    }

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
        . $telefono['estado'] . '", "'
        . $telefono['criterio'] . '");</script>';
        echo '<script> colocarDatosTelefono("' . $telefono['extension'] . '");</script>';
    }

    public function buscarAsignacionImpresora($placa, $accion) {
        $this->conectar();
        $sql = 'SELECT Prestamo.placa FROM Prestamo, Equipo WHERE Prestamo.placa = ' . $placa . ' and Prestamo.estado = 1 and Prestamo.placa = Equipo.placa and Equipo.tipoEquipo = "IMPRESORA"';
        $result = $this->getConexion()->query($sql);

        if ($result->num_rows > 0) {
            $this->cerrarConexion();
            if ($accion == 'insertar') {
                echo '<script>limpiarCamposEquipo();</script>';
                echo '<script>limpiarCamposImpresora();</script>';
                echo '<script>limpiarCamposAsignacion();</script>';
                echo '<script>deshabilitarCamposEquipo();</script>';
                echo '<script>deshabilitarCamposImpresora();</script>';
                echo '<script>deshabilitarCamposAsignacion();</script>';
                $this->imprimirMensaje("El componente ya se encuentra asignado.");
            } else if ($accion == 'modificar') {
                $manejadorImpresora = new ManejadorImpresora();
                $manejadorEquipo = new ManejadorEquipo();
                $impresora = $manejadorImpresora->getImpresora($placa);
                $asignacion = $manejadorEquipo->getAsignacion($placa);
                echo '<script>limpiarCamposEquipo();</script>';
                echo '<script>limpiarCamposImpresora();</script>';
                echo '<script>limpiarCamposAsignacion();</script>';
                echo '<script>habilitarCamposEquipo();</script>';
                echo '<script>habilitarCamposAsignacion();</script>';
                echo '<script>habilitarCamposImpresora();</script>';
                $this->imprimirImpresora($impresora);
                $this->imprimirAsignacion($asignacion);
            }
        } else {
            $this->cerrarConexion();
            $manejadorEquipo = new ManejadorEquipo();
            if ($manejadorEquipo->existeEquipo($placa) == true) {
                $manejadorImpresora = new ManejadorImpresora();
                if ($manejadorImpresora->isImpresora($placa) == true) {
                    $impresora = $manejadorImpresora->getImpresora($placa);
                    echo '<script>limpiarCamposEquipo();</script>';
                    echo '<script>limpiarCamposImpresora();</script>';
                    echo '<script>limpiarCamposAsignacion();</script>';
                    if ($accion == 'insertar') {
                        echo '<script>deshabilitarCamposEquipo();</script>';
                        echo '<script>habilitarCamposAsignacion();</script>';
                    } else if ($accion == 'modificar') {
                        echo '<script>habilitarCamposEquipo();</script>';
                        echo '<script>habilitarCamposAsignacion();</script>';
                        echo '<script>habilitarCamposImpresora();</script>';
                    }

                    $this->imprimirImpresora($impresora);
                } else {
                    $manejadorTelefono = new ManejadorTelefono();
                    if ($manejadorTelefono->isTelefono($placa) == true) {
                        echo '<script>limpiarCamposEquipo();</script>';
                        echo '<script>limpiarCamposImpresora();</script>';
                        echo '<script>limpiarCamposAsignacion();</script>';
                        echo '<script>deshabilitarCamposEquipo();</script>';
                        echo '<script>deshabilitarCamposImpresora();</script>';
                        echo '<script>deshabilitarCamposAsignacion();</script>';
                        $this->imprimirMensaje("El componente se encuentra disponible pero no es una computadora. Por favor seleccione la opción (Asignación Teléfono).");
                    } else {
                        $manejadorProyector = new ManejadorProyector();
                        if ($manejadorProyector->isProyector($placa) == true) {
                            echo '<script>limpiarCamposEquipo();</script>';
                            echo '<script>limpiarCamposImpresora();</script>';
                            echo '<script>limpiarCamposAsignacion();</script>';
                            echo '<script>deshabilitarCamposEquipo();</script>';
                            echo '<script>deshabilitarCamposImpresora();</script>';
                            echo '<script>deshabilitarCamposAsignacion();</script>';
                            $this->imprimirMensaje("El componente se encuentra disponible pero no es una computadora. Por favor seleccione la opción (Asignación Proyector).");
                        } else {
                            $manejadorComputadora = new ManejadorComputadora();
                            if ($manejadorComputadora->isComputadora($placa) == true) {
                                echo '<script>limpiarCamposEquipo();</script>';
                                echo '<script>limpiarCamposImpresora();</script>';
                                echo '<script>limpiarCamposAsignacion();</script>';
                                echo '<script>deshabilitarCamposEquipo();</script>';
                                echo '<script>deshabilitarCamposImpresora();</script>';
                                echo '<script>deshabilitarCamposAsignacion();</script>';
                                $this->imprimirMensaje("El componente se encuentra disponible pero no es una computadora. Por favor seleccione la opción (Asignación Computadora).");
                            }
                        }
                    }
                }
            } else {
                echo '<script>limpiarCamposEquipo();</script>';
                echo '<script>limpiarCamposImpresora();</script>';
                echo '<script>limpiarCamposAsignacion();</script>';
                echo '<script>habilitarCamposEquipo();</script>';
                echo '<script>habilitarCamposImpresora();</script>';
                echo '<script>habilitarCamposAsignacion();</script>';
            }
        }
    }

    private function imprimirImpresora($impresora) {
        echo '<script> colocarDatosEquipo("' . $impresora['modelo'] . '", "'
        . $impresora['serie'] . '", "'
        . $impresora['marca'] . '", "'
        . $impresora['anioIngreso'] . '", "'
        . $impresora['observacion'] . '", "'
        . $impresora['estado'] . '", "'
        . $impresora['criterio'] . '");</script>';
        echo '<script> colocarDatosImpresora("' . $impresora['consumible'] . '", "'
        . $impresora['tipo'] . '");</script>';
    }

    public function buscarAsignacionProyector($placa, $accion) {
        $this->conectar();
        $sql = 'SELECT Prestamo.placa FROM Prestamo, Equipo WHERE Prestamo.placa = ' . $placa . ' and Prestamo.estado = 1 and Prestamo.placa = Equipo.placa and Equipo.tipoEquipo = "PROYECTOR"';

        $result = $this->getConexion()->query($sql);

        if ($result->num_rows > 0) {
            $this->cerrarConexion();
            if ($accion == 'insertar') {

                echo '<script>limpiarCamposEquipo();</script>';
                echo '<script>limpiarCamposProyector();</script>';
                echo '<script>limpiarCamposAsignacion();</script>';
                echo '<script>deshabilitarCamposEquipo();</script>';
                echo '<script>deshabilitarCamposProyector();</script>';
                echo '<script>deshabilitarCamposAsignacion();</script>';
                $this->imprimirMensaje("El componente ya se encuentra asignado.");
            } else if ($accion == 'modificar') {
                $manejadorProyector = new ManejadorProyector();
                $manejadorEquipo = new ManejadorEquipo();
                $proyector = $manejadorProyector->getProyector($placa);
                $asignacion = $manejadorEquipo->getAsignacion($placa);
                echo '<script>limpiarCamposEquipo();</script>';
                echo '<script>limpiarCamposProyector();</script>';
                echo '<script>limpiarCamposAsignacion();</script>';
                echo '<script>habilitarCamposEquipo();</script>';
                echo '<script>habilitarCamposAsignacion();</script>';
                echo '<script>habilitarCamposProyector();</script>';
                $this->imprimirProyector($proyector);
                $this->imprimirAsignacion($asignacion);
            }
        } else {
            $this->cerrarConexion();
            $manejadorEquipo = new ManejadorEquipo();
            if ($manejadorEquipo->existeEquipo($placa) == true) {
                $manejadorProyector = new ManejadorProyector();
                if ($manejadorProyector->isProyector($placa) == true) {
                    $proyector = $manejadorProyector->getProyector($placa);
                    echo '<script>limpiarCamposEquipo();</script>';
                    echo '<script>limpiarCamposProyector();</script>';
                    echo '<script>limpiarCamposAsignacion();</script>';
                    if ($accion == 'insertar') {
                        echo '<script>deshabilitarCamposEquipo();</script>';
                        echo '<script>habilitarCamposAsignacion();</script>';
                        echo '<script>deshabilitarCamposProyector();</script>';
                    } else if ($accion == 'modificar') {
                        echo '<script>habilitarCamposEquipo();</script>';
                        echo '<script>habilitarCamposAsignacion();</script>';
                        echo '<script>habilitarCamposProyector();</script>';
                    }

                    $this->imprimirProyector($proyector);
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
                        $manejadorComputadora = new ManejadorComputadora();
                        if ($manejadorComputadora->isComputadora($placa) == true) {
                            echo '<script>limpiarCamposEquipo();</script>';
                            echo '<script>limpiarCamposProyector();</script>';
                            echo '<script>limpiarCamposAsignacion();</script>';
                            echo '<script>deshabilitarCamposEquipo();</script>';
                            echo '<script>deshabilitarCamposProyector();</script>';
                            echo '<script>deshabilitarCamposAsignacion();</script>';
                            $this->imprimirMensaje("El componente se encuentra disponible pero no es una computadora. Por favor seleccione la opción (Asignación Computadora).");
                        } else {
                            $manejadorTelefono = new ManejadorTelefono();
                            if ($manejadorTelefono->isTelefono($placa) == true) {
                                echo '<script>limpiarCamposEquipo();</script>';
                                echo '<script>limpiarCamposProyector();</script>';
                                echo '<script>limpiarCamposAsignacion();</script>';
                                echo '<script>deshabilitarCamposEquipo();</script>';
                                echo '<script>deshabilitarCamposProyector();</script>';
                                echo '<script>deshabilitarCamposAsignacion();</script>';
                                $this->imprimirMensaje("El componente se encuentra disponible pero no es una computadora. Por favor seleccione la opción (Asignación Teléfono).");
                            }
                        }
                    }
                }
            } else {
                echo '<script>limpiarCamposEquipo();</script>';
                echo '<script>limpiarCamposProyector();</script>';
                echo '<script>limpiarCamposAsignacion();</script>';
                echo '<script>habilitarCamposEquipo();</script>';
                echo '<script>habilitarCamposProyector();</script>';
                echo '<script>habilitarCamposAsignacion();</script>';
            }
        }
    }

    private function imprimirProyector($proyector) {
        echo '<script> colocarDatosEquipo("' . $proyector['modelo'] . '", "'
        . $proyector['serie'] . '", "'
        . $proyector['marca'] . '", "'
        . $proyector['anioIngreso'] . '", "'
        . $proyector['observacion'] . '", "'
        . $proyector['estado'] . '", "'
        . $proyector['criterio'] . '");</script>';
        echo '<script> colocarDatosProyector("' . $proyector['funcionalidad'] . '");</script>';
    }

}
