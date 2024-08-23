<?php
include_once('conection.php');
include_once('camiones.php');
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

function agregarEnviosParteUno($con, $conductor, $idCamion, $idCliente, $codigoEnvio, $tipodeviaje)
{
    $date = new DateTime();
    $date->modify('-7 hours');
    $dateFormat = $date->format('Y-m-d H:i:s');
    $mensaje = '';
    $sqlAddenvios = "INSERT INTO envios (fechaRegistrada,estadoEnvio,idConductorFk,idCamionFk,idClienteFk,codigoEnvio,tipoDeViajeFK)
                    VALUES('$dateFormat',1,'$conductor','$idCamion','$idCliente','$codigoEnvio','$tipodeviaje')";
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
    if ($tipoderespuesta == 'integer') {
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

    if ($tipoderespuesta == 'array') {
        $camion = listarCamionesPorId($con, $envio[0]['idCamionFk']);
        if ($envio[0]['idClienteFk'] == 4 && $envio[0]['tipoDeViajeFK'] == 1) {
            if ($camion[0]['cubicajeCamion'] == 30) {
                return 120000;
            }
            if ($camion[0]['cubicajeCamion'] == 50) {
                return 140000;
            }
        } elseif ($envio[0]['idClienteFk'] == 4 && $envio[0]['tipoDeViajeFK'] == 2) {
            if ($camion[0]['cubicajeCamion'] == 30) {
                return 60000;
            }
            if ($camion[0]['cubicajeCamion'] == 50) {
                return 70000;
            }
        } elseif ($envio[0]['idClienteFk'] == 4 && $envio[0]['tipoDeViajeFK'] == 3) {
            if ($camion[0]['cubicajeCamion'] == 30) {
                return 100000;
            }
            if ($camion[0]['cubicajeCamion'] == 50) {
                return 120000;
            }
        } elseif ($envio[0]['idClienteFk'] == 4 && $envio[0]['tipoDeViajeFK'] == 4) {
            if ($camion[0]['cubicajeCamion'] == 30) {
                return 170000;
            }
        } elseif ($envio[0]['idClienteFk'] == 4 && $envio[0]['tipoDeViajeFK'] == 5) {
            if ($camion[0]['cubicajeCamion'] == 30) {
                return 170000;
            }
        } elseif ($envio[0]['idClienteFk'] == 5 && $envio[0]['tipoDeViajeFK'] == 6) {
            if ($camion[0]['cubicajeCamion'] == 30) {
                return 120000;
            }
            if ($camion[0]['cubicajeCamion'] == 50) {
                return 140000;
            }
        } elseif ($envio[0]['idClienteFk'] == 5 && $envio[0]['tipoDeViajeFK'] == 7) {
            if ($camion[0]['cubicajeCamion'] == 30) {
                return 130000;
            }
            if ($camion[0]['cubicajeCamion'] == 50) {
                return 150000;
            }
        } elseif ($envio[0]['idClienteFk'] == 5 && $envio[0]['tipoDeViajeFK'] == 8) {
            if ($camion[0]['cubicajeCamion'] == 30) {
                return 120000;
            }
            if ($camion[0]['cubicajeCamion'] == 50) {
                return 140000;
            }
        } elseif ($envio[0]['idClienteFk'] == 5 && $envio[0]['tipoDeViajeFK'] == 9) {
            if ($camion[0]['cubicajeCamion'] == 30) {
                return 120000;
            }
            if ($camion[0]['cubicajeCamion'] == 50) {
                return 140000;
            }
        } elseif ($envio[0]['idClienteFk'] == 6 && $envio[0]['tipoDeViajeFK'] == 10) {
            if ($camion[0]['cubicajeCamion'] == 30) {
                return 130000;
            }
            if ($camion[0]['cubicajeCamion'] == 50) {
                return 150000;
            }
        } elseif ($envio[0]['idClienteFk'] == 7 && $envio[0]['tipoDeViajeFK'] == 10) {
            if ($camion[0]['cubicajeCamion'] == 30) {
                return 135000;
            }
            if ($camion[0]['cubicajeCamion'] == 50) {
                return 135000;
            }
        }
    } else if ($tipoderespuesta == 'string') {
        return $envio;
    }

    // Si no se cumple ninguna condición, puedes devolver un mensaje por defecto
    return "No se pudo calcular el monto del envío.";
}
function insertarbonosDelEnvio($con,$id){
        $bonos=calcularBonos($con,$id);
        $bonoConductor=$bonos['bonoConductor'];
        $bonoPeoneta=$bonos['bonoPeoneta'];
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

function ActualizarEnvios($con, $id, $conductor, $idCamion, $idCliente, $estadoEnvio, $comentario, $rutaFotoEnvio)
{
    if ($estadoEnvio == 2) {
        $date = new DateTime();
        $date->modify('-7 hours');
        $dateFormat = $date->format('Y-m-d H:i:s');
        $mensaje = '';
        $sqlupdateConductor = "UPDATE envios SET idConductorFk='$conductor',idCamionFk='$idCamion',idClienteFk='$idCliente',fechaInicio='$dateFormat',estadoEnvio='$estadoEnvio',comentarioEnvio='$comentario',rutaFotoEnvio='$rutaFotoEnvio'
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
        $sqlupdateConductor = "UPDATE envios SET idConductorFk='$conductor',idCamionFk='$idCamion',idClienteFk='$idCliente',fechaFinal='$dateFormat',estadoEnvio='$estadoEnvio',comentarioEnvio='$comentario',rutaFotoEnvio='$rutaFotoEnvio'
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


/* Ejemplo de uso:
$month = 8; // Agosto
$year = 2024;
echo "Total de sábados en $month/$year: " . totalSaturdaysInMonth($month, $year);
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

sobrecargo=variable que se suma :=0


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
