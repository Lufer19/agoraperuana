<?php
// api/efemerides.php - Efemérides filosóficas para ASEFIP

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Obtener fecha actual
$hoy_mes = date('n'); // Mes (1-12)
$hoy_dia = date('j'); // Día (1-31)
$hoy_semana = date('N'); // Día de la semana (1=lunes, 7=domingo)

// Base de datos de efemérides filosóficas
$efemerides = [
    // Enero (1)
    '1-1' => [
        'evento' => 'Año Nuevo - Reflexión sobre el tiempo',
        'filosofo' => 'San Agustín',
        'cita' => '"¿Qué es, pues, el tiempo? Si nadie me lo pregunta, lo sé; pero si quiero explicárselo al que me lo pregunta, no lo sé."',
        'tipo' => 'Reflexión'
    ],
    '1-4' => [
        'evento' => 'Nacimiento de Isaac Newton',
        'filosofo' => 'Isaac Newton',
        'cita' => '"Lo que sabemos es una gota de agua; lo que ignoramos es el océano."',
        'tipo' => 'Científico-Filósofo'
    ],
    '1-15' => [
        'evento' => 'Nacimiento de Martin Luther King Jr.',
        'filosofo' => 'Martin Luther King Jr.',
        'cita' => '"La oscuridad no puede expulsar a la oscuridad: sólo la luz puede hacerlo. El odio no puede expulsar al odio: sólo el amor puede hacerlo."',
        'tipo' => 'Filosofía Práctica'
    ],

    // Febrero (2)
    '2-7' => [
        'evento' => 'Nacimiento de Charles Dickens',
        'filosofo' => 'Charles Dickens',
        'cita' => '"El hombre nunca sabe de lo que es capaz hasta que lo intenta."',
        'tipo' => 'Literatura Filosófica'
    ],
    '2-15' => [
        'evento' => 'Nacimiento de Galileo Galilei',
        'filosofo' => 'Galileo Galilei',
        'cita' => '"No se puede enseñar nada a un hombre; sólo se le puede ayudar a encontrar la respuesta dentro de sí mismo."',
        'tipo' => 'Ciencia y Filosofía'
    ],

    // Marzo (3)
    '3-6' => [
        'evento' => 'Nacimiento de Gabriel García Márquez',
        'filosofo' => 'Gabriel García Márquez',
        'cita' => '"La sabiduría nos llega cuando ya no nos sirve de nada."',
        'tipo' => 'Literatura Latinoamericana'
    ],
    '3-14' => [
        'evento' => 'Nacimiento de Albert Einstein',
        'filosofo' => 'Albert Einstein',
        'cita' => '"La imaginación es más importante que el conocimiento. El conocimiento es limitado. La imaginación rodea el mundo."',
        'tipo' => 'Física y Filosofía'
    ],
    '3-28' => [
        'evento' => 'Nacimiento de Mario Vargas Llosa',
        'filosofo' => 'Mario Vargas Llosa',
        'cita' => '"Aprender a leer es lo más importante que me ha pasado en la vida."',
        'tipo' => 'Literatura Peruana'
    ],

    // Abril (4)
    '4-15' => [
        'evento' => 'Muerte de Jean-Paul Sartre',
        'filosofo' => 'Jean-Paul Sartre',
        'cita' => '"El hombre está condenado a ser libre."',
        'tipo' => 'Existencialismo'
    ],
    '4-22' => [
        'evento' => 'Nacimiento de Immanuel Kant',
        'filosofo' => 'Immanuel Kant',
        'cita' => '"La experiencia sin teoría es ciega, pero la teoría sin experiencia es mero juego intelectual."',
        'tipo' => 'Filosofía Crítica'
    ],
    '4-23' => [
        'evento' => 'Día del Libro y del Idioma',
        'filosofo' => 'Miguel de Cervantes',
        'cita' => '"El que lee mucho y anda mucho, ve mucho y sabe mucho."',
        'tipo' => 'Cultura'
    ],

    // Mayo (5)
    '5-5' => [
        'evento' => 'Nacimiento de Karl Marx',
        'filosofo' => 'Karl Marx',
        'cita' => '"Los filósofos no han hecho más que interpretar de diversos modos el mundo, pero de lo que se trata es de transformarlo."',
        'tipo' => 'Materialismo Dialéctico'
    ],
    '5-7' => [
        'evento' => 'Nacimiento de Johannes Brahms',
        'filosofo' => 'Johannes Brahms',
        'cita' => '"Sin salir de mi habitación, puedo conocer todo lo que hay bajo el cielo."',
        'tipo' => 'Arte y Filosofía'
    ],

    // Junio (6)
    '6-5' => [
        'evento' => 'Día Mundial del Medio Ambiente',
        'filosofo' => 'Reflexión Colectiva',
        'cita' => '"La Tierra no es una herencia de nuestros padres, sino un préstamo de nuestros hijos."',
        'tipo' => 'Filosofía Ambiental'
    ],
    '6-14' => [
        'evento' => 'Nacimiento de José Carlos Mariátegui',
        'filosofo' => 'José Carlos Mariátegui',
        'cita' => '"No queremos, ciertamente, que el socialismo sea en América calco y copia. Debe ser creación heroica."',
        'tipo' => 'Filosofía Peruana'
    ],
    '6-21' => [
        'evento' => 'Día de la Filosofía Peruana',
        'filosofo' => 'Augusto Salazar Bondy',
        'cita' => '"La filosofía en el Perú debe ser expresión auténtica de nuestro ser y de nuestra circunstancia."',
        'tipo' => 'Filosofía Nacional'
    ],

    // Julio (7)
    '7-11' => [
        'evento' => 'Nacimiento de Giorgio Agamben',
        'filosofo' => 'Giorgio Agamben',
        'cita' => '"El poder no se tiene, se ejerce."',
        'tipo' => 'Filosofía Contemporánea'
    ],
    '7-18' => [
        'evento' => 'Nacimiento de Nelson Mandela',
        'filosofo' => 'Nelson Mandela',
        'cita' => '"La educación es el arma más poderosa que puedes usar para cambiar el mundo."',
        'tipo' => 'Filosofía Política'
    ],
    '7-28' => [
        'evento' => 'Fiestas Patrias del Perú',
        'filosofo' => 'Pensamiento Andino',
        'cita' => '"Ama sua, ama llulla, ama quella (No robes, no mientas, no seas ocioso)"',
        'tipo' => 'Sabiduría Andina'
    ],

    // Agosto (8)
    '8-8' => [
        'evento' => 'Día Internacional de los Pueblos Indígenas',
        'filosofo' => 'Pensamiento Originario',
        'cita' => '"Todos los seres somos hijos de la misma madre tierra."',
        'tipo' => 'Cosmovisión Indígena'
    ],
    '8-12' => [
        'evento' => 'Nacimiento de Jacinto Chahuán',
        'filosofo' => 'Jacinto Chahuán',
        'cita' => '"La filosofía debe dialogar con las ciencias y con la realidad social."',
        'tipo' => 'Filosofía Peruana'
    ],
    '8-26' => [
        'evento' => 'Día de la Independencia de la Filosofía Peruana',
        'filosofo' => 'Diversos Autores',
        'cita' => '"Pensar desde el Perú es pensar desde la periferia, con ojos propios."',
        'tipo' => 'Identidad Filosófica'
    ],

    // Septiembre (9)
    '9-11' => [
        'evento' => 'Aniversario de la Universidad Nacional Mayor de San Marcos',
        'filosofo' => 'Tradición Filosófica Peruana',
        'cita' => '"La primera universidad de América, cuna del pensamiento crítico."',
        'tipo' => 'Historia Filosófica'
    ],
    '9-23' => [
        'evento' => 'Equinoccio de Primavera (Hemisferio Sur)',
        'filosofo' => 'Cosmovisión Andina',
        'cita' => '"Pachamama nos enseña el equilibrio y la renovación cíclica."',
        'tipo' => 'Filosofía Natural'
    ],
    '9-28' => [
        'evento' => 'Nacimiento de Confucio',
        'filosofo' => 'Confucio',
        'cita' => '"Elige un trabajo que te guste y no tendrás que trabajar ni un día de tu vida."',
        'tipo' => 'Filosofía Oriental'
    ],

    // Octubre (10)
    '10-4' => [
        'evento' => 'Día de San Francisco de Asís',
        'filosofo' => 'San Francisco de Asís',
        'cita' => '"Comienza haciendo lo necesario, luego lo posible, y de repente estarás haciendo lo imposible."',
        'tipo' => 'Espiritualidad'
    ],
    '10-15' => [
        'evento' => 'Día Mundial de la Filosofía (UNESCO)',
        'filosofo' => 'UNESCO',
        'cita' => '"La filosofía es una disciplina que estimula el pensamiento crítico e independiente."',
        'tipo' => 'Celebración Global'
    ],
    '10-27' => [
        'evento' => 'Nacimiento de Miguel Ángel Asturias',
        'filosofo' => 'Miguel Ángel Asturias',
        'cita' => '"La filosofía debe estar al servicio de la vida, no la vida al servicio de la filosofía."',
        'tipo' => 'Literatura Comprometida'
    ],

    // Noviembre (11)
    '11-7' => [
        'evento' => 'Revolución Rusa (Reflexión Histórica)',
        'filosofo' => 'Vladimir Lenin',
        'cita' => '"La teoría sin práctica es estéril, la práctica sin teoría es ciega."',
        'tipo' => 'Filosofía Política'
    ],
    '11-14' => [
        'evento' => 'Nacimiento de Claude Lévi-Strauss',
        'filosofo' => 'Claude Lévi-Strauss',
        'cita' => '"El sabio no es el hombre que proporciona las respuestas verdaderas, es el que formula las preguntas verdaderas."',
        'tipo' => 'Antropología Filosófica'
    ],
    '11-30' => [
        'evento' => 'Día del Filósofo Peruano',
        'filosofo' => 'Comunidad Filosófica Peruana',
        'cita' => '"Filósofo es quien hace de la pregunta un modo de vida y de la reflexión una patria."',
        'tipo' => 'Identidad Profesional'
    ],

    // Diciembre (12)
    '12-7' => [
        'evento' => 'Nacimiento de Noam Chomsky',
        'filosofo' => 'Noam Chomsky',
        'cita' => '"Si no crees en la libertad de expresión para los que desprecias, no crees en ella para nada."',
        'tipo' => 'Lingüística y Política'
    ],
    '12-10' => [
        'evento' => 'Día de los Derechos Humanos',
        'filosofo' => 'Declaración Universal',
        'cita' => '"Todos los seres humanos nacen libres e iguales en dignidad y derechos."',
        'tipo' => 'Ética Universal'
    ],
    '12-17' => [
        'evento' => 'Nacimiento de Arthur C. Clarke',
        'filosofo' => 'Arthur C. Clarke',
        'cita' => '"La única manera de descubrir los límites de lo posible es aventurarse un poco más allá, hacia lo imposible."',
        'tipo' => 'Ciencia Ficción Filosófica'
    ],
    '12-25' => [
        'evento' => 'Navidad - Reflexión sobre la Esperanza',
        'filosofo' => 'Diversas Tradiciones',
        'cita' => '"La esperanza es el sueño del hombre despierto."',
        'tipo' => 'Reflexión Espiritual'
    ],
    '12-31' => [
        'evento' => 'Fin de Año - Reflexión sobre el Tiempo',
        'filosofo' => 'Heráclito',
        'cita' => '"Todo fluye, nada permanece."',
        'tipo' => 'Filosofía del Cambio'
    ]
];

