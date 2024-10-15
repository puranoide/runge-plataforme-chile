<?php


function listartipoegresocamion($con){
    $mensaje = "no hay tipos  registrados";
    $usuarios = [];
    $sqlUsarios = "SELECT* from tipodeegresocamion;";
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

function listartipoegresocamionbyid($con,$id){
    $mensaje = "no hay tipos  registrados con el id '$id'";
    $usuarios = [];
    $sqlUsarios = "SELECT* from tipodeegresocamion WHERE idtipoDeEgresoCamion='$id';";
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
function listarEgresosCamiones($con){
    $mensaje = "no hay Egresos  registrados";
    $usuarios = [];
    $sqlUsarios = "SELECT* from egresoscamiondata;";
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

function agregarEgresosCamiones($con,$detalle,$monto,$linkfoto=null,$tipodeingreso,$fkcamion,$fecha){
    $date = new DateTime();
    $date->modify('-7 hours');
    $dateFormat = $date->format('Y-m-d H:i:s');
    $mensaje = '';
    $sqlAddconductores = "INSERT INTO egresoscamiondata (detalle,montoEgresoCamion,linkEgresoCamionImagen,FKtipoDeIngresoCamion,FKcamion,fechaEgresoCamion)
                    VALUES('$detalle','$monto','$linkfoto','$tipodeingreso','$fkcamion','$fecha')";

    $ejecutar = mysqli_query($con, $sqlAddconductores);

    if ($ejecutar) {
        $idconductor = mysqli_insert_id($con);
        $mensaje = 'egreso de camion agregado con exito,ID del egreso agregado: ' . $idconductor;
        return $mensaje;
    } else {
        $mensaje = 'egreso de camion no se pudo agregar,intentelo de nuevo o contacte con soporte';
        return $mensaje;
    }
}

function sumatoriaEgresosCamiones($listarEgresoscamiones)
{

    $total = 0;
    $resultados = $listarEgresoscamiones;
    $tipoderepuesta = gettype($resultados);
    if ($tipoderepuesta == "array") {
        $total = 0;
        foreach ($resultados as $egreso) {
            # code...
            $total += $egreso['montoEgresoCamion'];
        }
    } else if ($tipoderepuesta == "string") {
        $total = 0;
    }

    return $total;
}

/*


$resultados=listartipoegresocamion($conexion);
echo '<pre>';
print_r ($resultados);
echo '</pre>';


$resultado=agregarEgresosCamiones($conexion,'prueba de engreso camion',30.23,'/imagendeprueba',1,4);
echo $resultado;


*/




?>