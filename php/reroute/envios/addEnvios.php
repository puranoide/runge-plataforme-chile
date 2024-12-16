<?php
include_once('../../config/conection.php');
include_once('../../logic/enviosv2.php');
echo"<pre>";
print_r($_POST);
echo"</pre>";

if(!isset($_POST["nombreruta"]))
{
$_POST["nombreruta"] = "tubopack";
}

$envio=agregarEnviosV2($conexion,$_POST["codigoEnvio"],$_POST["conductorSeleccionado"],$_POST["camionSeleccionado"],$_POST["clienteSeleccionado"],$_POST["nombreruta"],$_POST["nombre"],$_POST["fechaRegistro"],$_POST["sobrecargo"],$_POST["precio"]);
echo $envio;
/*
echo '<script> alert("envio agregado correctamente");
                window.location="../../views/admin/enviosviews/ViewEnvios.php";
    </script>'*/
?>