// Filósofos peruanos destacados (para cuando no hay efeméride específica)
$filosofos_peruanos = [
    [
        'nombre' => 'José Carlos Mariátegui',
        'cita' => '"No somos copia, somos creación. Debemos nuestro propio socialismo indoamericano."',
        'contribucion' => 'Pensamiento socialista peruano'
    ],
    [
        'nombre' => 'Augusto Salazar Bondy',
        'cita' => '"La filosofía peruana debe ser auténtica expresión de nuestra realidad."',
        'contribucion' => 'Filosofía de la liberación'
    ],
    [
        'nombre' => 'Francisco Miró Quesada',
        'cita' => '"El Perú es un problema, pero también una posibilidad."',
        'contribucion' => 'Filosofía de la ciencia'
    ],
    [
        'nombre' => 'Mariana Mould de Pease',
        'cita' => '"La historia se escribe con memoria y con olvido."',
        'contribucion' => 'Historiografía y filosofía'
    ],
    [
        'nombre' => 'Victor Li Carrillo',
        'cita' => '"La filosofía en el Perú debe dialogar con todas las voces."',
        'contribucion' => 'Filosofía intercultural'
    ],
    [
        'nombre' => 'Pensamiento Andino',
        'cita' => '"Ama sua, ama llulla, ama quella - No seas ladrón, no seas mentiroso, no seas ocioso."',
        'contribucion' => 'Cosmovisión indígena'
    ]
];

