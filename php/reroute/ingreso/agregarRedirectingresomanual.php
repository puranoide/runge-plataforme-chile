<?php

include_once('../../config/conection.php');
include_once('../../logic/ingresosmanuales.php');
$descripcion=$_POST['descripcionIngresoManual'];
$montoDescripcionManual=$_POST['montoDescripcionManual'];
$fecha=$_POST['fechaRegistro'];
$resultado=agregarIngresosManuales($conexion,$descripcion,$montoDescripcionManual,$fecha);
    echo '
    <script>
    alert("'.$resultado.'");
    window.location="../../views/admin/ingresosmanualesviews/viewIngresosManuales.php";
    </script>
    ';



?>