<?php

include_once('conection.php');
include_once('egresosmanuales.php');
$descripcion=$_POST['descripcionegresoManual'];
$montoDescripcionManual=$_POST['montoDescripcionManual'];
$fecha=$_POST['fechaRegistro'];
$resultado=agregaregresosManuales($conexion,$descripcion,$montoDescripcionManual,$fecha);
    echo '
    <script>
    alert("'.$resultado.'");
    window.location="viewEgresosManuales.php";
    </script>
    ';



?>