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
        <h1>150 primeros Pokémon</h1>
        <div id="pokemon-info" class="pokemon-info">
            <?php
            for ($pokemonId = 1; $pokemonId <= 10; $pokemonId++) {
                // Consumir la API para cada Pokémon
                $ch = curl_init("https://pokeapi.co/api/v2/pokemon/$pokemonId/");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch);
                curl_close($ch);

                $datos_pokemon = json_decode($result, true);

                if (isset($datos_pokemon['id'])) {
                    // Mostrar información del Pokémon
                    echo "<div class='pokemon-card'>";
                    echo "<img src='{$datos_pokemon['sprites']['front_default']}' alt='Imagen del Pokémon' />";
                    echo "<h2>" . $datos_pokemon['name'] . "</h2>";
                    echo "</div>";
                } else {
                    echo "<p class='error'>No se pudo cargar el Pokémon con ID $pokemonId.</p>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
