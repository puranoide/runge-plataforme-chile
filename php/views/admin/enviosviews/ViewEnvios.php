<?php
include_once('../../../config/rutaprotegida.php');
include_once('../../../config/conection.php');
include_once('../../../logic/camiones.php');
include_once('../../../logic/envios.php');
include_once('../../../logic/conductores.php');
include_once('../../../logic/clientes.php');
include_once('../../../logic/tipoDeEnvio.php');
$envios = listEnvios($conexion);

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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../../../css/sb-admin-2.min.css" rel="stylesheet">
    <style>

    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include_once('../../../partials/enviospartials/menucomponent.php');
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once('../../../partials/enviospartials/usercomponent.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="table-responsive">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                            <th scope="col">id</th>
                                <th scope="col">codigo</th>
                                <th scope="col">camion</th>
                                <th scope="col">conductor</th>
                                <th scope="col">cliente</th>
                                <th scope="col">registrado</th>
                                <th scope="col">inicio</th>
                                <th scope="col">final</th>
                                <th scope="col">estado</th>
                                <th scope="col">comentario</th>
                                <th scope="col">foto</th>
                                <th scope="col">monto</th>
                                <th scope="col">bono conductor</th>
                                <th scope="col">bono peoneta</th>
                                <th scope="col">tipo de viaje</th>
                                <th scope="col">sobrecargo</th>
                                <th scope="col">detalles</th>
                                <th scope="col">editar</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $tipodeRespuesta = gettype($envios);
                            if ($tipodeRespuesta == 'array') {
                                foreach ($envios as $envio) {
                                    $estadoString = '';
                                    if ($envio['estadoEnvio'] == 1) {
                                        $estadoString = 'Activo';
                                    } else if ($envio['estadoEnvio'] == 2) {
                                        $estadoString = 'iniciado';
                                    } else if ($envio['estadoEnvio'] == 3) {
                                        $estadoString = 'terminado';
                                    }
                                    $camion = listarCamionesPorId($conexion, $envio['idCamionFk']);
                                    $conductor = listarconductoresPorId($conexion, $envio['idConductorFk']);
                                    $cliente = listarClientesPorId($conexion, $envio['idClienteFk']);
                                    $tipodeenvio = listarTipoDeViajePorId($conexion, $envio['tipoDeViajeFK']);
                                    echo '
                                
                                <tr>
                                <td>' . $envio['idEnvio'] . '</td>
                                <td>' . $envio['codigoEnvio'] . '</td>
                                <td>' . $camion[0]['placaCamion'] . '</td>
                                <td>' . $conductor[0]['completenameconductor'] . '</td>
                                <td>' . $cliente[0]['nombreCliente'] . '</td>
                                <td>' . $envio['fechaRegistrada'] . '</td>
                                <td>' . $envio['fechaInicio'] . '</td>
                                <td>' . $envio['fechaFinal'] . '</td>
                                <td>' . $estadoString . '</td>
                                <td>' . $envio['comentarioEnvio'] . '</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#imageModal" onclick="showImageModal(\'' . htmlspecialchars($envio['rutaFotoEnvio'], ENT_QUOTES) . '\')">Ver</button>
                                </td>
                                <td>$' . number_format($envio['montoViaje'], 2, '.', ',') . '</td>
                                <td>' . number_format($envio['bonoConductor'], 2, '.', ',') . '</td>
                                <td>' . number_format($envio['bonoPeoneta'], 2, '.', ',')  . '</td>
                                <td>tipo de envio</td>
                                 <td>' . number_format($envio['sobreCargo'], 2, '.', ',') . '</td>
                                <td>
                                <form action="detalleEnvio.php" method="POST">
                                <input type="hidden" id="linkFoto" name="idEnvio" value="' . $envio['idEnvio'] . '" />
                                <button type="submit" class="btn btn-success">Ver</button>
                                </form>
                                </td>
                                 <td>
                                <form action="editarEnvioView.php" method="POST">
                                <input type="hidden" id="linkFoto" name="idEnvio" value="' . $envio['idEnvio'] . '" />
                                <button type="submit" class="btn btn-warning">editar</button>
                                </form>
                                </td>
                                 </tr>
                                
                                ';
                                }
                            } else if ($tipodeRespuesta == 'string') {
                                echo $envios;
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
        <div class="modal fade" id="logoutModalimgpedido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            
        </div>

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
        <script src="../../../../vendor/jquery/jquery.min.js"></script>
        <script src="../../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../../../../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../../../../js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../../../../vendor/chart.js/Chart.min.js"></script>


        <!-- Page level custom scripts -->
        <script src="../../js/demo/chart-area-demo.js"></script>
        <script src="../../js/demo/chart-bar-demo.js"></script>

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

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imageModalLabel">Imagen del Envío</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img id="modalImage" src="" alt="Imagen de Envío" class="img-fluid">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>
function showImageModal(imageUrl) {
    // Establece la URL de la imagen en el modal
    document.getElementById('modalImage').src = imageUrl;
}
</script>
