<?php

include_once('conection.php');
include_once('envios.php');
$idenvio=$_POST['idEnvio'];
$conductor=$_POST['conductorSeleccionado'];
$camion=$_POST['camionSeleccionado'];
$cliente=$_POST['clienteSeleccionado'];
$estado=$_POST['estadoEnvio'];

$resultado=ActualizarEnvios($conexion,$idenvio,$conductor,$camion,$cliente,$estado,'','');
    echo '
    <script>
    alert("'.$resultado.'");
    window.location="ViewEnvios";
    </script>
    ';



?>