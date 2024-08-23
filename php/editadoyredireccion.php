<?php

include_once('conection.php');
include_once('envios.php');
$idenvio=$_POST['idEnvio'];
$conductor=$_POST['conductorSeleccionado'];
$camion=$_POST['camionSeleccionado'];
$cliente=$_POST['clienteSeleccionado'];
$estado=$_POST['estadoEnvio'];

$resultado=ActualizarEnvios($conexion,$idenvio,$conductor,$camion,$cliente,$estado,'','');
$bonos=insertarbonosDelEnvio($conexion,$idenvio);
    echo '
    <script>
    alert("'.$resultado.','.$bonos.'");
    window.location="ViewEnvios";
    </script>
    ';



?>