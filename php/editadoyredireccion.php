<?php

include_once('conection.php');
include_once('envios.php');
$idenvio=$_POST['idEnvio'];
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
    window.location="ViewEnvios.php";
    </script>
    ';



?>