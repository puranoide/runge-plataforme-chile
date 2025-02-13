<?php
include_once('../../../config/rutaprotegida.php');
include_once('../../../config/conection.php');
include_once('../../../logic/camiones.php');
$camiones=listarCamiones($conexion);

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
    <link href="../../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
            include_once('../../../partials/camiones/menucomponent.php');
            ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once('../../../partials/camiones/usercomponent.php');?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="table-responsive">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">descripcion</th>
                                <th scope="col">placa</th>
                                <th scope="col">cubicaje</th>
                                <th scope="col">acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tipodeRespuesta = gettype($camiones);
                            if ($tipodeRespuesta == 'array') {
                                foreach ($camiones as $camion) {
                                    echo '
                                
                                <tr>
                                <th scope="row">' . $camion['camionId'] . '</th>
                                <td>' . $camion['descripcionCamion'] . '</td>
                                <td>' . $camion['placaCamion'] . '</td>
                                 <td>' . $camion['cubicajeCamion'] . '</td>
                                 <td>
                                <form action="viewFinanzasCamion.php" method="POST">
                                <input type="hidden" id="linkFoto" name="idEnvio" value="' . $camion['camionId'] . '" />
                                <button type="submit" class="btn btn-success">Ver ingresos</button>
                                </form>
                                </td>
                                 </tr>
                                
                                ';
                                }
                            } else if ($tipodeRespuesta == 'string') {
                                echo $camiones;
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
    <script src="../../../../vendor/jquery/jquery.min.js"></script>
    <script src="../../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../../../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../../../vendor/chart.js/Chart.min.js"></script>
    

    <!-- Page level custom scripts -->
    <script src="../../../../js/demo/chart-area-demo.js"></script>
    <script src="../../../../js/demo/chart-bar-demo.js"></script>
    <script >
                        // Set new default font family and font color to mimic Bootstrap's default styling
                Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                Chart.defaults.global.defaultFontColor = '#858796';

                // Pie Chart Example
                var ctx = document.getElementById("myPieChart");
                var myPieChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["ingresos", "egresos"],
                    datasets: [{
                    data: [<?php echo $totalIngresosMensuales?>, <?php echo $totalEgresosMensuales?>],
                    backgroundColor: ['#0ECB69', '#EC4B44'],
                    hoverBackgroundColor: ['#0ECB69', '#EC4B44'],
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