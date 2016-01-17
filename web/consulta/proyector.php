
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>CPE</title>

        <!-- DataTables CSS -->
        <link href="../../public/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

        <!-- Bootstrap Core CSS -->
        <link href="../../public/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../../public/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../../public/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../../public/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                                                <a href="../../web/asignacion/computadora/nuevo.php">Nuevo</a>
                                            </li>

                                            <li>
                                                <a href="../../web/asignacion/computadora/modificar.php">Modificar</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                    <li>
                                        <a href="#">Impresoras <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="../../web/asignacion/impresora/nuevo.php">Nuevo</a>
                                            </li>

                                            <li>
                                                <a href="../../web/asignacion/impresora/modificar.php">Modificar</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                    <li>
                                        <a href="#">Proyectores <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="../../web/asignacion/proyector/nuevo.php">Nuevo</a>
                                            </li>

                                            <li>
                                                <a href="../../web/asignacion/proyector/modificar.php">Modificar</a>
                                            </li>

                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                    <li>
                                        <a href="#">Teléfonos <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="../../web/asignacion/telefono/nuevo.php">Nuevo</a>
                                            </li>

                                            <li>
                                                <a href="../../web/asignacion/telefono/modificar.php">Modificar</a>
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
                                        <a href="../../web/consulta/computadora.php">Computadora</a>
                                    </li>
                                    <li>
                                        <a href="../../web/consulta/impresora.php">Impresora</a>
                                    </li>
                                    <li>
                                        <a href="../../web/consulta/telefono.php">Telefono</a>
                                    </li>
                                    <li>
                                        <a href="../../web/consulta/proyector.php">Proyector</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i>Oficinas<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="../../web/oficina/nuevo.php">Nueva</a>
                                    </li>
                                    <li>
                                        <a href="../../web/oficina/eliminar.php">Eliminar</a>
                                    </li>
                                    <li>
                                        <a href="../../web/oficina/consultar.php">Consultar</a>
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
                        <h1 class="page-header">Consultas Equipos Asignados</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Consulta Proyector
                            </div>
                            <div class="panel-body">
                                <div class="dataTable_wrapper">

                                    <table id="tbConsultarProyector" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>placa</th>
                                                <th>marca</th>
                                                <th>modelo</th>
                                                <th>serie</th>
                                                <th>funcionalidad</th>
                                                <th>oficina</th>
                                                <th>estado</th>
                                            </tr>
                                        </thead>
                                    </table>





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
        <script src="../../public/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../../public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../../public/bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../../public/dist/js/sb-admin-2.js"></script>
        <script src="../../public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../../public/js/metodosAjax.js"></script>    

        <script src="../../public/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="../../public/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
        <script src="../../public/js/consultaProyector.js"></script>
    </body>

</html>

