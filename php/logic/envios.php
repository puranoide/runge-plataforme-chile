<?php

include_once('camiones.php');

function obtenerRegiones($con){
    $mensaje = "no hay regiones registradas";
    $gestores = [];
    $sqlconductores = "SELECT * from regiones";
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
function obteneregionesporid($con,$id){
    $mensaje = "no hay regiones complemetarias registradas con ese id de region";
    $gestores = [];
    $sqlconductores = "SELECT * FROM regiones WHERE idregiones='$id' ;";
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
function obteneregionescomplementariasporid($con,$id){
    $mensaje = "no hay regiones complemetarias registradas con ese id de region";
    $gestores = [];
    $sqlconductores = "SELECT * FROM regionescomplementarias WHERE idregioncomplementaria='$id' ;";
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
function obtenerRegionesComplementariasfiltradas($con,$regionnumero,$nombrelocal){
    $mensaje = "no hay regiones complemetarias registradas con ese numero de region";
    $gestores = [];
    $sqlconductores = "SELECT * FROM regionescomplementarias r WHERE regionnumero = (SELECT regionnumero FROM regionescomplementarias WHERE nombrelocal = '$nombrelocal' ) AND nombrelocal !='$nombrelocal' ;";
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


function insertarpeonetasaenvio($idenvio, $idpeoneta, $con)
{

    $sqlAddenvios = "INSERT INTO trbonosapeonetas (fkpeoneta,fkenvio)
                    VALUES('$idpeoneta','$idenvio')";
    $ejecutar = mysqli_query($con, $sqlAddenvios);

    if ($ejecutar) {
        return true;
    } else {
        return false;
    }
}

function postApiImagenEnvio($imagenmetadata)
{
    $IMGUR_CLIENT_ID = "73facb2bf4d3a7a";
    $fileName = basename($imagenmetadata["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

    // Source image 
    $image_source = file_get_contents($imagenmetadata['tmp_name']);
    // API post parameters 
    $postFields = array('image' => base64_encode($image_source));
    // Post image to Imgur via API 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image');
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $IMGUR_CLIENT_ID));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
    $response = curl_exec($ch);
    curl_close($ch);

    $responseArr = json_decode($response);

    return $responseArr->data->link;
}
function listarEnviosDelAño($con)
{
    $mensaje = "no hay envios registrados";
    $gestores = [];
    $sqlconductores = "SELECT * from envios  WHERE YEAR(fechaRegistrada) = YEAR(NOW())";
    $resultConductores = $con->query($sqlconductores);

    if ($resultConductores->num_rows > 0) {
        while ($rowConductores = $resultConductores->fetch_assoc()) {
            $gestores[] = $rowConductores;
        }
    } else {
        return $mensaje;
    }

    return $gestores;
};
function listarEnviosDelMes($con)
{
    $mensaje = "no hay envios registrados";
    $gestores = [];
    $sqlconductores = "SELECT * from envios  WHERE YEAR(fechaRegistrada) = YEAR(NOW())
    AND MONTH(fechaRegistrada) = MONTH(NOW())";
    $resultConductores = $con->query($sqlconductores);

    if ($resultConductores->num_rows > 0) {
        while ($rowConductores = $resultConductores->fetch_assoc()) {
            $gestores[] = $rowConductores;
        }
    } else {
        return $mensaje;
    }

    return $gestores;
};
function sumatoriaIngresosPorenvio($listadeenvios)
{

    $total = 0;
    $resultados = $listadeenvios;
    $tipoderepuesta = gettype($resultados);
    if ($tipoderepuesta == "array") {
        $total = 0;
        foreach ($resultados as $envio) {
            # code...
            $total += $envio['montoViaje'];
        }
    } else if ($tipoderepuesta == "string") {
        $total = 0;
    }

    return $total;
}
function sumatoriaegresosPorenvio($listadeenvios)
{

    $total = 0;
    $resultados = $listadeenvios;
    $tipoderepuesta = gettype($resultados);
    if ($tipoderepuesta == "array") {
        $total = 0;
        foreach ($resultados as $envio) {
            # code...
            $total += $envio['bonoConductor'];
            $total += $envio['bonoPeoneta'];
        }
    } else if ($tipoderepuesta == "string") {
        $total = 0;
    }

    return $total;
}

function listEnvios($con)
{
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
function enviosMensualesPorConductor($con, $idConductorFk)
{
    $mensaje = "no hay envios registrados para el conductor con el id :" . $idConductorFk;
    $usuarios = [];
    $sqlUsarios = "SELECT *
    FROM envios
    WHERE YEAR(fechaInicio) = YEAR(NOW())
    AND MONTH(fechaInicio) = MONTH(NOW())
    AND idConductorFk = $idConductorFk;";

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
function listarEnvioPorId($con, $id)
{
    $mensaje = "no hay envios registrados con el id :" . $id;
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

function agregarEnviosParteUno($con, $conductor, $idCamion, $idCliente, $codigoEnvio, $tipodeviaje, $fechaRegistrada, $sobreCargo, $urlimg,$rutacomplemen)
{
    $date = new DateTime();
    $date->modify('-7 hours');
    $dateFormat = $date->format('Y-m-d H:i:s');
    $mensaje = '';
    $sqlAddenvios = "INSERT INTO envios (fechaRegistrada,estadoEnvio,idConductorFk,idCamionFk,idClienteFk,codigoEnvio,tipoDeViajeFK,sobreCargo,rutaFotoEnvio,rutacomplementariaid)
                    VALUES('$fechaRegistrada',1,'$conductor','$idCamion','$idCliente','$codigoEnvio','$tipodeviaje','$sobreCargo','$urlimg','$rutacomplemen')";
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
function insertarMontoDeEnvio($con, $id)
{

    $montoEnvio = calcularMontoDelEnvio($con, $id);
    var_dump($montoEnvio);
    $tipoderespuesta = gettype($montoEnvio);
    if ($tipoderespuesta == 'integer' or $tipoderespuesta == 'double') {

        $sqlupdateConductor = "UPDATE envios SET montoViaje='$montoEnvio'
        WHERE idEnvio=$id;";

        $ejecutar = mysqli_query($con, $sqlupdateConductor);

        if ($ejecutar) {
            $mensaje = 'viaje actualizado con exito,ID del gestor actualizado: ' . $id;
            return $mensaje;
        } else {
            $mensaje = 'viaje no se pudo actualizar,intentelo de nuevo o contacte con soporte';
            return $mensaje;
        }
    } elseif ($tipoderespuesta == 'string') {
        return $montoEnvio;
    }
}
function calcularMontoDelEnvio($con, $id)
{
    $envio = listarEnvioPorId($con, $id);
    $tipoderespuesta = gettype($envio);
    echo '<pre>';
    print_r($envio);
    echo '</pre>';
    if ($tipoderespuesta == 'array') {
        $rutacomplementariatraida=obteneregionescomplementariasporid($con,$envio[0]['rutacomplementariaid']);
        $rutatraida=obteneregionesporid($con,$envio[0]['tipoDeViajeFK']);
        echo '<pre>';
        print_r($rutatraida);
        echo '</pre>';
        $camion = listarCamionesPorId($con, $envio[0]['idCamionFk']);
        if ($envio[0]['idClienteFk'] == 4) {
            echo $envio[0]['rutacomplementariaid'];
                if($envio[0]['rutacomplementariaid']!=='0'){
                    if($camion[0]['cubicajeCamion'] == 30){
                        $sobrecargo = $envio[0]['sobreCargo'];
                        return $rutacomplementariatraida[0]["precio30"]+$sobrecargo;
                    }
                    if ($camion[0]['cubicajeCamion'] == 50) {
                        $sobrecargo = $envio[0]['sobreCargo'];
                        return $rutacomplementariatraida[0]["precio50"]+$sobrecargo;
                    }
                }elseif($envio[0]['rutacomplementariaid']=='0'){
                    if($camion[0]['cubicajeCamion'] == 30){
                        $sobrecargo = $envio[0]['sobreCargo'];
                        return $rutatraida[0]["precio30"]+$sobrecargo;
                    }
                    if ($camion[0]['cubicajeCamion'] == 50) {
                        $sobrecargo = $envio[0]['sobreCargo'];
                        return $rutatraida[0]["precio50"]+$sobrecargo;
                    }
                }
        } elseif ($envio[0]['idClienteFk'] == 5 && $envio[0]['tipoDeViajeFK'] == 6) {
            if ($camion[0]['cubicajeCamion'] == 30) {
                $sobrecargo = $envio[0]['sobreCargo'];
                return 120000 + $sobrecargo;
            }
            if ($camion[0]['cubicajeCamion'] == 50) {
                $sobrecargo = $envio[0]['sobreCargo'];
                return 140000 + $sobrecargo;
            }
        } elseif ($envio[0]['idClienteFk'] == 5 && $envio[0]['tipoDeViajeFK'] == 7) {
            if ($camion[0]['cubicajeCamion'] == 30) {
                $sobrecargo = $envio[0]['sobreCargo'];
                return 130000 + $sobrecargo;
            }
            if ($camion[0]['cubicajeCamion'] == 50) {
                $sobrecargo = $envio[0]['sobreCargo'];
                return 150000 + $sobrecargo;
            }
        } elseif ($envio[0]['idClienteFk'] == 5 && $envio[0]['tipoDeViajeFK'] == 8) {
            if ($camion[0]['cubicajeCamion'] == 30) {
                $sobrecargo = $envio[0]['sobreCargo'];
                return 120000 + $sobrecargo;
            }
            if ($camion[0]['cubicajeCamion'] == 50) {
                $sobrecargo = $envio[0]['sobreCargo'];
                return 140000 + $sobrecargo;
            }
        } elseif ($envio[0]['idClienteFk'] == 5 && $envio[0]['tipoDeViajeFK'] == 9) {
            if ($camion[0]['cubicajeCamion'] == 30) {
                $sobrecargo = $envio[0]['sobreCargo'];
                return 120000 + $sobrecargo;
            }
            if ($camion[0]['cubicajeCamion'] == 50) {
                $sobrecargo = $envio[0]['sobreCargo'];
                return 140000 + $sobrecargo;
            }
        } elseif ($envio[0]['idClienteFk'] == 6 && $envio[0]['tipoDeViajeFK'] == 10) {
            if ($camion[0]['cubicajeCamion'] == 30) {
                $sobrecargo = $envio[0]['sobreCargo'];
                return 130000 + $sobrecargo;
            }
            if ($camion[0]['cubicajeCamion'] == 50) {
                $sobrecargo = $envio[0]['sobreCargo'];
                return 150000 + $sobrecargo;
            }
        } elseif ($envio[0]['idClienteFk'] == 7 && $envio[0]['tipoDeViajeFK'] == 10) {
            if ($camion[0]['cubicajeCamion'] == 30) {
                $sobrecargo = $envio[0]['sobreCargo'];
                return 135000 + $sobrecargo;
            }
            if ($camion[0]['cubicajeCamion'] == 50) {
                $sobrecargo = $envio[0]['sobreCargo'];
                return 135000 + $sobrecargo;
            }
        }
    } else if ($tipoderespuesta == 'string') {
        return $envio;
    }

    // Si no se cumple ninguna condición, puedes devolver un mensaje por defecto
    return "No se pudo calcular el monto del envío.";
}
function insertarbonosDelEnvio($con, $id)
{
    $bonos = calcularBonos($con, $id);
    $bonoConductor = $bonos['bonoConductor'];
    $bonoPeoneta = $bonos['bonoPeoneta'];
    $sqlupdateConductor = "UPDATE envios SET bonoConductor='$bonoConductor',bonoPeoneta='$bonoPeoneta'
        WHERE idEnvio=$id;";

    $ejecutar = mysqli_query($con, $sqlupdateConductor);
    if ($ejecutar) {
        $mensaje = 'envio actualizado con exito,ID del gestor actualizado: ' . $id;
        return $mensaje;
    } else {
        $mensaje = 'viaje no se pudo actualizar,intentelo de nuevo o contacte con soporte';
        return $mensaje;
    }
}
function calcularBonos($con, $id)
{
    $envio = listarEnvioPorId($con, $id);
    $tipoderespuesta = gettype($envio);
    if ($tipoderespuesta == 'array') {
        if ($envio[0]['idClienteFk'] == 4) {
            $fechadeinicio = $envio[0]['fechaInicio'];
            $fechaEsSabado = false;
            $timestamp = strtotime($fechadeinicio); // Convierte la fecha a un timestamp
            // Verifica si el día de la semana es sábado (6 en la función date('w'))
            if (date('w', $timestamp) == 6) {
                $fechaEsSabado = true;
            } else {
                $fechaEsSabado = false;
            }

            if ($fechaEsSabado) {
                $bonos = [
                    'bonoConductor' => 25000,
                    'bonoPeoneta' => 20000
                ];

                return $bonos;
            } else {
                $bonos = [
                    'bonoConductor' => 0,
                    'bonoPeoneta' => 0
                ];
                return $bonos;
            }
        } elseif ($envio[0]['idClienteFk'] == 7) {
            $fechadeinicio = $envio[0]['fechaInicio'];
            $fechaEsSabado = false;
            $timestamp = strtotime($fechadeinicio); // Convierte la fecha a un timestamp
            // Verifica si el día de la semana es sábado (6 en la función date('w'))
            if (date('w', $timestamp) == 6) {
                $fechaEsSabado = true;
            } else {
                $fechaEsSabado = false;
            }

            if ($fechaEsSabado) {
                $bonos = [
                    'bonoConductor' => 135000,
                    'bonoPeoneta' => 135000
                ];

                return $bonos;
            } else {
                $bonos = [
                    'bonoConductor' => 0,
                    'bonoPeoneta' => 0
                ];
                return $bonos;
            }
        } else {
            $bonos = [
                'bonoConductor' => 0,
                'bonoPeoneta' => 0
            ];
            return $bonos;
        }
    } else {
        $bonos = [
            'bonoConductor' => 0,
            'bonoPeoneta' => 0
        ];
        return $bonos;
    }
}

function obtenerenviosSabadosPorConductorCastañosCanontex($con, $idconductor)
{
    $envios = enviosMensualesPorConductor($con, $idconductor);
    $envioSabado = [];

    foreach ($envios as $envio) {
        $fechadeinicio = $envio['fechaInicio'];
        $fechaEsSabado = false;
        $timestamp = strtotime($fechadeinicio); // Convierte la fecha a un timestamp
        // Obtén el mes (en formato numérico, 1-12)
        $mes = date('n', $timestamp);

        // Obtén el año
        $año = date('Y', $timestamp);
        $totaldesabados = totalSaturdaysInMonth($mes, $año);

        // Verifica si el día de la semana es sábado (6 en la función date('w'))
        if (date('w', $timestamp) == 6) {
            $fechaEsSabado = true;
        } else {
            $fechaEsSabado = false;
        }

        if ($fechaEsSabado && $envio['idClienteFk'] == 7) {
            array_push($envioSabado, $envio);
        }
    }

    return $envioSabado;
}

function ActualizarEnvios($con, $id, $conductor, $idCamion, $idCliente, $estadoEnvio, $comentario, $rutaFotoEnvio, $sobrecargo)
{
    if ($estadoEnvio == 1) {
        $date = new DateTime();
        $date->modify('-7 hours');
        $dateFormat = $date->format('Y-m-d H:i:s');
        $mensaje = '';
        $sqlupdateConductor = "UPDATE envios SET idConductorFk='$conductor',idCamionFk='$idCamion',idClienteFk='$idCliente',estadoEnvio='$estadoEnvio',comentarioEnvio='$comentario',sobreCargo='$sobrecargo',rutaFotoEnvio='$rutaFotoEnvio'
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
    if ($estadoEnvio == 2) {
        $date = new DateTime();
        $date->modify('-7 hours');
        $dateFormat = $date->format('Y-m-d H:i:s');
        $mensaje = '';
        $sqlupdateConductor = "UPDATE envios SET idConductorFk='$conductor',idCamionFk='$idCamion',idClienteFk='$idCliente',fechaInicio='$dateFormat',estadoEnvio='$estadoEnvio',comentarioEnvio='$comentario',sobreCargo='$sobrecargo',rutaFotoEnvio='$rutaFotoEnvio'
         WHERE idEnvio=$id;";

        $ejecutar = mysqli_query($con, $sqlupdateConductor);

        if ($ejecutar) {
            $mensaje = 'gestor actualizado con exito,ID del gestor actualizado: ' . $id;
            return $mensaje;
        } else {
            $mensaje = 'gestor no se pudo actualizar,intentelo de nuevo o contacte con soporte';
            return $mensaje;
        }
    } else if ($estadoEnvio == 3) {
        $date = new DateTime();
        $date->modify('-7 hours');
        $dateFormat = $date->format('Y-m-d H:i:s');
        $mensaje = '';
        $sqlupdateConductor = "UPDATE envios SET idConductorFk='$conductor',idCamionFk='$idCamion',idClienteFk='$idCliente',fechaFinal='$dateFormat',estadoEnvio='$estadoEnvio',comentarioEnvio='$comentario',sobreCargo='$sobrecargo',rutaFotoEnvio='$rutaFotoEnvio'
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

function listEnviosActivos($con)
{
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

function listEnviosIniciados($con)
{
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

function listEnviosTerminado($con)
{
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
function totalSaturdaysInMonth($month, $year)
{
    $totalSaturdays = 0;

    // Obtiene el número de días en el mes
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

    // Recorre cada día del mes
    for ($day = 1; $day <= $daysInMonth; $day++) {
        // Si es sábado (6 en el formato de día de la semana)
        if (date('N', strtotime("$year-$month-$day")) == 6) {
            $totalSaturdays++;
        }
    }

    return $totalSaturdays;
}


function obtenerDireccionesEntregasTubopack($con){
    $mensaje = "error al devolver las direcciones";
    $direcciones = [];
    $sqlconductores = "SELECT * FROM tubopack"; 
    $resultConductores = $con->query($sqlconductores);

    if ($resultConductores->num_rows > 0) {
        while ($rowConductores = $resultConductores->fetch_assoc()) {
            $direcciones[] = $rowConductores;
        }
    } else {
        return $mensaje;
    }

    return $direcciones;
}

function obtenerDireccionesEntregasRm($con){
    $mensaje = "error al devolver las direcciones";
    $direcciones = [];
    $sqlconductores = "SELECT * FROM entregas_rm"; 
    $resultConductores = $con->query($sqlconductores);

    if ($resultConductores->num_rows > 0) {
        while ($rowConductores = $resultConductores->fetch_assoc()) {
            $direcciones[] = $rowConductores;
        }
    } else {
        return $mensaje;
    }

    return $direcciones;
}

function obtenerDireccionesRegiones($con){
    $mensaje = "error al devolver las direcciones";
    $direcciones = [];
    $sqlconductores = "SELECT * FROM regiones"; 
    $resultConductores = $con->query($sqlconductores);

    if ($resultConductores->num_rows > 0) {
        while ($rowConductores = $resultConductores->fetch_assoc()) {
            $direcciones[] = $rowConductores;
        }
    } else {
        return $mensaje;
    }
    return $direcciones;
}
function obtenerDireccionesRetaul($con){
    $mensaje = "error al devolver las direcciones";
    $direcciones = [];
    $sqlconductores = "SELECT * FROM erorigenloboza"; 
    $resultConductores = $con->query($sqlconductores);

    if ($resultConductores->num_rows > 0) {
        while ($rowConductores = $resultConductores->fetch_assoc()) {
            $direcciones[] = $rowConductores;
        }
    } else {
        return $mensaje;
    }
    return $direcciones;
}
function obtenerDireccionesColchon($con){
    $mensaje = "error al devolver las direcciones";
    $direcciones = [];
    $sqlconductores = "SELECT * FROM rutacolchon"; 
    $resultConductores = $con->query($sqlconductores);

    if ($resultConductores->num_rows > 0) {
        while ($rowConductores = $resultConductores->fetch_assoc()) {
            $direcciones[] = $rowConductores;
        }
    } else {
        return $mensaje;
    }
    return $direcciones;
}



/* Ejemplo de uso:
$month = 8; // Agosto
$year = 2024;
echo "Total de sábados en $month/$year: " . totalSaturdaysInMonth($month, $year);
/*

$resultados=listarEnviosDelMes($conexion);

echo '<pre>';
print_r ($resultados);
echo '</pre>';

$resultadossumna=sumatoriaegresosPorenvio($resultados);

echo '<pre>';
print_r ($resultadossumna);
echo '</pre>';

echo '<pre>';
print_r ($resultados);
echo '</pre>';

$resultadossumna=sumatoriaIngresosPorenvio($resultados);

echo '<pre>';
print_r ($resultadossumna);
echo '</pre>';

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


$resultado=agregarEnviosParteUno($conexion,4,1,4,'p0003',1); 
echo $resultado;


$resultados=listarEnvioPorId($conexion,8);

echo '<pre>';
print_r ($resultados);
echo '</pre>';

$resultado=ActualizarEnvios($conexion,4,4,1,1,2,'prueba Comentario','');
echo gettype($resultado);
echo $resultado;
*/


/*
logica envios


runge
-----
camiones varian dependiendo de agenda(cambiar realcion conductor-camion)

formula:

cliente1(canontex)
camion-m3(30-50)-
si es 30 y el viaje 1-->subclientes-sucursal-direccion=115,000
si es 30 y es viaje 2=55,000
si es 30 y es viaje 3=95,000
si es 30 y es viaje 2 y es ruta colchon=155,000
si es 30 y es viaje 3 y es ruta colchon=155,000

si el viaje se inicia sabado y es viaje 1-->sacan bono-chofer-->25,000 peoneta-->20,000
reunion 13 de agosto

si es de 50 y es el primer viaje=135,000
si es de 50 y es el segundo viaje=65,000
si es de 50 y es el tercer viaje=115,000
viaje(1,2,3)

sobrecargo=variable que se suma 


cliente 2(alicomer)---tener detalla a que subcliente se ha dado
camion-m3(30-50)-
si es 30 -->entrega de pan-->sucursal de subcliente=120,000
si es 30 -->retiro de harina-->no pasa nada=130,000
si es 30 -->retiro de cajas de carton--no pasa nada=120,000
si es 30 -->retiro de bandejas plasticas-->sucursal de subcliente=120,000

si es 50 -->entrega de pan-->sucursal de subcliente=140,000
si es 50 -->retiro de harina-->no pasa nada=150,000
si es 50 -->retiro de cajas de carton--no pasa nada=140,000
si es 50 -->retiro de bandejas plasticas-->sucursal de subcliente=140,000

sobrecargo=variable que se suma 


cliente 3 (nutrisco)
camion-m3(30-50)-
si es 30 y entrega subclientes-->cantidad de clientes(1-5)-->sucursales a mano=130,000

si es 50 y entrega subclientes-->cantidad de clientes(1-5)-->sucursales a mano=150,000

sobrecargo=variable que se suma 

cliente 4 (castaño) cuando se seleccione castaño
camion-m3(30-50)

si es 50-->numero de viaje (1-4)->cuando trabajen todos los  sabado->bono  (revisar todos los envios del mes,4sabados,si hay envios estos sabados(si no hay no hay bono,si hay,si todos sabados se termino los envios->bono->100,000 )-->135,000

si el cambion es de 30-->135,000

sobrecargo=variable que se suma 



conductor que tiene que ver
cliente
subcliente-direccion
numero de documento(ovt-numero de factura)
detalle de orden

el le va a dar a comenzar
cuando comienza
cuando termina
foto
y el estado
-firmada



bonos salen del 3 viaje  a minorista o sucursal



*/
