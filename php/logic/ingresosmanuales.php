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

function agregarIngresosManuales($con, $descripcion, $monto,$fecha)
{
    $date = new DateTime();
    $date->modify('-7 hours');
    $dateFormat = $date->format('Y-m-d H:i:s');
    $mensaje = '';
    $sqlAddconductores = "INSERT INTO ingresosmanuales (descripcionIngresosManuales,monto,fechaIngresoManual)
                    VALUES('$descripcion','$monto','$fecha')";

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
function ingresosMensuales($con)
{
    $mensaje = "no hay ingresos manuales registrados";
    $usuarios = [];
    $sqlUsarios = "SELECT *
    FROM ingresosmanuales
    WHERE MONTH(fechaIngresoManual) = MONTH(NOW());";
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
function ingresosanuales($con){
    $mensaje = "no hay ingresos manuales registrados";
    $usuarios = [];
    $sqlUsarios = "SELECT *
    FROM ingresosmanuales
    WHERE YEAR(fechaIngresoManual) = YEAR(NOW());";
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

function sumatoriaIngresosManualesMensuales($listaIngresosmensuales){
    $total = 0;
    $resultados = $listaIngresosmensuales;
    $tipoderepuesta = gettype($resultados);
    if ($tipoderepuesta == "array") {
        $total = 0;
        foreach ($resultados as $ingreso) {
            # code...
            $total += $ingreso['monto'];
        }
    } else if ($tipoderepuesta == "string") {
        $total = 0;
    }

    return $total;
}
function sumatoriaIngresosManualesAnuales($listaIngresosanuales){
    $total = 0;
    $resultados = $listaIngresosanuales;
    $tipoderepuesta = gettype($resultados);
    if ($tipoderepuesta == "array") {
        $total = 0;
        foreach ($resultados as $ingreso) {
            # code...
            $total += $ingreso['monto'];
        }
    } else if ($tipoderepuesta == "string") {
        $total = 0;
    }

    return $total;
}
function filtaringresosmanualesporfechas($con,$inicio,$fin){
    $mensaje = "no hay ingresos registrados de la fecha: " . $inicio . ' hasta: ' . $fin;
    $usuarios = [];
    
    $sqlUsuarios = "SELECT * FROM ingresosmanuales WHERE 1=1";
    
    if (!empty($inicio) && !empty($fin)) {
        // Si ambas fechas están especificadas
        $sqlUsuarios .= " AND fechaIngresoManual BETWEEN '$inicio' AND '$fin'";
    } elseif (!empty($inicio)) {
        // Si solo se especifica la fecha de inicio
        $sqlUsuarios .= " AND fechaIngresoManual = '$inicio'";
    } elseif (!empty($fin)) {
        // Si solo se especifica la fecha de fin
        $sqlUsuarios .= " AND fechaIngresoManual <= '$fin'";
    }
    
    // Ejecutar la consulta
    $resultUsuarios = $con->query($sqlUsuarios);
    
    if ($resultUsuarios->num_rows > 0) {
        while ($rowUsuarios = $resultUsuarios->fetch_assoc()) {
            $usuarios[] = $rowUsuarios;
        }
    } else {
        return $mensaje;
    }
    
    return $usuarios;
    
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