<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de Pokémon</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Información de Pokémon</h1>
        <form id="pokemon-form" method="POST" action="pokemon.php">
            <input
                type="text"
                name="pokemon-name"
                id="pokemon-name"
                placeholder="Ingrese el nombre del Pokémon"
                required
            />
            <button type="submit">Buscar</button>
        </form>
        <div id="pokemon-info" class="pokemon-info">
            <!-- La información del Pokémon será generada aquí -->
            <?php
            // Array de colores por tipo de Pokémon
            $colores_tipos = [
                "normal" => "#A8A77A", "fire" => "#EE8130", "water" => "#6390F0",
                "electric" => "#F7D02C", "grass" => "#7AC74C", "ice" => "#96D9D6",
                "fighting" => "#C22E28", "poison" => "#A33EA1", "ground" => "#E2BF65",
                "flying" => "#A98FF3", "psychic" => "#F95587", "bug" => "#A6B91A",
                "rock" => "#B6A136", "ghost" => "#735797", "dragon" => "#6F35FC",
                "dark" => "#705746", "steel" => "#B7B7CE", "fairy" => "#D685AD"
            ];

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $pokemonName = strtolower(trim($_POST['pokemon-name']));

                // Validar entrada
                if (!empty($pokemonName)) {
                    // Consumir la API
                    $ch = curl_init("https://pokeapi.co/api/v2/pokemon/$pokemonName/");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $result = curl_exec($ch);
                    curl_close($ch);

                    $datos_pokemon = json_decode($result, true);

                    if (isset($datos_pokemon['id'])) {
                        // Mostrar información del Pokémon
                        echo "<div class='pokemon-card'>";
                        echo "<img style='border: 5px solid $color' src='{$datos_pokemon['sprites']['front_default']}' alt='Imagen del Pokémon' />";
                        echo "<h2>" . ucfirst($datos_pokemon['name']) . "</h2>";
                        echo "<p><strong>ID:</strong> {$datos_pokemon['id']}</p>";
                        echo "<p><strong>Vida (HP):</strong> " . $datos_pokemon['stats'][0]['base_stat'] . "</p>";
                        echo "<p><strong>Ataque:</strong> " . $datos_pokemon['stats'][1]['base_stat'] . "</p>";
                        echo "<p><strong>Defensa:</strong> " . $datos_pokemon['stats'][2]['base_stat'] . "</p>";
                        echo "<p><strong>Tipos:</strong> ";
                        foreach ($datos_pokemon['types'] as $type) {
                            $tipo = $type['type']['name'];
                            $color = $colores_tipos[$tipo] ?? "#ccc";
                            echo "<span style='color: $color;'>" . ucfirst($tipo) . "</span> ";
                        }
                        echo "</p>";
                        echo "</div>";
                    } else {
                        echo "<p class='error'>Pokémon no encontrado. Por favor, verifica el nombre.</p>";
                    }
                } else {
                    echo "<p class='error'>Por favor, ingresa un nombre válido.</p>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>