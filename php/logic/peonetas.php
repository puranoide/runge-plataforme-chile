<?php

function listarpeonetas($con)
{
    $mensaje = "no hay peonetas registrados";
    $gestores = [];
    $sqlconductores = "SELECT * from peonetas";
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

?>