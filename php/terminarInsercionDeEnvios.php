<?php

include_once('conection.php');
include_once('envios.php');
$id=$_POST['idEnvio'];

$Respuesta=insertarMontoDeEnvio($conexion,$id);

    echo '
    <script>
    alert("'.$Respuesta.'");
    window.location="ViewEnvios";
    </script>
    ';



?>