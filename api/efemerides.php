<?php
// api/efemerides.php - Generador de efemérides con IA

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Conexión a OpenAI API (ChatGPT) - NECESITAS TU API KEY
$api_key = 'TU_API_KEY_DE_OPENAI';

// Obtener fecha actual
$hoy = date('d-m');
$mes = date('n');
$dia = date('j');

// Base de datos de eventos filosóficos
$eventos_fijos = [
    '15-01' => ['titulo' => 'Nacimiento de Martin Luther King Jr.', 'descripcion' => 'Activista y pensador de la no violencia'],
    '22-01' => ['titulo' => 'Nacimiento de Francis Bacon', 'descripcion' => 'Filósofo y científico del empirismo'],
    '04-02' => ['titulo' => 'Nacimiento de Rosa Luxemburgo', 'descripcion' => 'Teórica marxista y revolucionaria'],
    '15-02' => ['titulo' => 'Nacimiento de Galileo Galilei', 'descripcion' => 'Astrónomo y filósofo natural'],
    // ... agregar más eventos
];

// Verificar si hay evento fijo para hoy
$evento_hoy = isset($eventos_fijos[$hoy]) ? $eventos_fijos[$hoy] : null;

// Si no hay evento fijo, generar con IA
if (!$evento_hoy) {
    // Aquí iría la llamada a OpenAI API
    // Por ahora devolvemos un evento genérico
    $evento_hoy = [
        'titulo' => 'Evento generado por IA',
        'descripcion' => 'Nuestra IA está analizando la historia filosófica para este día.',
        'ia_generado' => true
    ];
}

// Devolver JSON
echo json_encode([
    'fecha' => date('d/m/Y'),
    'eventos' => [$evento_hoy],
    'actualizado' => date('Y-m-d H:i:s')
]);
?>