// Sabiduría universal (para días sin efemérides)
$sabiduria_universal = [
    [
        'autor' => 'Sócrates',
        'cita' => '"Solo sé que nada sé."',
        'area' => 'Epistemología'
    ],
    [
        'autor' => 'Aristóteles',
        'cita' => '"El hombre es un animal político."',
        'area' => 'Filosofía Política'
    ],
    [
        'autor' => 'Platón',
        'cita' => '"La mayor declaración de amor es la que no se hace; el hombre que siente mucho, habla poco."',
        'area' => 'Metafísica'
    ],
    [
        'autor' => 'Simone de Beauvoir',
        'cita' => '"No se nace mujer, se llega a serlo."',
        'area' => 'Filosofía Feminista'
    ],
    [
        'autor' => 'Friedrich Nietzsche',
        'cita' => '"Lo que no me mata, me hace más fuerte."',
        'area' => 'Filosofía de la Vida'
    ],
    [
        'autor' => 'Immanuel Kant',
        'cita' => '"La experiencia sin teoría es ciega, pero la teoría sin experiencia es mero juego intelectual."',
        'area' => 'Filosofía Crítica'
    ]
];

// Buscar efeméride para hoy
$clave_hoy = $hoy_mes . '-' . $hoy_dia;
$efemeride_hoy = $efemerides[$clave_hoy] ?? null;

