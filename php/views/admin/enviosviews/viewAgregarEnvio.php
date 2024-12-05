<?php

include_once('../../../config/rutaprotegida.php');
include_once('../../../config/conection.php');
include_once('../../../logic/conductores.php');
include_once('../../../logic/clientes.php');
include_once('../../../logic/camiones.php');
include_once('../../../logic/tipoDeEnvio.php');
include_once('../../../logic/peonetas.php');
include_once('../../../logic/envios.php');
$conductores = listarconductores($conexion);
$camiones = listarCamiones($conexion);
$clientes = listarClientes($conexion);
$peonetas = listarpeonetas($conexion);
$regiones = obtenerRegiones($conexion);
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
                <?php
                include_once('../../../partials/enviospartials/usercomponent.php');
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <form action="../../../reroute/envios/addEnvios.php" method="POST" enctype="multipart/form-data">

                        <div data-mdb-input-init class="form-outline form-white mb-4">
                            <label class="form-label text-dark" for="linkFoto">foto de pedido</label>
                            <input type="file" class="form-control-file" id="archivo" name="archivo" accept=".png, .jpg, .jpeg, .webp">

                        </div>
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
                            <label class="form-label text-dark" for="linkFoto">Peonetas</label><br>
                            <?php
                            foreach ($peonetas as $peoneta) {
                                echo '
                                    <input type="checkbox" name="peonetas[]" value="' . $peoneta['idPeoneta'] . '"> ' . $peoneta['nombresyapellidoscompletos'] . '<br>
                                    ';
                            }
                            ?>

                        </div>
                        <div data-mdb-input-init class="form-outline form-white mb-4">
                            <label class="form-label text-dark" for="linkFoto">Camiones</label>
                            <select class="form-select" aria-label="Default select example" name="camionSeleccionado" id="camionselect" onchange="camionseleccionado()" required>
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
                        <div data-mdb-input-init class="form-outline form-white mb-4" id="listadoRutas">

                        </div>
                        <div data-mdb-input-init class="form-outline form-white mb-4" id="nombrederuta">

                        </div>

                        <div data-mdb-input-init class="form-outline form-white mb-4" id="listadoDirecciones">

                        </div>

                        <div data-mdb-input-init class="form-outline form-white mb-4" id="haycomplementaria">

                        </div>
                        <div data-mdb-input-init class="form-outline form-white mb-4" id="listadocomplementaria">

                        </div>


                        <div data-mdb-input-init class="form-outline form-white mb-4">
                            <label class="form-label text-dark" for="linkFoto">fecha</label>
                            <input type="date" name="fechaRegistro" id="fechaRegistro">
                        </div>

                        <div data-mdb-input-init class="form-outline form-white mb-4">
                            <label class="form-label text-dark" for="linkFoto">Sobrecargo</label>
                            <input type="number" step=".01" class="form-control form-control-lg" name="sobrecargo" id="sobrecargo" required pattern="\S.*" value="0.00" />

                        </div>
                        <div data-mdb-input-init class="form-outline form-white mb-4" id="precioEnvio">

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
        <script src="../../../../vendor/jquery/jquery.min.js"></script>
        <script src="../../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../../../../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../../../../js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../../../../vendor/chart.js/Chart.min.js"></script>


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
                const checkbox = document.getElementById("complementaria");
                var clienteSeleccionado = document.getElementById("cliente").value
                var conteinerRutas = document.getElementById("rutas");
                var conteinerComplementaria = document.getElementById("haycomplementaria");
                var formularioCanontex = `
                    <label class="form-label text-dark" for="linkFoto">rutas para el cliente</label>
                    <select class="form-select" aria-label="Default select example" name="ruta" id="coberturas" onchange="cargarDirecciones()"  required>
                    <option value="0">Selecciona una cobertura</option>
                    <option value="1">Entregas RM</option>
                    <option value="2">Regiones</option>
                    <option value="3">E.Retail origen LO BOZA</option>
                    <option value="4">Ruta Colchon</option>
                    </select>
                    `;

                var formularioAlicomer = `
                    <label class="form-label text-dark" for="linkFoto">rutas para el cliente</label>
                            <select class="form-select" aria-label="Default select example" name="ruta" id="rutas" required>
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
                    //conteinerComplementaria.innerHTML = '<input type="checkbox" name="haycomplementariavalor" id="complementaria" onchange="haycomplementaria()">complementaria</input>'

                } else if (clienteSeleccionado === "5") {
                    conteinerRutas.innerHTML = formularioAlicomer;
                } else if (clienteSeleccionado === "6" || clienteSeleccionado === "7") {
                    conteinerRutas.innerHTML = formularionutriscocastaño;
                } else {
                    console.warn("Cliente no identificado o no hay formulario disponible.");
                }
            }

            function haycomplementaria() {
                const checkbox = document.getElementById("complementaria");
                const rutaseleccionada = document.getElementById("regiones");
                const conteinerListComplementaria = document.getElementById("listadocomplementaria");

                if (checkbox.checked) {
                    // Enviar valor a PHP usando fetch
                    fetch("../../../logic/regionescomplementariasajax.php", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                            },
                            body: JSON.stringify({
                                ruta: rutaseleccionada.value,
                                nombre: rutaseleccionada.options[rutaseleccionada.selectedIndex].text
                            }),
                        })
                        .then((response) => response.json())
                        .then((data) => {
                            console.log("Respuesta del servidor:", data);

                            // Limpiar el contenido de listadocomplementaria
                            conteinerListComplementaria.innerHTML = "";

                            // Crear un elemento <select>
                            const select = document.createElement("select");
                            select.classList.add("form-select", "mb-4"); // Agrega las clases que necesites
                            select.name = "rutacomplementaria";
                            // Llenar el <select> con opciones a partir del JSON
                            data.forEach((direccion) => {
                                const option = document.createElement("option");
                                option.value = direccion.idregioncomplementaria; // Asumiendo que el JSON tiene un campo `id`
                                option.textContent = direccion.nombrelocal; // Asumiendo que el JSON tiene un campo `nombre`
                                select.appendChild(option);
                            });

                            // Insertar el <select> en el contenedor listadocomplementaria
                            conteinerListComplementaria.appendChild(select);
                        })
                        .catch((error) => console.error("Error:", error));

                    console.log("Checkbox seleccionado");
                } else {
                    // Limpiar el contenido de listadocomplementaria si el checkbox no está seleccionado
                    conteinerListComplementaria.innerHTML = "";
                    console.log("Checkbox no seleccionado");
                }
            }

            function cargarDirecciones() {
                const listadoRutas = document.getElementById("listadoRutas");
                const coberturaseleccionada = document.getElementById("coberturas").value;
                const coberturaseleccionadaobj = document.getElementById("coberturas");
                const textrutaseleccionada=coberturaseleccionadaobj.options[coberturaseleccionadaobj.selectedIndex];
                const nombrerutaconteiner=document.getElementById("nombrederuta");


                var inputnombreruta=document.createElement("input");
                inputnombreruta.value=textrutaseleccionada.textContent;
                inputnombreruta.name="nombreruta";
                nombrerutaconteiner.appendChild(inputnombreruta);

                if (coberturaseleccionada === "1") {
                    fecthDirecciones(coberturaseleccionada);
                } else if (coberturaseleccionada === "2") {
                    fecthDirecciones(coberturaseleccionada);

                } else if (coberturaseleccionada === "3") {
                    fecthDirecciones(coberturaseleccionada);
                } else if (coberturaseleccionada === "4") {
                    fecthDirecciones(coberturaseleccionada);
                }
            };

            function fecthDirecciones(listSelect) {
                const conteinerListadoDirecciones = document.getElementById("listadoDirecciones");

                fetch("../../../logic/regionescomplementariasajax.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify({
                            ruta: listSelect
                        }),
                    })
                    .then((response) => response.json())
                    .then((data) => {
                        if (!data || data.length === 0) {
                            console.error("No se recibieron datos del servidor");
                            return;
                        }

                        // Crear el select una sola vez
                        const select = document.createElement("select");
                        select.classList.add("form-select");
                        select.name = "direccion";
                        select.required = true;

                        // Agregar opción por defecto
                        const defaultOption = document.createElement("option");
                        defaultOption.value = "";
                        defaultOption.textContent = "Seleccione una dirección";
                        defaultOption.selected = true;
                        select.appendChild(defaultOption);

                        // Agregar las opciones del servidor
                        data.forEach((direccion) => {
                            const option = document.createElement("option");
                            option.value = direccion.id || direccion.idregiones || "";
                            option.textContent = direccion.tipoViaje || direccion.nombreLocal || direccion.tipodeviaje || direccion.empresa || direccion.zona || "";
                            select.appendChild(option);
                        });

                        // Limpiar el contenedor y agregar el select
                        conteinerListadoDirecciones.innerHTML = ""; // Limpia antes de agregar
                        conteinerListadoDirecciones.appendChild(select);

                        // Manejar el evento onchange
                        select.onchange = function() {
                            const objetoSeleccionado = data.find(dir => dir.id == this.value || dir.idregiones == this.value);
                            console.log("Dirección seleccionada:", objetoSeleccionado);
                            // Guardar en localStorage
                            localStorage.setItem("direccionSeleccionada", JSON.stringify(objetoSeleccionado));
                            inputnombre = document.getElementById("Direccionpickeada");

                            if (!inputnombre) {
                                // Crear el input solo si se selecciona algo
                                inputnombre = document.createElement("input");
                                inputnombre.type = "text";
                                inputnombre.name = "nombre";
                                inputnombre.id = "Direccionpickeada"
                                inputnombre.value = objetoSeleccionado.direccion || objetoSeleccionado.tipodeviaje || objetoSeleccionado.zona; // Maneja null o undefined

                                // Agregar el input al contenedor
                                conteinerListadoDirecciones.appendChild(inputnombre);
                            }
                            // Actualizar el valor del input
                            inputnombre.value = objetoSeleccionado.direccion || objetoSeleccionado.tipodeviaje || objetoSeleccionado.zona; // Maneja null o undefined
                            console.log("Se seleccionó una nueva dirección.");
                            procesarDatos();
                        };
                    })
                    .catch((error) => console.error("Error:", error));
            }


            function camionseleccionado() {
                const camionseleccionado = document.getElementById("camionselect").value;
                console.log(camionseleccionado);
                fetchCamiones(camionseleccionado);
            }

            function fetchCamiones(idCamion) {

                fetch("../../../logic/camionporidajax.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify({
                            id: idCamion,

                        }),
                    })
                    .then((response) => response.json())
                    .then((data) => {

                        localStorage.setItem("camionseleccionado", JSON.stringify(data));

                    })
                    .catch((error) => console.error("Error:", error));
            }

            function procesarDatos() {
                var camion = JSON.parse(localStorage.getItem("camionseleccionado"));
                var direccion = JSON.parse(localStorage.getItem("direccionSeleccionada"));
                const conteinerprecio = document.getElementById("precioEnvio");
                var precio = 0;
                console.log("camion:" + camion);
                console.log("direccion:" + direccion);
                console.log("camion cubicaje:" + camion[0].cubicajeCamion);
                if (camion[0].cubicajeCamion === "30") {
                    console.log("precio de 30:" + direccion.precio30)
                    precio = direccion.precio30;
                } else if (camion[0].cubicajeCamion === "50") {
                    console.log("precio de 50:" + direccion.precio50)
                    precio = direccion.precio50;
                }
                conteinerprecio.innerHTML = "";
                const h1 = document.createElement("input");
                h1.type = "text";
                h1.name = "precio";
                var sobrecargo = actualizarTotal();
                h1.value = precio;
                conteinerprecio.appendChild(h1);

            }

            function actualizarTotal() {
                return document.getElementById("sobrecargo").value;
            }
            document.getElementById("sobrecargo").addEventListener("change", actualizarTotal);
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script>
            $(document).ready(function() {

                var now = new Date();

                var day = ("0" + now.getDate()).slice(-2);
                var month = ("0" + (now.getMonth() + 1)).slice(-2);

                var today = now.getFullYear() + "-" + (month) + "-" + (day);
                $("#fechaRegistro").val(today);
            });
        </script>
</body>

</html>