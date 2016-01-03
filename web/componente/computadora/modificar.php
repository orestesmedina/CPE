
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
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i>Solicitud Componentes<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">

                                    <li>
                                        <a href="#">Computadoras <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="../../../web/componente/computadora/nuevaComputadora.php">Nuevo registro</a>
                                            </li>
                                            <li>
                                                <a href="../../../web/componente/computadora/modificarComputadora.php">Modificar registro</a>
                                            </li>
                                            <li>
                                                <a href="../../../web/componente/computadora/eliminarComputadora.php">Eliminar registro</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                    <li>
                                        <a href="#">Impresoras <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="../../../web/componente/impresora/nuevaImpresora.php">Nuevo registro</a>
                                            </li>
                                            <li>
                                                <a href="../../../web/componente/impresora/modificarImpresora.php">Modificar registro</a>
                                            </li>
                                            <li>
                                                <a href="../../../web/componente/impresora/eliminarImpresora.php">Eliminar registro</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                    <li>
                                        <a href="#">Proyectores <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="../../../web/componente/proyector/nuevoProyector.php">Nuevo registro</a>
                                            </li>
                                            <li>
                                                <a href="../../../web/componente/proyector/modificarProyector.php">Modificar registro</a>
                                            </li>
                                            <li>
                                                <a href="../../../web/componente/proyector/eliminarProyector.php">Eliminar registro</a>
                                            </li>

                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                    <li>
                                        <a href="#">Teléfonos <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="../../../web/componente/telefono/nuevoTelefono.php">Nuevo registro</a>
                                            </li>
                                            <li>
                                                <a href="../../../web/componente/telefono/modificarTelefono.php">Modificar registro</a>
                                            </li>
                                            <li>
                                                <a href="../../../web/componente/telefono/eliminarTelefono.php">Eliminar registro</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                    <li>
                                        <a href="#">Otros <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="../../../web/componentes/otros/nuevo.php">Nuevo registro</a>
                                            </li>
                                            <li>
                                                <a href="../../../web/componentes/otros/modificar.php">Modificar registro</a>
                                            </li>
                                            <li>
                                                <a href="../../../web/componentes/otros/eliminar.php">Eliminar registro</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="../../../web/consulta/consultar.php"><i class="fa fa-sitemap fa-fw"></i>Consultas y Reportes<span class="fa arrow"></span></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i>Oficinas<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="../../../web/oficina/nueva.php">Nueva Oficina</a>
                                    </li>
                                    <li>
                                        <a href="../../../web/oficina/eliminar.php">Eliminar Oficina</a>
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
                        <h1 class="page-header"> Modificar computadora</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Prestamo computadora
                            </div>
                            <div class="panel-body">
                                <div class="row">

                                    <form action="../../../control/components/computadora/updateController.php" method="POST" role="form">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Número de placa</label>
                                                <input type="text" id="disabledInput" name="placa" value="<?php echo $computadora->getPlaca();?>" class="form-control" placeholder="Número de placa"  readonly pattern="[0-9]{1,10}" maxlength="10" title="ingrese solo números, mínimo once digitos">
                                            </div>

                                            <div class="form-group">
                                                <label>Modelo</label>
                                                <input type="text" id="disabledInput" disabled name="modelo" class="form-control" value="<?php echo $computadora->getModelo();?>" placeholder="Modelo" required >
                                            </div>

                                            <div class="form-group">
                                                <label>Marca</label>
                                                <input type="text" id="disabledInput" disabled name="marca" class="form-control" value="<?php echo $computadora->getMarca();?>" placeholder="Marca" required >
                                            </div>

                                            <div class="form-group">
                                                <label>Serie</label>
                                                <input type="text" id="disabledInput" disabled name="serie" class="form-control" placeholder="Serie" value="<?php echo $computadora->getSerie();?>" required >
                                            </div>

                                            <div class="form-group">
                                                <label>Tipo</label>
                                                <input type="text" id="disabledInput" disabled name="criterio" value="<?php echo $computadora->getTipo();?>" class="form-control" placeholder="Criterio" required >
                                            </div>

                                            <div class="form-group">
                                                <label>Procesador</label>
                                                <input type="text" id="disabledInput" disabled name="procesador" value="<?php echo $computadora->getProcesador();?>" class="form-control" placeholder="Procesador" required >
                                            </div>

                                            <div class="form-group">
                                                <label>Cant. Memoria</label>
                                                <input type="text" id="disabledInput" disabled name="cantMemoria" value="<?php echo $computadora->getCantMemoriaHhd();?>" class="form-control" placeholder="Cantidad de memoria" required>
                                            </div>

                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Año de ingreso</label>
                                                <input type="text" id="disabledInput" disabled name="criterio" value="<?php echo $computadora->getAnioIngreso();?>" class="form-control" placeholder="Criterio" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Criterio</label>
                                                <input type="text" name="criterio" value="<?php echo $computadora->getCriterio();?>" class="form-control" placeholder="Criterio" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Estado</label>
                                                <input type="text" name="estado" value="<?php echo $computadora->getEstado();?>" class="form-control" placeholder="estado" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Oficina encargada</label>
                                                <input type="text" id="disabledInput" disabled name="criterio" value="<?php echo $computadora->getIdOficina();?>" class="form-control" placeholder="Criterio" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Persona encargada</label>
                                                <input type="text" id="disabledInput" disabled name="idPersona" value="<?php echo $computadora->getIdPersona();?>" class="form-control" placeholder="Persona encargada" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Observaciones</label>
                                                <textarea name="observacion" value="" class="form-control" rows="3"> <?php echo $computadora->getObservacion();?> </textarea>
                                            </div>
                                            <button type="submit" name="btnModificar" class="btn btn-default">Modificar</button>
                                            <button type="submit" name="btnCancelar" class="btn btn-default">Cancelar</button>
                                        </div>
                                    </form>
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
        <script src="../../../public/bower_components/bootstrap/dist/js/bootstrap.min.js"

    </body>

</html>

