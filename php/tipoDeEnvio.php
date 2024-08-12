<?php 
include_once('conection.php');
function listTipoDeEnvio($con){
    $mensaje = "no hay tipos de envios registrados";
    $gestores = [];
    $sqlconductores = "SELECT * from tiposDeViajes";
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

function listarTipoDeViajePorCliente($con,$id){
    $mensaje = "no hay viajes con el cliente con el id :".$id;
    $usuarios = [];
    $sqlUsarios = "SELECT* from tiposDeViajes WHERE clienteFK=$id;";
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

function listarTipoDeViajePorId($con,$id){
    $mensaje = "no hay tipo de viajes con el id :".$id;
    $usuarios = [];
    $sqlUsarios = "SELECT* from tiposDeViajes WHERE idTipoDeviaje=$id;";
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

/*


$resultados=listEnvios($conexion);

echo '<pre>';
print_r ($resultados);
echo '</pre>';

$resultados=listarEnvioPorId($conexion,8);

echo '<pre>';
print_r ($resultados);
echo '</pre>';

*/

$resultados=listarTipoDeViajePorId($conexion,4);

echo '<pre>';
print_r ($resultados);
echo '</pre>';




?>