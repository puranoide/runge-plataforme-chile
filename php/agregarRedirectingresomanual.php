<?php

include_once('conection.php');
include_once('ingresosmanuales.php');
$descripcion=$_POST['descripcionIngresoManual'];
$montoDescripcionManual=$_POST['montoDescripcionManual'];
$fecha=$_POST['fechaRegistro'];
$resultado=agregarIngresosManuales($conexion,$descripcion,$montoDescripcionManual,$fecha);
    echo '
    <script>
    alert("'.$resultado.'");
    window.location="viewIngresosManuales.php";
    </script>
    ';



?>