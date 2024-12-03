<?php
// Verificar si se recibe una solicitud POST con JSON
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once('../config/conection.php'); // Cambia esta ruta si es necesario
    include_once('camiones.php'); // Archivo donde esté la función obtenerRegionesComplementariasfiltradas

    // Establece el encabezado de respuesta como JSON
    header('Content-Type: application/json');
    // Decodificar el JSON recibido
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['id'])) {
        $id = $data['id'];

        // Llamar a la función con el parámetro recibido
        $camion = listarCamionesPorId($conexion, $id);

        // Devolver la respuesta como JSON
        echo json_encode($camion);
    }
}
