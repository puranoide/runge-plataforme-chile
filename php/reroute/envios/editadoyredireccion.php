<?php

include_once('../../config/conection.php');
include_once('../../logic/envios.php');

$idenvio=$_POST['idEnvio'];
echo $idenvio;
$conductor=$_POST['conductorSeleccionado'];
$camion=$_POST['camionSeleccionado'];
$cliente=$_POST['clienteSeleccionado'];
$estado=$_POST['estadoEnvio'];
$sobrecargo=$_POST['sobrecargo'];
$resultado=ActualizarEnvios($conexion,$idenvio,$conductor,$camion,$cliente,$estado,'','',$sobrecargo);
$montos=insertarMontoDeEnvio($conexion,$idenvio);
$bonos=insertarbonosDelEnvio($conexion,$idenvio);

    echo '
    <script>
    alert("'.$resultado.','.$bonos.','.$montos.'");
    window.location="../../views/admin/enviosviews/ViewEnvios.php";
    </script>
    ';



?>