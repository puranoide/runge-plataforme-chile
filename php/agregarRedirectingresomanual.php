<?php

include_once('conection.php');
include_once('ingresosmanuales.php');
$descripcion=$_POST['descripcionIngresoManual'];
$montoDescripcionManual=$_POST['montoDescripcionManual'];

$resultado=agregarIngresosManuales($conexion,$descripcion,$montoDescripcionManual);
    echo '
    <script>
    alert("'.$resultado.'");
    window.location="viewIngresosManuales.php";
    </script>
    ';



?>