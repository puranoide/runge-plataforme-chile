<?php

include_once('../../config/conection.php');
include_once('../../logic/egresosmanuales.php');
$descripcion=$_POST['descripcionegresoManual'];
$montoDescripcionManual=$_POST['montoDescripcionManual'];
$fecha=$_POST['fechaRegistro'];
$resultado=agregaregresosManuales($conexion,$descripcion,$montoDescripcionManual,$fecha);
    echo '
    <script>
    alert("'.$resultado.'");
    window.location="../../views/admin/egresosmanualesviews/viewEgresosManuales.php";
    </script>
    ';



?>