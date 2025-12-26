<?php
// api/owl-chat.php - Lechuza Filosófica ASEFIP (Versión Simple)

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Método no permitido']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);
$mensaje = trim($input['mensaje'] ?? '');

if (empty($mensaje)) {
    echo json_encode(['error' => 'Mensaje vacío']);
    exit;
}

// Respuestas filosóficas de la lechuza
$respuestas = [
    "🦉 *Bate alas suavemente* Sabio estudiante de ASEFIP, tu pregunta me recuerda que Sócrates decía: 'Solo sé que nada sé'. La verdadera sabiduría comienza reconociendo nuestra ignorancia.",
    
    "Desde la filosofía peruana, como plantearía Augusto Salazar Bondy, estamos ante una cuestión de autenticidad filosófica. ¿Es este un pensamiento propio o heredado?",
    
    "Aristóteles en su Metafísica nos enseña que todos los hombres desean saber por naturaleza. Tu pregunta es expresión de ese deseo universal de conocimiento.",
    
    "Como lechuza de Minerva que vuela al atardecer, reflexiono: tu pregunta toca la esencia del ser. ¿Qué significa existir en el contexto que planteas?",
    
    "En la cosmovisión andina, el 'yanantin' (complementariedad) nos invita a ver los opuestos como complementarios. ¿Podría aplicarse esta perspectiva a tu reflexión?",
    
    "María Lugones nos hablaría de 'mundo viajero' y colonialidad del poder. Tu pregunta interpela estructuras que merecen ser deconstruidas filosóficamente.",
    
    "Platón usaría aquí el mito de la caverna. ¿Estamos viendo sombras o la verdadera realidad en el tema que planteas?",
    
    "José Carlos Mariátegui diría: 'No somos copia, somos creación'. El pensamiento peruano debe surgir de nuestra realidad concreta.",
    
    "Desde el existencialismo: la existencia precede a la esencia. ¿Cómo construyes tu esencia filosófica a través de esta pregunta?",
    
    "Simone de Beauvoir analizaría las construcciones sociales implicadas. 'No se nace filósofo, se llega a serlo' mediante preguntas como la tuya.",
    
    "Kant preguntaría: ¿Qué puedo saber? ¿Qué debo hacer? ¿Qué me es permitido esperar? Tu pregunta toca alguna de estas dimensiones fundamentales.",
    
    "Desde el estoicismo: No son las cosas las que nos perturban, sino nuestras opiniones sobre ellas. ¿Qué opinión estás examinando críticamente?",
    
    "Nietzsche diría que has comenzado a transvalorar valores con tu pregunta. ¿Qué nuevos valores filosóficos crearás?",
    
    "El Budismo nos invita al camino medio. ¿Estás encontrando equilibrio dialéctico en tu reflexión o permaneces en los extremos?",
    
    "La fenomenología de Husserl nos grita: ¡A las cosas mismas! ¿Estás describiendo la esencia de tu experiencia o solo sus apariencias?"
];

// Detectar tema principal de la pregunta
function detectarTema($texto) {
    $texto = strtolower($texto);
    
    $temas = [
        'Ética' => ['ética', 'moral', 'bueno', 'malo', 'virtud', 'deber', 'valor'],
        'Política' => ['política', 'poder', 'gobierno', 'estado', 'justicia', 'derecho', 'democracia'],
        'Metafísica' => ['existencia', 'ser', 'realidad', 'mundo', 'vida', 'muerte', 'diós', 'alma'],
        'Epistemología' => ['conocimiento', 'verdad', 'saber', 'ciencia', 'método', 'razón'],
        'Estética' => ['belleza', 'arte', 'estética', 'creación', 'feo', 'hermoso'],
        'Filosofía Peruana' => ['perú', 'peruano', 'andino', 'inca', 'mariátegui', 'latinoamérica', 'indígena'],
        'Lógica' => ['lógica', 'argumento', 'premisa', 'conclusión', 'silogismo', 'falacia']
    ];
    
    foreach ($temas as $tema => $palabras) {
        foreach ($palabras as $palabra) {
            if (strpos($texto, $palabra) !== false) {
                return $tema;
            }
        }
    }
    
    return 'Filosofía General';
}

// Recomendaciones de lectura por tema
$lecturas = [
    'Ética' => "📚 Te recomiendo: 'Ética a Nicómaco' de Aristóteles",
    'Política' => "📚 Te recomiendo: '7 Ensayos de Interpretación de la Realidad Peruana' de J.C. Mariátegui",
    'Metafísica' => "📚 Te recomiendo: 'El Ser y el Tiempo' de Martin Heidegger",
    'Epistemología' => "📚 Te recomiendo: 'Crítica de la Razón Pura' de Immanuel Kant",
    'Estética' => "📚 Te recomiendo: 'La Poética' de Aristóteles",
    'Filosofía Peruana' => "📚 Te recomiendo: '¿Existe una filosofía de nuestra América?' de Augusto Salazar Bondy",
    'Lógica' => "📚 Te recomiendo: 'Organon' de Aristóteles",
    'Filosofía General' => "📚 Te recomiendo: 'Historia de la Filosofía' de Giovanni Reale"
];

// Seleccionar y personalizar respuesta
$tema = detectarTema($mensaje);
$respuesta = $respuestas[array_rand($respuestas)];

// Añadir saludo filosófico
$saludos = [
    "Estimado pensador de ASEFIP,",
    "Querido estudiante filosófico,",
    "Apreciado buscador de sabiduría,",
    "Colega filósofo en formación,",
    "Sabio interlocutor,"
];

$saludo = $saludos[array_rand($saludos)];

// Respuesta final
$respuesta_final = $saludo . " " . $respuesta;

// Añadir recomendación de lectura
$respuesta_final .= "\n\n" . $lecturas[$tema];

// Añadir pregunta socrática
$preguntas_socraticas = [
    "\n\n🤔 ¿Qué opinas tú sobre esta reflexión?",
    "\n\n💭 ¿Cómo aplicarías esta idea a tu vida como estudiante de filosofía?",
    "\n\n🔍 ¿Qué otras perspectivas filosóficas podrían iluminar este tema?",
    "\n\n🔄 ¿Podrías reformular tu pregunta desde otra escuela filosófica?"
];

$respuesta_final .= $preguntas_socraticas[array_rand($preguntas_socraticas)];

// Devolver respuesta
echo json_encode([
    'respuesta' => $respuesta_final,
    'tema' => $tema,
    'hora' => date('H:i'),
    'fecha' => date('d/m/Y'),
    'firma' => '🦉 Sapientia - Lechuza Sabia de ASEFIP'
]);
?>
