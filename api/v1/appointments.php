<?php

// 🔧 Configuración de errores (solo desarrollo)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 🔐 Headers
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// 🛑 Manejo de preflight (CORS)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// 📦 Dependencias
require_once(__DIR__ . "/../config/database.php");
require_once(__DIR__ . "/../models/Appointment.php");

// 🔌 Conexión DB
$database = new Database();
$db = $database->connect();

$appointment = new Appointment($db);

// 📥 Request data
$method = $_SERVER['REQUEST_METHOD'];

// 👉 ID desde query
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

// 👉 Body JSON como array (consistente)
$input = json_decode(file_get_contents("php://input"), true);

// 🧪 Debug (opcional, puedes comentar luego)
// file_put_contents(__DIR__ . "/debug.log", json_encode([
//     "method" => $method,
//     "id" => $id,
//     "input" => $input
// ]) . PHP_EOL, FILE_APPEND);

// 🧠 Helper response
function response($data, $status = 200) {
    http_response_code($status);
    echo json_encode($data);
    exit;
}

try {

    switch ($method) {

        // 📌 GET → listar
        case 'GET':
            $data = $appointment->getAll();

            response([
                "success" => true,
                "data" => $data
            ]);
            break;

        // 📌 POST → crear
        case 'POST':
            if (!$input || !isset($input['name'], $input['service'], $input['date'])) {
                response([
                    "success" => false,
                    "error" => "Invalid input"
                ], 422);
            }

            $appointment->create((object)$input);

            response([
                "success" => true,
                "message" => "Appointment created"
            ], 201);
            break;

        // 📌 PATCH → actualizar
        case 'PATCH':
            if (!$id) {
                response([
                    "success" => false,
                    "error" => "Missing or invalid ID"
                ], 422);
            }

            if (!$input || !isset($input['status'])) {
                response([
                    "success" => false,
                    "error" => "Missing status"
                ], 422);
            }

            $appointment->update($id, (object)$input);

            response([
                "success" => true,
                "message" => "Updated"
            ]);
            break;

        // 📌 DELETE → eliminar
        case 'DELETE':
            if (!$id) {
                response([
                    "success" => false,
                    "error" => "Missing or invalid ID"
                ], 422);
            }

            $appointment->delete($id);

            response([
                "success" => true,
                "message" => "Deleted"
            ]);
            break;

        // ❌ Método no permitido
        default:
            response([
                "success" => false,
                "error" => "Method not allowed"
            ], 405);
    }

} catch (Throwable $e) {

    // ⚠️ Error controlado
    response([
        "success" => false,
        "error" => $e->getMessage()
    ], 500);
}