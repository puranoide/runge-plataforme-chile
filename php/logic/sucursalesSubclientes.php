<?php


function listarSucursales($con){
    $mensaje = "no hay sucursales registrados";
    $gestores = [];
    $sqlconductores = "SELECT * from sucursalessubclientes";
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

function agregarSucursales($con, $nombreSubCliente, $direccionSubSucursal,$idClienteFk,$idEnvioFK){
    $mensaje = '';
    $sqlAddconductores = "INSERT INTO sucursalessubclientes (nombreSubcliente,direccionSubCliente,idClienteFk,idEnvioFK)
                    VALUES('$nombreSubCliente','$direccionSubSucursal','$idClienteFk','$idEnvioFK')";

    $ejecutar = mysqli_query($con, $sqlAddconductores);

    if ($ejecutar) {
        $idconductor = mysqli_insert_id($con);
        $mensaje = 'sucursal agregado con exito,ID del sucursal agregado: ' . $idconductor;
        return $mensaje;
    } else {
        $mensaje = 'sucursal no se pudo agregar,intentelo de nuevo o contacte con soporte';
        return $mensaje;
    }
}


function listarSubSucursalPorId($con,$id){
    $mensaje = "no hay sucursales de suclientes registrados";
    $gestores = [];
    $sqlconductores = "SELECT * from sucursalessubclientes WHERE idSucusalesSubClientes='$id'";
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

function listarSubSucursalPorIdCliente($con,$idCliente){
    $mensaje = "no hay sucursales de suclientes registrados";
    $gestores = [];
    $sqlconductores = "SELECT * from sucursalessubclientes WHERE idClienteFk='$idCliente'";
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

function listarSubSucursalPorIdEnvio($con,$idEnvio){
    $mensaje = "no hay sucursales de suclientes registrados";
    $gestores = [];
    $sqlconductores = "SELECT * from sucursalessubclientes WHERE idEnvioFK='$idEnvio'";
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

function actualizarSubSucursal($con,$id,$nombreSubCliente,$direccion,$idCliente,$idEnvio){
    $mensaje = '';
    $sqlupdateConductor ="UPDATE sucursalessubclientes SET nombreSubcliente='$nombreSubCliente',direccionSubCliente='$direccion',idClienteFk='$idCliente',idEnvioFK='$idEnvio'
     WHERE idSucusalesSubClientes=$id;";

    $ejecutar = mysqli_query($con, $sqlupdateConductor);

    if ($ejecutar) {
        $mensaje = 'sucursal subcliente actualizado con exito,ID delsucursal subcliente actualizado: ' . $id;
        return $mensaje;
    } else {
        $mensaje = 'sucursal subcliente no se pudo actualizar,intentelo de nuevo o contacte con soporte';
        return $mensaje;
    }
}




/*

$resultados=listarSucursales($conexion);

echo '<pre>';
print_r ($resultados);
echo '</pre>';

$resultados=listarSubSucursalPorId($conexion,8);

echo '<pre>';
print_r ($resultados);
echo '</pre>';

$resultados=listarSubSucursalPorIdCliente($conexion,2);

echo '<pre>';
print_r ($resultados);
echo '</pre>';

$resultados=listarSubSucursalPorIdEnvio($conexion,8 );

echo '<pre>';
print_r ($resultados);
echo '</pre>';

$resultados=agregarSucursales($conexion,'edgar macedo-subcliente','calle jose lean 155112',2,8);
echo '<pre>';
print_r ($resultados);
echo '</pre>';

$resultados=actualizarSubSucursal($conexion,1,'ale rCAMBIADO','prueba de calle actualizada',3,4);

echo '<pre>';
print_r ($resultados);
echo '</pre>';
*/
?>
