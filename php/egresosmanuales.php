<?php



function listarEgresosManuales($con)
{
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
function sumatoriaEgresosManuales($listarEgresosmanuales)
{

    $total = 0;
    $resultados = $listarEgresosmanuales;
    $tipoderepuesta = gettype($resultados);
    if ($tipoderepuesta == "array") {
        $total = 0;
        foreach ($resultados as $egreso) {
            # code...
            $total += $egreso['montoEgresosManuales'];
        }
    } else if ($tipoderepuesta == "string") {
        $total = 0;
    }

    return $total;
}

function egresosMensuales($con)
{
    $mensaje = "no hay Egresos manuales registrados";
    $usuarios = [];
    $sqlUsarios = "SELECT *
    FROM egresosmanuales
    WHERE MONTH(fechaRegistrada) = MONTH(NOW());";
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
function egresosanuales($con){
    $mensaje = "no hay Egresos manuales registrados";
    $usuarios = [];
    $sqlUsarios = "SELECT *
    FROM egresosmanuales
    WHERE YEAR(fechaRegistrada) = YEAR(NOW());";
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

function sumatoriaEgresosManualesMensuales($listaegresosmensuales){
    $total = 0;
    $resultados = $listaegresosmensuales;
    $tipoderepuesta = gettype($resultados);
    if ($tipoderepuesta == "array") {
        $total = 0;
        foreach ($resultados as $egreso) {
            # code...
            $total += $egreso['montoEgresosManuales'];
        }
    } else if ($tipoderepuesta == "string") {
        $total = 0;
    }

    return $total;
}
function sumatoriaEgresosManualesAnuales($listaegresosanuales){
    $total = 0;
    $resultados = $listaegresosanuales;
    $tipoderepuesta = gettype($resultados);
    if ($tipoderepuesta == "array") {
        $total = 0;
        foreach ($resultados as $egreso) {
            # code...
            $total += $egreso['montoEgresosManuales'];
        }
    } else if ($tipoderepuesta == "string") {
        $total = 0;
    }

    return $total;
}
function filtaregresosmanualesporfechas($con,$inicio,$fin){
    $mensaje = "no hay egresos registrados de la fecha: " . $inicio . ' hasta: ' . $fin;
    $usuarios = [];
    
    $sqlUsuarios = "SELECT * FROM egresosmanuales WHERE 1=1";
    
    if (!empty($inicio) && !empty($fin)) {
        // Si ambas fechas están especificadas
        $sqlUsuarios .= " AND fechaRegistrada BETWEEN '$inicio' AND '$fin'";
    } elseif (!empty($inicio)) {
        // Si solo se especifica la fecha de inicio
        $sqlUsuarios .= " AND fechaRegistrada = '$inicio'";
    } elseif (!empty($fin)) {
        // Si solo se especifica la fecha de fin
        $sqlUsuarios .= " AND fechaRegistrada <= '$fin'";
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

$resultados=egresosMensuales($conexion);

echo '<pre>';
print_r ($resultados);
echo '</pre>';

$resultados=egresosMensuales($conexion);

echo '<pre>';
print_r ($resultados);
echo '</pre>';

$total=sumatoriaEgresosManualesMensuales($resultados);
echo '<pre>';
print_r ($total);
echo '</pre>';

*/