// Preparar respuesta
if ($efemeride_hoy) {
    // Hay efeméride específica para hoy
    $respuesta = $efemeride_hoy;
    $respuesta['tipo_respuesta'] = 'Efeméride Específica';
    $respuesta['mensaje'] = "Hoy es un día especial en la historia del pensamiento.";
} else {
    // No hay efeméride específica, elegir aleatoriamente
    $aleatorio = rand(0, 1);
    
    if ($aleatorio === 0 && !empty($filosofos_peruanos)) {
        // Filósofo peruano aleatorio
        $index = array_rand($filosofos_peruanos);
        $filosofo = $filosofos_peruanos[$index];
        
        $respuesta = [
            'evento' => 'Pensamiento Peruano del Día',
            'filosofo' => $filosofo['nombre'],
            'cita' => $filosofo['cita'],
            'tipo' => 'Filosofía Peruana',
            'contribucion' => $filosofo['contribucion'],
            'tipo_respuesta' => 'Filósofo Peruano Aleatorio',
            'mensaje' => 'Hoy destacamos el pensamiento filosófico peruano.'
        ];
    } else {
        // Sabiduría universal aleatoria
        $index = array_rand($sabiduria_universal);
        $sabiduria = $sabiduria_universal[$index];
        
        $respuesta = [
            'evento' => 'Reflexión Filosófica del Día',
            'filosofo' => $sabiduria['autor'],
            'cita' => $sabiduria['cita'],
            'tipo' => $sabiduria['area'],
            'tipo_respuesta' => 'Sabiduría Universal',
            'mensaje' => 'Una perla de sabiduría para reflexionar hoy.'
        ];
    }
}

// Añadir información adicional
$respuesta['fecha_actual'] = date('d/m/Y');
$respuesta['dia_semana'] = [
    1 => 'Lunes', 2 => 'Martes', 3 => 'Miércoles', 
    4 => 'Jueves', 5 => 'Viernes', 6 => 'Sábado', 7 => 'Domingo'
][$hoy_semana];

$respuesta['saludo'] = [
    'Buenos días pensadores de ASEFIP,',
    'Saludos filosóficos en este día,',
    'Que la reflexión los acompañe hoy,',
    'Un día más para ejercer el pensamiento crítico,'
][rand(0, 3)];

$respuesta['sugerencia_actividad'] = [
    'Te invito a reflexionar sobre esta cita en tu diario filosófico.',
    'Comparte esta reflexión con un compañero de estudios.',
    'Investiga más sobre este autor en nuestra sección de filósofos.',
    '¿Cómo aplicarías esta idea a la realidad peruana actual?'
][rand(0, 3)];

// Enviar respuesta en formato JSON
echo json_encode([
    'success' => true,
    'efemeride' => $respuesta,
    'meta' => [
        'generado' => date('c'),
        'version' => '1.0',
        'proyecto' => 'ASEFIP - Agora Peruana'
    ]
]);

?>
