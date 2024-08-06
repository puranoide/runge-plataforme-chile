<?php



function listarEgresosManuales($con){
    $mensaje = "no hay Egresos manuales registrados";
    $usuarios = [];
    $sqlUsarios = "SELECT* from egresosmanuales;";
    $resultUsuarios = $con->query($sqlUsarios);

    if ($resultUsuarios->num_rows > 0) {
        while ($rowUsuarios = $resultUsuarios->fetch_assoc()) {
            $usuarios[] = $rowUsuarios;
        }
    } else {
        return $mensaje;
    }

    return $usuarios;
}

function agregaregresosManuales($con, $descripcion, $monto)
{
    $date = new DateTime();
    $date->modify('-7 hours');
    $dateFormat = $date->format('Y-m-d H:i:s');
    $mensaje = '';
    $sqlAddconductores = "INSERT INTO egresosmanuales (descripcionEgresosManuales,montoEgresosManuales,fechaRegistrada)
                    VALUES('$descripcion','$monto','$dateFormat')";

    $ejecutar = mysqli_query($con, $sqlAddconductores);

    if ($ejecutar) {
        $idconductor = mysqli_insert_id($con);
        $mensaje = 'egreso manual agregado con exito,ID del ingreso manual agregado: ' . $idconductor;
        return $mensaje;
    } else {
        $mensaje = 'egreso manual no se pudo agregar,intentelo de nuevo o contacte con soporte';
        return $mensaje;
    }
}
function sumatoriaEgresosManuales($listarEgresosanuales){
    
    $total=0;
    $resultados=$listarEgresosanuales;
    $tipoderepuesta=gettype($resultados);
    if($tipoderepuesta=="array"){
        $total=0;
        foreach ($resultados as $egreso) { 
            # code...
            $total+=$egreso['montoEgresosManuales'];
    
        }
    }else if($tipoderepuesta=="string"){
        $total=0;
    }
   
    return $total;

}




/* 

$resultados=listarEgresosManuales($conexion);

echo '<pre>';
print_r ($resultados);
echo '</pre>';



$resultados=listarconductoresPorId($conexion,6);
echo gettype($resultados);
echo '<pre>';
print_r ($resultados);
echo '</pre>';

$resultado=agregaregresosManuales($conexion,'prueba de engreso 2',30.23);
echo $resultado;


$resultado=actualizarConductores($conexion,5,'edgar actualizado');
echo $resultado;

$total=sumatoriaIngresosManuales($resultados);
echo '<pre>';
print_r ($total);
echo '</pre>';

*/


?>