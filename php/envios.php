<?php


function listEnvios($con){
    $mensaje = "no hay envios registrados";
    $gestores = [];
    $sqlconductores = "SELECT * from envios";
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

function listarEnvioPorId($con,$id){
    $mensaje = "no hay envios registrados con el id :".$id;
    $usuarios = [];
    $sqlUsarios = "SELECT* from envios WHERE idEnvio=$id;";
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

function agregarEnviosParteUno($con, $conductor, $idCamion, $idCliente,$codigoEnvio)
{
    $date = new DateTime();
    $date->modify('-7 hours');
    $dateFormat = $date->format('Y-m-d H:i:s');
    $mensaje = '';
    $sqlAddenvios = "INSERT INTO envios (fechaRegistrada,estadoEnvio,idConductorFk,idCamionFk,idClienteFk,codigoEnvio)
                    VALUES('$dateFormat',1,'$conductor','$idCamion','$idCliente','$codigoEnvio')";
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
function insertarMontoDeEnvio($con,$id){
    
}
function calcularMontoDelEnvio($con,$id){
        $envio=listarEnvioPorId($con,$id);
        if($envio['idClienteFk']=='1'){
            
        }

}

function ActualizarEnvios($con,$id, $conductor, $idCamion, $idCliente,$estadoEnvio,$comentario,$rutaFotoEnvio){
    if($estadoEnvio==2){
        $date = new DateTime();
        $date->modify('-7 hours');
        $dateFormat = $date->format('Y-m-d H:i:s');
        $mensaje = '';
        $sqlupdateConductor ="UPDATE envios SET idConductorFk='$conductor',idCamionFk='$idCamion',idClienteFk='$idCliente',fechaInicio='$dateFormat',estadoEnvio='$estadoEnvio',comentarioEnvio='$comentario',rutaFotoEnvio='$rutaFotoEnvio'
         WHERE idEnvio=$id;";
    
        $ejecutar = mysqli_query($con, $sqlupdateConductor);
    
        if ($ejecutar) {
            $mensaje = 'gestor actualizado con exito,ID del gestor actualizado: ' . $id;
            return $mensaje;
        } else {
            $mensaje = 'gestor no se pudo actualizar,intentelo de nuevo o contacte con soporte';
            return $mensaje;
        }
    }else if($estadoEnvio==3){
        $date = new DateTime();
        $date->modify('-7 hours');
        $dateFormat = $date->format('Y-m-d H:i:s');
        $mensaje = '';
        $sqlupdateConductor ="UPDATE envios SET idConductorFk='$conductor',idCamionFk='$idCamion',idClienteFk='$idCliente',fechaFinal='$dateFormat',estadoEnvio='$estadoEnvio',comentarioEnvio='$comentario',rutaFotoEnvio='$rutaFotoEnvio'
         WHERE idEnvio=$id;";
    
        $ejecutar = mysqli_query($con, $sqlupdateConductor);
    
        if ($ejecutar) {
            $mensaje = 'gestor actualizado con exito,ID del gestor actualizado: ' . $id;
            return $mensaje;
        } else {
            $mensaje = 'gestor no se pudo actualizar,intentelo de nuevo o contacte con soporte';
            return $mensaje;
        }
    }

   

}

function listEnviosActivos($con){
    $mensaje = "no hay envios activos";
    $gestores = [];
    $sqlconductores = "SELECT * from envios WHERE estadoEnvio=1";
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

function listEnviosIniciados($con){
    $mensaje = "no hay envios activos";
    $gestores = [];
    $sqlconductores = "SELECT * from envios WHERE estadoEnvio=2";
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

function listEnviosTerminado($con){
    $mensaje = "no hay envios activos";
    $gestores = [];
    $sqlconductores = "SELECT * from envios WHERE estadoEnvio=3";
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





/*


$resultados=listEnvios($conexion);

echo '<pre>';
print_r ($resultados);
echo '</pre>';


$resultados=listEnviosActivos($conexion);

echo '<pre>';
print_r ($resultados);
echo '</pre>';

$resultados=listEnviosIniciados($conexion);

echo '<pre>';
print_r ($resultados);
echo '</pre>';


$resultados=listEnviosTerminado($conexion);

echo '<pre>';
print_r ($resultados);
echo '</pre>';

$resultado=agregarEnviosParteUno($conexion,4,1,1);
echo gettype($resultado);
echo $resultado;


$resultados=listarEnvioPorId($conexion,8);

echo '<pre>';
print_r ($resultados);
echo '</pre>';

$resultado=ActualizarEnvios($conexion,4,4,1,1,2,'prueba Comentario','');
echo gettype($resultado);
echo $resultado;
*/




?>

