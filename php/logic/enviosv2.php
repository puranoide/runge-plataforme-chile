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

function sumTotales($con)
{
    $sql = "SELECT SUM(precio) as total FROM enviosv2";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    $total = $row['total'];
    return $total;
}


?>