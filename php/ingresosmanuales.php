<?php




function listaringresosManuales($con){
    $mensaje = "no hay ingresos manuales registrados";
    $usuarios = [];
    $sqlUsarios = "SELECT* from ingresosmanuales;";
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

function agregarIngresosManuales($con, $descripcion, $monto)
{
   
    $mensaje = '';
    $sqlAddconductores = "INSERT INTO ingresosmanuales (descripcionIngresosManuales,monto)
                    VALUES('$descripcion','$monto')";

    $ejecutar = mysqli_query($con, $sqlAddconductores);

    if ($ejecutar) {
        $idconductor = mysqli_insert_id($con);
        $mensaje = 'ingreso manual agregado con exito,ID del ingreso manual agregado: ' . $idconductor;
        return $mensaje;
    } else {
        $mensaje = 'ingreso manual no se pudo agregar,intentelo de nuevo o contacte con soporte';
        return $mensaje;
    }
}
function sumatoriaIngresosManuales($listaIngresosManuales){
    
    $total=0;
    $resultados=$listaIngresosManuales;
    $tipoderepuesta=gettype($resultados);
    if($tipoderepuesta=="array"){
        $total=0;
        foreach ($resultados as $ingreso) { 
            # code...
            $total+=$ingreso['monto'];
    
        }
    }else if($tipoderepuesta=="string"){
        $total=0;
    }
   
    return $total;

}



/* 

$resultados=listaringresosManuales($conexion);

echo '<pre>';
print_r ($resultados);
echo '</pre>';


$resultados=listarconductoresPorId($conexion,6);
echo gettype($resultados);
echo '<pre>';
print_r ($resultados);
echo '</pre>';

$resultado=agregarIngresosManuales($conexion,'prueba de ingreso 3',500000.23);
echo $resultado;


$resultado=actualizarConductores($conexion,5,'edgar actualizado');
echo $resultado;

$total=sumatoriaIngresosManuales($resultados);
echo '<pre>';
print_r ($total);
echo '</pre>';

*/


?>