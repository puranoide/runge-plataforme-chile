<?php

include_once('../../config/conection.php');
include_once('../../logic/egresosCamiones.php');
$descripcion=$_POST['descripcionegresocamion'];
$montoDescripcionManual=$_POST['montoDescripcionCamion'];
$tipodeseleccionado=$_POST['tipodeseleccionado'];
$camionseleccionado=$_POST['camionseleccionado'];
$fecha=$_POST['fechaRegistro'];
$resultado=agregarEgresosCamiones($conexion,$descripcion,$montoDescripcionManual,'/pruebaingresoFoto',$tipodeseleccionado,$camionseleccionado,$fecha);
    echo '
    <script>
    alert("'.$resultado.'");
    window.location="../../../views/admin/camionesviews/viewListadoEgresoCamion.php";
    </script>
    ';
?>