<?php
include_once('conection.php');


function listarCamiones($con)
{
    $mensaje = "no hay camiones registrados";
    $camiones = [];
    $sqlCamiones = "SELECT* from camion;";
    $resultcamiones = $con->query($sqlCamiones);

    if ($resultcamiones->num_rows > 0) {
        while ($rowCamiones = $resultcamiones->fetch_assoc()) {
            $camiones[] = $rowCamiones;
        }
    } else {
        return $mensaje;
    }

    return $camiones;
}


function agregarCamion($con, $descripcioncamion, $placa, $cubicaje)
{
    $mensaje = '';
    $sqlAddCamiones = "INSERT INTO camion(descripcionCamion,placaCamion,cubicajeCamion,estado)
                    VALUES('$descripcioncamion','$placa','$cubicaje',1)";

    $ejecutar = mysqli_query($con, $sqlAddCamiones);

    if ($ejecutar) {
        $idCamion = mysqli_insert_id($con);
        $mensaje = 'camion agregado con exito,ID del camion agregado: ' . $idCamion;
        return $mensaje;
    } else {
        $mensaje = 'camion no se pudo agregar,intentelo de nuevo o contacte con soporte';
        return $mensaje;
    }
}

function actualizarCamion($con, $id, $descripcioncamion, $placa, $cubicaje, $estado)
{
    $mensaje = '';
    $sqlUpdateCamiones = "UPDATE camion SET descripcionCamion='$descripcioncamion', placaCamion='$placa', cubicajeCamion='$cubicaje', estado='$estado'
    WHERE camionId=$id;";

    $ejecutar = mysqli_query($con, $sqlUpdateCamiones);

    if ($ejecutar) {

        $mensaje = 'camion actualizadi con exito,ID del camion actualizado: ' . $id;
        return $mensaje;
    } else {
        $mensaje = 'camion no se pudo actualizar,intentelo de nuevo o contacte con soporte';
        return $mensaje;
    }
}

function eliminadoLogicoCamion($con, $id)
{
    $mensaje = '';
    $sqlEliminadoLogicoCamiones = "UPDATE camion SET estado=2
    WHERE camionId=$id;";

    $ejecutar = mysqli_query($con, $sqlEliminadoLogicoCamiones);

    if ($ejecutar) {

        $mensaje = 'camion eliminado con exito,ID del camion eliminado es : ' . $id;
        return $mensaje;
    } else {
        $mensaje = 'camion no se pudo eliminar,intentelo de nuevo o contacte con soporte';
        return $mensaje;
    }
}

function listarCamionesPorId($con,$id)
{
    $mensaje = "no hay camiones que coinciden con este id: ".$id;
    $camiones = [];
    $sqlCamiones = "SELECT* from camion WHERE camionId=$id;";
    $resultcamiones = $con->query($sqlCamiones);

    if ($resultcamiones->num_rows > 0) {
        while ($rowCamiones = $resultcamiones->fetch_assoc()) {
            $camiones[] = $rowCamiones;
        }
    } else {
        return $mensaje;
    }

    return $camiones;
}
function listarCamionesActivos($con)
{
    $mensaje = "Actualmente no hay camiones activos";
    $camiones = [];
    $sqlCamiones = "SELECT* from camion WHERE estado=1;";
    $resultcamiones = $con->query($sqlCamiones);

    if ($resultcamiones->num_rows > 0) {
        while ($rowCamiones = $resultcamiones->fetch_assoc()) {
            $camiones[] = $rowCamiones;
        }
    } else {
        return $mensaje;
    }

    return $camiones;
}

function listarCamionesinActivos($con)
{
    $mensaje = "Actualmente no hay camiones activos";
    $camiones = [];
    $sqlCamiones = "SELECT* from camion WHERE estado=2;";
    $resultcamiones = $con->query($sqlCamiones);

    if ($resultcamiones->num_rows > 0) {
        while ($rowCamiones = $resultcamiones->fetch_assoc()) {
            $camiones[] = $rowCamiones;
        }
    } else {
        return $mensaje;
    }

    return $camiones;
}





/*
prueba/uso de funciones
$resultado=listarCamiones($conexion);

print_r ($resultado);


$resultado=listarCamionesPorId($conexion,1);
echo '<pre>';
print_r ($resultado);
echo '</pre>';

$camionagreagdo=agregarCamion($conexion,'prueba de ingreso por funcion','L1234',30);
echo $camionagreagdo;


$camionagreagdo=actualizarCamion($conexion,1,'prueba de ingreso por funcion-actualizada','L1234',30,2);
echo $camionagreagdo;

$camionagreagdo=agregarCamion($conexion,'prueba de ingreso por funcion-2','L4321',50);
echo $camionagreagdo;

$camionagreagdo=eliminadoLogicoCamion($conexion,1);
echo $camionagreagdo;

$resultado=listarCamionesActivos($conexion);

echo '<pre>';
print_r ($resultado);
echo '</pre>';


$resultado=listarCamionesinActivos($conexion);

echo '<pre>';
print_r ($resultado);
echo '</pre>';

*/
