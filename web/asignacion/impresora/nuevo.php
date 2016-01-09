<?php
require '../../../model/database/Conexion.php';
require '../../../model/office/manejadores/ManejadorOficina.php';

$manejadorOficina = new ManejadorOficina();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>CPE</title>

        <!-- Bootstrap Core CSS -->
        <link href="../../../public/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../../../public/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../../../public/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../../../public/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>


        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="">Universidad De Costa Rica</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">

                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i>Asignación<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">

                                    <li>
                                        <a href="#">Computadoras <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="../../../web/asignacion/computadora/nuevo.php">Nuevo</a>
                                            </li>

                                            <li>
                                                <a href="../../../web/asignacion/computadora/nuevo.php">Devolver</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                    <li>
                                        <a href="#">Impresoras <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="../../../web/asignacion/impresora/nuevo.php">Nuevo</a>
                                            </li>

                                            <li>
                                                <a href="../../../web/asignacion/impresora/devolver.php">Devolver</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                    <li>
                                        <a href="#">Proyectores <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="../../../web/asignacion/proyector/nuevo.php">Nuevo</a>
                                            </li>

                                            <li>
                                                <a href="../../../web/asignacion/proyector/devolver.php">Devolver</a>
                                            </li>

                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                    <li>
                                        <a href="#">Teléfonos <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="../../../web/asignacion/telefono/nuevo.php">Nuevo</a>
                                            </li>

                                            <li>
                                                <a href="../../../web/asignacion/telefono/devolver.php">Devolver</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                    <li>
                                        <a href="#">Otros <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="computadora/prestamo/asignacion/nuevo.php">Nuevo préstamo</a>
                                            </li>

                                            <li>
                                                <a href="computadora/prestamo/asignacion/devolver.php">Devolver préstamo</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i>Consultas<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="../../../web/consulta/computadora.php">Computadora</a>
                                    </li>
                                    <li>
                                        <a href="../../../web/consulta/impresora.php">Impresora</a>
                                    </li>
                                    <li>
                                        <a href="../../../web/consulta/telefono.php">Telefono</a>
                                    </li>
                                    <li>
                                        <a href="../../../web/consulta/proyector.php">Proyector</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i>Oficinas<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="../../asignacion/oficina/nueva.php">Nueva Oficina</a>
                                    </li>
                                    <li>
                                        <a href="../../asignacion/oficina/eliminar.php">Eliminar Oficina</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> Nueva Asignación</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Asignación Impresora
                            </div>
                            <div class="panel-body">
                                <div class="row">

                                    <form action="../../../control/asignacion/impresora/InsertarController.php" method="POST" role="form" id="nuevaComputadora">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Número de placa</label>
                                                <input type="text" id="placa" name="placa" class="form-control" placeholder="Número de placa"  required pattern="[0-9]{1,10}" maxlength="10" title="ingrese solo números, mínimo once digitos">
                                                <button type="button" class="btn btn-default" onclick="buscarImpresora();">
                                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                                </button>

                                            </div>

                                            <div class="form-group">
                                                <label>Modelo</label>
                                                <input type="text" id="modelo" name="modelo" class="form-control" placeholder="Modelo" required  readonly>
                                            </div>

                                            <div class="form-group">
                                                <label>Marca</label>
                                                <input type="text" id="marca" name="marca" class="form-control" placeholder="Marca" required pattern="[a-zA-z0-9]+" title="Ingrese solo letras o números" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label>Serie</label>
                                                <input type="text" id="serie" name="serie" class="form-control" placeholder="Serie" required  readonly>
                                            </div>

                                            <div class="form-group">
                                                <label>Tipo</label>
                                                <select name="tipo" id="tipo" class="form-control" readonly>
                                                    <option value="LASER">LASER</option>
                                                    <option value="INYECCION">INYECCION</option>
                                                    <option value="MULTIFUNCIONAL">MULTIFUNCIONAL</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Consumible</label>
                                                <input type="text" id="consumible" name="consumible" class="form-control" placeholder="consumible" required readonly>
                                            </div>

                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Año de ingreso</label>
                                                <select name="anioIngreso" id="anioIngreso" class="form-control" readonly>
                                                    <?php
                                                    for ($anio = 1980; $anio <= date("Y"); $anio++) {
                                                        echo '<option value="' . $anio . '">' . $anio . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Estado</label>
                                                <input type="text" id="estado" name="estado" class="form-control" placeholder="estado" required readonly>
                                            </div>

                                            <div class="form-group">
                                                <label>Oficina encargada</label>
                                                <select id="idOficina" name="idOficina" class="form-control" readonly>
                                                    <?php $manejadorOficina->getOficinas(); ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Persona encargada</label>
                                                <input type="text" id="idPersona" name="idPersona" class="form-control" placeholder="Persona encargada" required readonly>
                                            </div>

                                            <div class="form-group">
                                                <label>Observaciones</label>
                                                <textarea name="observacion" id="observacion" class="form-control" readonly></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-default" disabled id="btnGuardar">Guardar</button>
                                            <button type="reset" class="btn btn-default" onclick="recargarImpresora()">Cancelar</button>
                                        </div>
                                    </form>
                                    <div id="texto"></div>
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../../../public/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../../../public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../../../public/bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../../../public/dist/js/sb-admin-2.js"></script>
        <script src="../../../public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../../../public/js/metodosAjax.js"></script>      
    </body>

</html>

