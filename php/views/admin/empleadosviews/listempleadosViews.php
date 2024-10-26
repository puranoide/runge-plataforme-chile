<?php
include_once('../../../config/rutaprotegida.php');
include_once('../../../config/conection.php');
include_once('../../../logic/peonetas.php');
include_once('../../../logic/conductores.php');
$conductores=listarconductores($conexion);
$peonetas=listarpeonetas($conexion);
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
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
    <link href="../../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include_once('../../../partials/empleadospartials/menucomponent.php');
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once('../../../partials/empleadospartials/usercomponent.php'); ?>
                <!-- End of Topbar -->

                <div class="accordion accordion-flush p-3" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                conductores
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                            <div class="table-responsive">
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">nombres</th>
                                            <th scope="col">ingreso</th>
                                            <th scope="col">ver</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $tipodeRespuesta = gettype($conductores);
                                        if ($tipodeRespuesta == 'array') {
                                            foreach ($conductores as $conductor) {
                                               echo '
                                               
                                                <tr>
                                                <td>'.$conductor['completenameconductor'].'</td>
                                                <td>'.$conductor['fechaingresoconductor'].'</td>
                                                <td><form action="verconductor.php" method="post"><input type="hidden" name="idconductor" value="'.$conductor['idconductor'].'"><button class="btn btn-info" type="submit">ver</button></form></td>
                                                </tr>
                                               ';

                                            }
                                        }else if ($tipodeRespuesta == 'string') {
                                            echo '<tr><td colspan="5">No hay conductores.</td></tr>';
                                        }
                           
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Peonetas
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">nombres</th>
                                            <th scope="col">rut</th>
                                            <th scope="col">ingreso</th>
                                            <th scope="col">correo</th>
                                            <th scope="col">ver</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $tipodeRespuesta = gettype($peonetas);
                                        if ($tipodeRespuesta == 'array') {
                                            foreach ($peonetas as $peoneta) {
                                               echo '
                                               
                                                <tr>
                                                <td>'.$peoneta['nombresyapellidoscompletos'].'</td>
                                                <td>'.$peoneta['rut'].'</td>
                                                <td>'.$peoneta['fechadeingresopeoneta'].'</td>
                                                <td>'.$peoneta['correopeoneta'].'</td>
                                                <td><form action="verpeoneta.php" method="post"><input type="hidden" name="idpeoneta" value="'.$peoneta['idPeoneta'].'"><button class="btn btn-info" type="submit">ver</button></form></td>
                                                </tr>
                                               ';

                                            }
                                        }else if ($tipodeRespuesta == 'string') {
                                            echo '<tr><td colspan="5">No hay peonetas.</td></tr>';
                                        }
                           
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Begin Page Content -->
                

                
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
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
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
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable({
                    "order": [
                        [0, "desc"]
                    ] // Ordena la primera columna (índice 0) de forma descendente por defecto
                });
            });
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