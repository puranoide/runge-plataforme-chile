<?php
include_once('../../config/conection.php');
include_once('../../logic/enviosv2.php');
echo"<pre>";
print_r($_POST);
echo"</pre>";

$envio=agregarEnviosV2($conexion,$_POST["codigoEnvio"],$_POST["conductorSeleccionado"],$_POST["camionSeleccionado"],$_POST["clienteSeleccionado"],$_POST["nombreruta"],$_POST["nombre"],$_POST["fechaRegistro"],$_POST["sobrecargo"],$_POST["precio"]);

echo '<script> alert("envio agregado correctamente");
                window.location="../../views/admin/enviosviews/ViewEnvios.php";
    </script>'
?>