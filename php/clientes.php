<?php


include_once('conection.php');

function listarClientes($con){

    $mensaje = "no hay clientes registrados";
    $gestores = [];
    $sqlconductores = "SELECT * from cliente";
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

function listarClientesPorId($con,$id){

    $mensaje = "no hay clientes registrados";
    $gestores = [];
    $sqlconductores = "SELECT * from cliente WHERE clienteid='$id'";
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


function agregarClientes($con, $completename, $sucursalPrincipal)
{
  
    $mensaje = '';
    $sqlAddconductores = "INSERT INTO cliente (nombreCliente,SucursalPrincipal)
                    VALUES('$completename','$sucursalPrincipal')";

    $ejecutar = mysqli_query($con, $sqlAddconductores);

    if ($ejecutar) {
        $idconductor = mysqli_insert_id($con);
        $mensaje = 'cliente agregado con exito,ID del cliente agregado: ' . $idconductor;
        return $mensaje;
    } else {
        $mensaje = 'cliente no se pudo agregar,intentelo de nuevo o contacte con soporte';
        return $mensaje;
    }
}

function actualizarClientes($con,$id,$completename,$sucursalPrincipal){
    $mensaje = '';
    $sqlupdateConductor ="UPDATE cliente SET nombreCliente='$completename',SucursalPrincipal='$sucursalPrincipal'
     WHERE clienteid=$id;";

    $ejecutar = mysqli_query($con, $sqlupdateConductor);

    if ($ejecutar) {
        $mensaje = 'cliente actualizado con exito,ID del gestor actualizado: ' . $id;
        return $mensaje;
    } else {
        $mensaje = 'cliente no se pudo actualizar,intentelo de nuevo o contacte con soporte';
        return $mensaje;
    }
}




/*


$resultados=listarClientes($conexion);

echo '<pre>';
print_r ($resultados);
echo '</pre>';

$resultados=agregarClientes($conexion,'edgar macedo','calle jose lean 1551');
echo '<pre>';
print_r ($resultados);
echo '</pre>';

$resultados=listarClientesPorId($conexion,1);

echo '<pre>';
print_r ($resultados);
echo '</pre>';

$resultados=agregarClientes($conexion,'juan carrera','av juan dellepiane 230');

echo '<pre>';
print_r ($resultados);
echo '</pre>';

$resultados=actualizarClientes($conexion,3,'Juan Carrera','av belen 495 departamento 2');
echo '<pre>';
print_r ($resultados);
echo '</pre>';

*/




?>