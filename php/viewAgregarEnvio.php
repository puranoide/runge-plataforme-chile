<?php
include_once('conection.php');
include_once('conductores.php');
include_once('clientes.php');
include_once('camiones.php');
include_once('tipoDeEnvio.php');
$conductores = listarconductores($conexion);
$camiones = listarCamiones($conexion);
$clientes = listarClientes($conexion);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
                <div class="sidebar-brand-icon">
                    <img src="../assetspersonal/img/logorunge.jpg" alt="" width="60" height="50">
                </div>
                <div class="sidebar-brand-text mx-3">Admin runge</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Inicio</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Divider -->


            <!-- Heading -->
            <div class="sidebar-heading">
                Modulos
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Envios</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">manejo de envios</h6>
                        <a class="collapse-item" href="ViewEnvios.php">Ver envios</a>
                        <a class="collapse-item" href="viewAgregarEnvio.php">Agregar envio</a>
                        <a class="collapse-item" href="forgot-password.html">editar envio</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesingresosManuales"
                    aria-expanded="true" aria-controls="collapsePagesingresosManuales">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Ingresos</span>
                </a>
                <div id="collapsePagesingresosManuales" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">manejo de ingresos</h6>
                        <a class="collapse-item" href="viewIngresosManuales.php">Ver ingresos Manuales</a>
                        <a class="collapse-item" href="viewAgregarIngresoManual.php">Agregar ingreso manual</a>

                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesEgresosManuales"
                    aria-expanded="true" aria-controls="collapsePagesingresosManuales">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Egresos</span>
                </a>
                <div id="collapsePagesEgresosManuales" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">manejo de ingresos</h6>
                        <a class="collapse-item" href="viewEgresosManuales.php">Ver egresos Manuales</a>
                        <a class="collapse-item" href="viewAgregarEgresoManual.php">Agregar egresos manual</a>

                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagescamiones" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Camiones</span>
                </a>
                <div id="collapsePagescamiones" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesconductores" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>conductores</span>
                </a>
                <div id="collapsePagesconductores" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Lee Xavi</span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <form action="ViewAgregarSucursales.php" method="POST">


                        <div data-mdb-input-init class="form-outline form-white mb-4">
                            <label class="form-label text-dark" for="linkFoto">Codigo de pedido</label>
                            <input type="text" id="linkFoto" class="form-control form-control-lg" name="codigoEnvio" required pattern="\S.*" />

                        </div>

                        <div data-mdb-input-init class="form-outline form-white mb-4">
                            <label class="form-label text-dark" for="linkFoto">Conductores</label>
                            <select class="form-select" aria-label="Default select example" name="conductorSeleccionado" required>
                                <option value="" selected>Selecciona un conductor</option>
                                <?php
                                foreach ($conductores as $conductor) {
                                    echo '<option value="' . $conductor['idconductor'] . '">' . $conductor['completenameconductor'] . '</option>';
                                }

                                ?>
                            </select>
                        </div>
                        <div data-mdb-input-init class="form-outline form-white mb-4">
                            <label class="form-label text-dark" for="linkFoto">Camiones</label>
                            <select class="form-select" aria-label="Default select example" name="camionSeleccionado" required>
                                <option value="" selected>Selecciona un camion</option>
                                <?php
                                foreach ($camiones as $camion) {
                                    echo '<option value="' . $camion['camionId'] . '">' . $camion['placaCamion'] . '</option>';
                                }

                                ?>
                            </select>
                        </div>
                        <div data-mdb-input-init class="form-outline form-white mb-4">
                            <label class="form-label text-dark" for="linkFoto">clientes</label>
                            <select class="form-select" aria-label="Default select example" name="clienteSeleccionado" id="cliente" onchange="actualizarForm()" required>
                                <option value="" selected>Selecciona un cliente</option>
                                <?php
                                foreach ($clientes as $cliente) {
                                    echo '<option value="' . $cliente['clienteId'] . '">' . $cliente['nombreCliente'] . '</option>';
                                }

                                ?>
                            </select>
                        </div>
                        <div data-mdb-input-init class="form-outline form-white mb-4" id="rutas">
                           
                        </div>
                        <button type="submit" class="btn btn-success">Success</button>
                    </form>
                </div>
                <!-- /.container-fluid -->

                <!-- End of Main Content -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿Seguro que deseas salir?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Selecciona salir para cerrar la sesión actual</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">salir</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../vendor/chart.js/Chart.min.js"></script>


        <!-- Page level custom scripts -->
        <script src="../js/demo/chart-area-demo.js"></script>
        <script src="../js/demo/chart-bar-demo.js"></script>
        <script>
            // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';

            // Pie Chart Example
            var ctx = document.getElementById("myPieChart");
            var myPieChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["Direct", "Referral", "Social"],
                    datasets: [{
                        data: [55, 30, 35],
                        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
                    },
                    legend: {
                        display: false
                    },
                    cutoutPercentage: 80,
                },
            });

            function actualizarForm() {
                var clienteSeleccionado = document.getElementById("cliente").value
                var conteinerRutas = document.getElementById("rutas");

                var formularioCanontex = `
                 <label class="form-label text-dark" for="linkFoto">rutas para el cliente</label>
                            <select class="form-select" aria-label="Default select example" name="ruta" id="rutas" required>
                                <option value="0" >Selecciona un cliente</option>
                <option value="1" >viaje 1</option>
                <option value="2" >viaje 2</option>
                <option value="3" >viaje 3</option>
                <option value="4" >viaje 2-ruta colchon</option>
                <option value="5" >viaje 3-ruta colchon</option>
                </select>
               
                `

                var formularioAlicomer = `
 <label class="form-label text-dark" for="linkFoto">rutas para el cliente</label>
                            <select class="form-select" aria-label="Default select example" name="ruta" id="rutas" required>
                                <option value="0" >Selecciona un cliente</option>
                <option value="0" >Selecciona un cliente</option>
                <option value="6" >entregar de pan</option>
                <option value="7" >retiro de harina</option>
                <option value="8" >retiro de cajas de carton</option>
                <option value="9" >retiro de cajas plasticas</option>
                </select>
               
                `
                var formularionutriscocastaño = `
                <input type="hidden" value="10" id="" class="form-control form-control-lg" name="ruta" onlyread pattern="\S.*" />
                 
               
                `

                conteinerRutas.innerHTML = ""; // Limpiar el formulario
                if (clienteSeleccionado === "4") {
                    conteinerRutas.innerHTML = formularioCanontex;
                } else if (clienteSeleccionado === "5") {
                    conteinerRutas.innerHTML = formularioAlicomer;
                } else if (clienteSeleccionado === "6" || clienteSeleccionado === "7") {
                    conteinerRutas.innerHTML = formularionutriscocastaño;
                } else {
                    console.warn("Cliente no identificado o no hay formulario disponible.");
                }
            }
        </script>

</body>

</html>