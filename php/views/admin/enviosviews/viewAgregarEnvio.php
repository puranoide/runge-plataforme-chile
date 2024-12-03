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

                    <form action="ViewAgregarSucursales.php" method="POST" enctype="multipart/form-data">

                        <div data-mdb-input-init class="form-outline form-white mb-4">
                            <label class="form-label text-dark" for="linkFoto">foto de pedido</label>
                            <input type="file" class="form-control-file" id="archivo" name="archivo" accept=".png, .jpg, .jpeg, .webp" required>

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
                            <select class="form-select" aria-label="Default select example" onchange="obtenerDataDeCamion(this.value)" name="camionSeleccionado" required>
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
                        <div data-mdb-input-init class="form-outline form-white mb-4" id="listadodirecciones">

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
                            <input type="number" step=".01" id="linkFoto" class="form-control form-control-lg" name="sobrecargo" required pattern="\S.*" value="0.00" />

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

            
            function fetchDataDeCamion(valorSeleccionado){
                return fetch("../../../logic/camionporidajax.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        id: parseInt(valorSeleccionado)
                    })
                }) 
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                });
            }
            function fetchDirecciones(ruta){
                var conteinerListDirecciones = document.getElementById("listadodirecciones");
                conteinerListDirecciones.innerHTML = "";
                console.log(ruta);
                
                    // Corregir el path - asegúrate que esta ruta es correcta
                    fetch("../../../logic/direccionesAjax.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            ruta: parseInt(ruta) // Convertir a número
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log("Respuesta completa:", data);
                        if(data.success) {
                            // Crear el select con las direcciones
                            const select = document.createElement("select");
                            select.classList.add("form-select");
                            select.name = "direccion";
                            select.required = true;

                            // Agregar una opción por defecto
                            const defaultOption = document.createElement("option");
                            defaultOption.value = "";
                            defaultOption.textContent = "Seleccione una dirección";
                            defaultOption.selected = true;
                            select.appendChild(defaultOption);
                           
                            // Verificar que data.data existe y es un array
                            if (Array.isArray(data.data)) {
                                console.log("Datos a procesar:", data.data);
                                data.data.forEach(direccion => {
                                    console.log("Procesando dirección:", direccion);
                                    const option = document.createElement("option");
                                    // Asegúrate que estos campos coincidan con la estructura de tu respuesta
                                    option.value = direccion.id || direccion.idregiones || '';
                                    option.textContent = direccion.tipoViaje || direccion.nombreLocal || direccion.tipodeviaje ||direccion.empresa || direccion.zona || '';
                                    select.appendChild(option);
                                });
                            } else {
                                console.error("data.data no es un array:", data.data);
                            }

                            

                            select.onchange = function() {
                                const objetoSeleccionado = data.data.find(dir => dir.id||dir.idregiones == this.value);
                                console.log("Dirección seleccionada:", objetoSeleccionado);
                                localStorage.setItem("direccionSeleccionada", JSON.stringify(objetoSeleccionado));
                                procesarDatos();
                            }

                            // Limpiar el contenedor antes de agregar el nuevo select
                            conteinerListDirecciones.innerHTML = "";
                            conteinerListDirecciones.appendChild(select);
                        } else {
                            console.error("Error en la respuesta:", data.error);
                        }
                    })
                    .catch(error => {
                        console.error('Error en la petición:', error);
                        conteinerListDirecciones.innerHTML = "Error al cargar las direcciones";
                    });
            }
            function actualizarForm() {
                const checkbox = document.getElementById("complementaria");
                var clienteSeleccionado = document.getElementById("cliente").value
                var conteinerRutas = document.getElementById("rutas");
                var conteinerComplementaria = document.getElementById("haycomplementaria");

                const coberturasRunge = [{
                        "id": 1,
                        "nombre": "TUBOPACK"
                    },
                    {
                        "id": 2,
                        "nombre": "ENTREGAS RM"
                    },
                    {
                        "id": 3,
                        "nombre": "REGIONES"
                    },
                    {
                        "id": 4,
                        "nombre": "ENTREGAS RETAUL ORIGEN LO BOZA"
                    },
                    {
                        "id": 5,
                        "nombre": "RUTA COLCHOL"
                    }
                ];

                // Primero limpiamos el contenedor
                conteinerRutas.innerHTML = "";
                const label = document.createElement("label");
                label.classList.add("form-label", "text-dark");
                label.textContent = "Cobertura ";
                conteinerRutas.appendChild(label);

                const select = document.createElement("select");
                select.classList.add("form-select", "mb-4"); // Agrega las clases que necesites
                select.name="ruta";
                select.id="rutas";
                select.required = true;
                select.onchange = function(){
                    evaluarCobertura(this.value);
                }
                const defaultOption = document.createElement("option");
                defaultOption.value = "0";
                defaultOption.textContent = "Selecciona una cobertura";
                defaultOption.selected = true;
                select.appendChild(defaultOption);
                coberturasRunge.forEach(cobertura => {
                    const option = document.createElement("option");
                    option.value = cobertura.id;
                    option.textContent = cobertura.nombre;
                    select.appendChild(option);
                });
                conteinerRutas.appendChild(select);
            }
            function evaluarCobertura(valorSeleccionado){
                console.log(valorSeleccionado);
                var conteinerListDirecciones = document.getElementById("listadodirecciones");
                if(valorSeleccionado == 1){
                    conteinerListDirecciones.innerHTML = "";
                    console.log("TUBOPACK");
                    fetchDirecciones(valorSeleccionado);

                }
                if(valorSeleccionado == 2){
                    console.log("ENTREGAS RM");
                    fetchDirecciones(valorSeleccionado);
                }
                if(valorSeleccionado == 3){
                    console.log("REGIONES");
                    fetchDirecciones(valorSeleccionado);
                }
                if(valorSeleccionado == 4){
                    console.log("ENTREGAS RETAUL ORIGEN LO BOZA");
                    fetchDirecciones(valorSeleccionado);
                }
                if(valorSeleccionado == 5){
                    console.log("RUTA COLCHOL");
                    fetchDirecciones(valorSeleccionado);
                }   
            }

            function obtenerDataDeCamion(valorSeleccionado){
                fetchDataDeCamion(valorSeleccionado)
                    .then(data => {
                        console.log("Datos del camión:", data);
                        localStorage.setItem("camionSeleccionado", JSON.stringify(data));
                        // Aquí puedes usar los datos del camión
                    })
                    .catch(error => {
                        console.error("Error:", error);
                    });
            }
         
            function procesarDatos(){
                var objetoDireccion = JSON.parse(localStorage.getItem("direccionSeleccionada"));
                var objetoCamion = JSON.parse(localStorage.getItem("camionSeleccionado"));
                
                if (objetoDireccion && objetoCamion) {
                    console.log("Datos dirección:", objetoDireccion);
                    console.log("Datos camión:", objetoCamion);
                    console.log("Tipo de cubicaje:", typeof objetoCamion[0].cubicajeCamion);
                    console.log("Valor de cubicaje:", objetoCamion[0].cubicajeCamion);
                    
                    if (objetoCamion[0].cubicajeCamion == "30") {
                        console.log("precio de 30:"+objetoDireccion.precio30);
                    } else if (objetoCamion[0].cubicajeCamion == "50") {
                        console.log("precio de 50:"+objetoDireccion.precio50);
                    } else {
                        console.log("Cubicaje no coincide con ningún valor esperado");
                    }
                } else {
                    console.log("no hay datos");
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
                            select.name="rutacomplementaria";
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