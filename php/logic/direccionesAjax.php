<?php
header('Content-Type: application/json');
error_reporting(E_ALL); // Para desarrollo
ini_set('display_errors', 1);

require_once "../config/conection.php";  
require_once "envios.php";

try {
    header('Content-Type: application/json');
    $rawData = file_get_contents("php://input");
    error_log("Datos recibidos: " . $rawData); // Para debug
    
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Método no permitido');
    }

    $data = json_decode($rawData, true);
    
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception('JSON inválido: ' . json_last_error_msg());
    }
    
    if (!isset($data['ruta'])) {
        throw new Exception('Ruta no especificada');
    }

    if (!isset($conexion)) {
        throw new Exception('Error de conexión a la base de datos');
    }

    $ruta = intval($data['ruta']);
    $listadirecciones = [];

    switch ($ruta) {
        case 1:
            $listadirecciones = obtenerDireccionesTubopack($conexion);
            break;
        case 2:
            $listadirecciones = obtenerDireccionesEntregasRm($conexion);
            break;
        case 3:
            $listadirecciones = obtenerDireccionesRegiones($conexion);
            break;
        case 4:
            $listadirecciones = obtenerDireccionesRetaul($conexion);
            break;
        case 5:
            $listadirecciones = obtenerDireccionesColchon($conexion);
            break;
        default:
            throw new Exception('Ruta no válida');
    }

    if (is_string($listadirecciones)) { // Si es un mensaje de error
        throw new Exception($listadirecciones);
    }

    echo json_encode([
        'success' => true,
        'data' => $listadirecciones
    ]);

} catch (Exception $e) {
    error_log("Error en direccionesAjax.php: " . $e->getMessage());
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>