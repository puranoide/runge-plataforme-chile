<?php
include_once('conection.php');
include_once('camiones.php');
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

function agregarEnviosParteUno($con, $conductor, $idCamion, $idCliente,$codigoEnvio,$tipoDeViaje)
{
    $date = new DateTime();
    $date->modify('-7 hours');
    $dateFormat = $date->format('Y-m-d H:i:s');
    $mensaje = '';
    $sqlAddenvios = "INSERT INTO envios (fechaRegistrada,estadoEnvio,idConductorFk,idCamionFk,idClienteFk,codigoEnvio,tipoDeViajeFK)
                    VALUES('$dateFormat',1,'$conductor','$idCamion','$idCliente','$codigoEnvio','$tipoDeViaje')";
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
function insertarMontoDeEnvio($con,$id,$monto){
    
}
function calcularMontoDelEnvio($con, $id) {
    $envio = listarEnvioPorId($con, $id);
    $tipoderespuesta = gettype($envio);
    
    if ($tipoderespuesta == 'array') {
        $camion = listarCamionesPorId($con, $envio[0]['idCamionFk']);
        if ($envio[0]['idClienteFk'] == 4) {
            if ($camion[0]['cubicajeCamion'] == 30) {
                return 120000;
            }
        }
    } elseif ($tipoderespuesta == 'string') {
        return $envio;
    }
    
    // Si no se cumple ninguna condición, puedes devolver un mensaje por defecto
    return "No se pudo calcular el monto del envío.";
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



$resultados=listEnvios($conexion);

echo '<pre>';
print_r ($resultados);
echo '</pre>';


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


/*
logica envios


runge
-----
camiones varian dependiendo de agenda(cambiar realcion conductor-camion)

formula:

cliente1(canontex)
camion-m3(30-50)-
si es 30 y el viaje 1-->subclientes-sucursal-direccion=120,000
si es 30 y es viaje 2=60,000
si es 30 y es viaje 3=100,000
si es 30 y es viaje 2 y es ruta colchon=170,000
si es 30 y es viaje 3 y es ruta colchon=170,000

si es sabado y es viaje 1-->sacan bono-chofer-->25,000 peoneta-->20,000

si es de 50 y es el primer viaje=140,000
si es de 50 y es el segundo viaje=70,000
si es de 50 y es el tercer viaje=120,000
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
camion-m3(30-50)-

si es 50-->numero de viaje (1-10) del cuando es 3er viaje subclientes o sucursal hay bono
,
--> y entrega subclientes-->cantidad de clientes(1-5)-->sucursales a mano=135,000

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

?>

