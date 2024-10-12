<?php
include_once('rutaprotegida.php');
$idEnvio=$_POST['idEnvio'];

include_once('conection.php');
include_once('camiones.php');
include_once('envios.php');
include_once('conductores.php');
include_once('clientes.php');
include_once('sucursalesSubclientes.php');
$envios=listarEnvioPorId($conexion,$idEnvio);
$listadosucursalesporenvio=listarSubSucursalPorIdEnvio($conexion,$idEnvio);

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
        <?php
            include_once('menucomponent.php');
            ?>
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
                <div class="table-responsive">
                <h1>Pedido:</h1>
                <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">CODIGO</th>
                                <th scope="col">CAMION</th>
                                <th scope="col">CONDUCTOR</th>
                                <th scope="col">ID CLIENTE</th>
                                <th scope="col">FECHA REGISTRADA</th>
                                <th scope="col">FECHA INICIO</th>
                                <th scope="col">FECHA FINAL</th>
                                <th scope="col">ESTADO</th>
                                <th scope="col">COMENTARIO</th>
                                <th scope="col">FOTO</th>
                                <th scope="col">MONTO</th>
                                <th scope="col">BONO CONDUCTOR</th>
                                <th scope="col">BONO PEONETA</th>
                                <th scope="col">accion</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                $tipodeRespuesta=gettype($envios);
                                if($tipodeRespuesta =='array'){
                                foreach ($envios as $envio) {
                                $estadoString='';
                                if ($envio['estadoEnvio']==1) {
                                    $estadoString='Activo';
                                }else if($envio['estadoEnvio']==2){
                                    $estadoString='iniciado';
                                }else if($envio['estadoEnvio']==3){
                                    $estadoString='terminado';
                                }
                                $camion=listarCamionesPorId($conexion,$envio['idCamionFk']);
                                $conductor=listarconductoresPorId($conexion,$envio['idConductorFk']);
                                $cliente=listarClientesPorId($conexion,$envio['idClienteFk']);
                                echo '
                                
                                <tr>
                                <th scope="row">'.$envio['idEnvio'].'</th>
                                <td>'.$envio['codigoEnvio'].'</td>
                                <td>'.$camion[0]['placaCamion'].'</td>
                                <td>'.$conductor[0]['completenameconductor'].'</td>
                                <td>'.$cliente[0]['nombreCliente'].'</td>
                                <td>'.$envio['fechaRegistrada'].'</td>
                                <td>'.$envio['fechaInicio'].'</td>
                                <td>'.$envio['fechaFinal'].'</td>
                                <td>'.$estadoString.'</td>
                                <td>'.$envio['comentarioEnvio'].'</td>
                                <td>'.$envio['rutaFotoEnvio'].'</td>
                                <td>'.$envio['montoViaje'].'</td>
                                <td>'.$envio['bonoConductor'].'</td>
                                <td>'.$envio['bonoPeoneta'].'</td>
                                <td>
                                <form action="detalleEnvio.php" method="POST">
                                <input type="hidden" id="linkFoto" name="idEnvio" value="'.$envio['idEnvio'].'" />
                                <button type="submit" class="btn btn-success">Detalles</button>
                                </form>
                                </td>
                                 </tr>
                                
                                ';
                            }}else if($tipodeRespuesta=='string'){
                                echo $subSucursales;
                            }
                            
                        
                            
                            ?>
                        
                         
                        </tbody>
                </table>
                </div>
                <h1>Sucursales de subclientes para envio:</h1>
                <div class="table-responsive">
                <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">nombre subcliente</th>
                                <th scope="col">direccion</th>
                                <th scope="col">cliente principal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                $tipodeRespuestasubsucursal=gettype($listadosucursalesporenvio);
                                if($tipodeRespuestasubsucursal =='array'){
                                foreach ($listadosucursalesporenvio as $subsucursallist) {

                                $cliente=listarClientesPorId($conexion,$subsucursallist['idClienteFk']);
                                echo '
                                
                                <tr>
                                <th scope="row">'.$subsucursallist['idSucusalesSubClientes'].'</th>
                                <td>'.$subsucursallist['nombreSubcliente'].'</td>
                                <td>'.$subsucursallist['direccionSubCliente'].'</td>
                                <td>'.$cliente[0]['nombreCliente'].'</td>
                                <td>
                                <form action="detalleEnvio.php" method="POST">
                                <input type="hidden" id="linkFoto" name="idEnvio" value="'.$envio['idEnvio'].'" />
                                <button type="submit" class="btn btn-success">Detalles</button>
                                </form>
                                </td>
                                 </tr>
                                
                                ';
                            }}else if($tipodeRespuestasubsucursal=='string'){
                                echo $listadosucursalesporenvio;
                            }
                            
                        
                            
                            ?>
                        
                         
                        </tbody>
                </table>
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
        </script>

</body>

</html>