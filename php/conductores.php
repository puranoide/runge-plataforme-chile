<?php

include_once('conection.php');

function listarconductores($con)
{
    $mensaje = "no hay conductores registrados";
    $gestores = [];
    $sqlconductores = "SELECT * from conductor";
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

function agregarConductores($con, $completename, $iduser)
{
    $date = new DateTime();
    $date->modify('-7 hours');
    $dateFormat = $date->format('Y-m-d H:i:s');
    $mensaje = '';
    $sqlAddconductores = "INSERT INTO conductor (completenameconductor,fechaingresoconductor,iduserfk)
                    VALUES('$completename','$dateFormat','$iduser')";

    $ejecutar = mysqli_query($con, $sqlAddconductores);

    if ($ejecutar) {
        $idconductor = mysqli_insert_id($con);
        $mensaje = 'conductor agregado con exito,ID del conductor agregado: ' . $idconductor;
        return $mensaje;
    } else {
        $mensaje = 'conductor no se pudo agregar,intentelo de nuevo o contacte con soporte';
        return $mensaje;
    }
}

function actualizarConductores($con,$id,$completename){
    $mensaje = '';
    $sqlupdateConductor ="UPDATE conductor SET completenameconductor='$completename'
     WHERE idconductor=$id;";

    $ejecutar = mysqli_query($con, $sqlupdateConductor);

    if ($ejecutar) {
        $mensaje = 'conductor actualizado con exito,ID del conductor actualizado: ' . $id;
        return $mensaje;
    } else {
        $mensaje = 'conductor no se pudo actualizar,intentelo de nuevo o contacte con soporte';
        return $mensaje;
    }
}

function listarconductoresPorId($con,$id){
    $mensaje = "no hay conductores registrados con el id :".$id;
    $usuarios = [];
    $sqlUsarios = "SELECT* from conductor WHERE idconductor=$id;";
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

$resultados=listarconductores($conexion);

echo '<pre>';
print_r ($resultados);
echo '</pre>';


$resultados=listarconductoresPorId($conexion,6);
echo gettype($resultados);
echo '<pre>';
print_r ($resultados);
echo '</pre>';

$resultado=agregarConductores($conexion,'edgar macedo',2);
echo $resultado;


$resultado=actualizarConductores($conexion,5,'edgar actualizado');
echo $resultado;

*/
?>