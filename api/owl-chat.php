<?php
// api/owl-chat.php - Chatbot filosófico con ChatGPT

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Método no permitido']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);
$mensaje = $data['mensaje'] ?? '';

if (empty($mensaje)) {
    echo json_encode(['error' => 'Mensaje vacío']);
    exit;
}

// Configuración para ChatGPT API
$api_key = 'TU_API_KEY_DE_OPENAI';
$url = 'https://api.openai.com/v1/chat/completions';

// Prompt especializado en filosofía
$prompt = "Eres una lechuza sabia especializada en filosofía. 
Responde en español, de manera clara y accesible para estudiantes.
Contexto: El usuario es parte de ASEFIP (Asociación de Estudiantes de Filosofía del Perú).
Mensaje del usuario: " . $mensaje;

$data = [
    'model' => 'gpt-3.5-turbo',
    'messages' => [
        ['role' => 'system', 'content' => 'Eres una lechuza filosófica sabia y amable.'],
        ['role' => 'user', 'content' => $prompt]
    ],
    'max_tokens' => 500,
    'temperature' => 0.7
];

// En producción, aquí harías la llamada real a la API
// Por ahora devolvemos una respuesta simulada

$respuestas_filosoficas = [
    "Como lechuza filosófica, te digo que esa pregunta toca lo esencial del pensamiento humano...",
    "Recuerdo que Aristóteles decía algo similar en su Ética a Nicómaco...",
    "Desde una perspectiva peruana, podríamos analizar esto considerando el pensamiento andino...",
    "Esa es una cuestión que ha preocupado a filósofos desde la antigua Grecia...",
    "Te recomendaría leer sobre este tema en los trabajos de Augusto Salazar Bondy...",
    "Como buena lechuza, veo que tu pregunta apunta al núcleo del problema filosófico..."
];

$respuesta = $respuestas_filosoficas[array_rand($respuestas_filosoficas)];

echo json_encode([
    'respuesta' => $respuesta,
    'timestamp' => date('H:i:s'),
    'ia' => true
]);
?>
