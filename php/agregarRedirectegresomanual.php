<?php

include_once('conection.php');
include_once('egresosmanuales.php');
$descripcion=$_POST['descripcionegresoManual'];
$montoDescripcionManual=$_POST['montoDescripcionManual'];

$resultado=agregaregresosManuales($conexion,$descripcion,$montoDescripcionManual);
    echo '
    <script>
    alert("'.$resultado.'");
    window.location="viewEgresosManuales.php";
    </script>
    ';



?>