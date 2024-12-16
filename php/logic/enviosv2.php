<?php

function agregarEnviosV2($con,$codigo,$conductor,$camion,$proveedor,$ruta,$direccion,$date,$sobrecargo,$precio)
{
    $mensaje = '';
    $sqlAddenvios = "INSERT INTO enviosv2 (codigoP,conductor,camion,proveedor,ruta,direccion,dateCreated,sobreCargo,precio)
                    VALUES('$codigo','$conductor','$camion','$proveedor','$ruta','$direccion','$date','$sobrecargo','$precio')";
    $ejecutar = mysqli_query($con, $sqlAddenvios);

    if ($ejecutar) {
        $idconductor = mysqli_insert_id($con);
        $mensaje = 'gestor agregado con exito,ID del gestor agregado: ' . $idconductor;
        return $idconductor;
    } else {
        $mensaje = 'gestor no se pudo agregar,intentelo de nuevo o contacte con soporte';
        return $mensaje;
    }
}


function listEnviosv2($con)
{
    $mensaje = "no hay envios registrados";
    $gestores = [];
    $sqlconductores = "SELECT * from enviosv2";
    $resultConductores = $con->query($sqlconductores);

    if ($resultConductores->num_rows > 0) {
        while ($rowConductores = $resultConductores->fetch_assoc()) {
            $gestores[] = $rowConductores;
        }
    } else {
        return $mensaje;
    }

    return $gestores;
}
function listarEnviosDelAñov2($con)
{
    $mensaje = "no hay envios registrados";
    $gestores = [];
    $sqlconductores = "SELECT * from enviosv2  WHERE YEAR(dateCreated) = YEAR(NOW())";
    $resultConductores = $con->query($sqlconductores);

    if ($resultConductores->num_rows > 0) {
        while ($rowConductores = $resultConductores->fetch_assoc()) {
            $gestores[] = $rowConductores;
        }
    } else {
        return $mensaje;
    }

    return $gestores;
};
function listarEnviosDelMesv2($con)
{
    $mensaje = "no hay envios registrados";
    $gestores = [];
    $sqlconductores = "SELECT * from enviosv2  WHERE YEAR(dateCreated) = YEAR(NOW())
    AND MONTH(dateCreated) = MONTH(NOW())";
    $resultConductores = $con->query($sqlconductores);

    if ($resultConductores->num_rows > 0) {
        while ($rowConductores = $resultConductores->fetch_assoc()) {
            $gestores[] = $rowConductores;
        }
    } else {
        return $mensaje;
    }

    return $gestores;
};
function sumatoriaIngresosPorenviov2($listadeenvios)
{

    $total = 0;
    $resultados = $listadeenvios;
    $tipoderepuesta = gettype($resultados);
    if ($tipoderepuesta == "array") {
        $total = 0;
        foreach ($resultados as $envio) {
            # code...
            $total += $envio['precio'];
        }
    } else if ($tipoderepuesta == "string") {
        $total = 0;
    }

    return $total;
}

function sumatoriaEgresosPorenviov2($listadeenvios)
{

    $total = 0;
    $resultados = $listadeenvios;
    $tipoderepuesta = gettype($resultados);
    if ($tipoderepuesta == "array") {
        $total = 0;
        foreach ($resultados as $envio) {
            # code...
            $total += $envio['sobrecargo'];
        }
    } else if ($tipoderepuesta == "string") {
        $total = 0;
    }

    return $total;
}

?>