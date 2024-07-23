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

$resultados=listarconductores($conexion);

echo '<pre>';
print_r ($resultados);
echo '</pre>';

/* 

$resultados=listarUsuarios($conexion);

echo '<pre>';
print_r ($resultados);
echo '</pre>';



$resultados=listarUsuariosporid($conexion,1);

echo '<pre>';
print_r ($resultados);
echo '</pre>';

$resultado=agregarConductores($conexion,'edgar macedo',2);
echo $resultado;


$resultado=actualizarUsuario($conexion,3,'pruebaconfuncion@gmail.com','pruebafuncion1234',2,'pruebaFuncionactualizada','');
echo $resultado;

*/
