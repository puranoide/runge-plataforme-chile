<?php

include_once('conection.php');

function listargestores($con)
{
    $mensaje = "no hay gestores registrados";
    $gestores = [];
    $sqlconductores = "SELECT * from gestores";
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

function agregarGestores($con, $completename, $iduser)
{
    $date = new DateTime();
    $date->modify('-7 hours');
    $dateFormat = $date->format('Y-m-d H:i:s');
    $mensaje = '';
    $sqlAddconductores = "INSERT INTO gestores (completenamegestores,fechaingresogestor,iduserfk)
                    VALUES('$completename','$dateFormat','$iduser')";

    $ejecutar = mysqli_query($con, $sqlAddconductores);

    if ($ejecutar) {
        $idconductor = mysqli_insert_id($con);
        $mensaje = 'gestor agregado con exito,ID del gestor agregado: ' . $idconductor;
        return $mensaje;
    } else {
        $mensaje = 'gestor no se pudo agregar,intentelo de nuevo o contacte con soporte';
        return $mensaje;
    }
}

function actualizarGestores($con,$id,$completename){
    $mensaje = '';
    $sqlupdateConductor ="UPDATE gestores SET completenamegestores='$completename'
     WHERE idgestores=$id;";

    $ejecutar = mysqli_query($con, $sqlupdateConductor);

    if ($ejecutar) {
        $mensaje = 'gestor actualizado con exito,ID del gestor actualizado: ' . $id;
        return $mensaje;
    } else {
        $mensaje = 'gestor no se pudo actualizar,intentelo de nuevo o contacte con soporte';
        return $mensaje;
    }
}

function listargestoresPorId($con,$id){
    $mensaje = "no hay gestores registrados con el id :".$id;
    $usuarios = [];
    $sqlUsarios = "SELECT* from gestores WHERE idgestores=$id;";
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

$resultados=listargestores($conexion);

echo '<pre>';
print_r ($resultados);
echo '</pre>';


$resultados=listargestoresPorId($conexion,6);
echo '<pre>';
print_r ($resultados);
echo '</pre>';


$resultado=agregarGestores($conexion,'gabriel Acosta',1);
echo $resultado;


$resultado=actualizarGestores($conexion,1,'gabriel actualizado');
echo $resultado;


*/
?>