<?php

include_once('../../config/conection.php');
include_once('../../logic/envios.php');
$id=$_POST['idEnvio'];

$Respuesta=insertarMontoDeEnvio($conexion,$id);




    echo '
    <script>
    alert("'.$Respuesta.'");
    window.location="../../views/admin/enviosviews/ViewEnvios.php";
    </script>
    ';


?>