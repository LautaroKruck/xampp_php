<?php

    // Array de colores por tipo de Pokémon
    function getPokemonTypeColors() {
        return [
            "normal" => "#A8A77A", "fire" => "#EE8130", "water" => "#6390F0",
            "electric" => "#F7D02C", "grass" => "#7AC74C", "ice" => "#96D9D6",
            "fighting" => "#C22E28", "poison" => "#A33EA1", "ground" => "#E2BF65",
            "flying" => "#A98FF3", "psychic" => "#F95587", "bug" => "#A6B91A",
            "rock" => "#B6A136", "ghost" => "#735797", "dragon" => "#6F35FC",
            "dark" => "#705746", "steel" => "#B7B7CE", "fairy" => "#D685AD"
        ];
    }

    // Función para obtener datos del Pokémon desde la API
    function getPokemonData($pokemonName) {
        $url = "https://pokeapi.co/api/v2/pokemon/$pokemonName/";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    // Función para renderizar la tarjeta del Pokémon
    function renderPokemonCard($pokemonData, $typeColors) {
        if (isset($pokemonData['id'])) {
            $primer_tipo = $pokemonData['types'][0]['type']['name'];
            $color = $typeColors[$primer_tipo] ?? "#ccc";

            echo "<div class='pokemon-card'>";
            echo "<div class='pokemon-photo' style='background-color: $color;'>";
            echo "<img style='border: 5px solid black' src='{$pokemonData['sprites']['front_default']}' alt='Imagen del Pokémon' />";
            echo "</div>";
            echo "<div class='pokemon-datos' style='background-color: #f0f0f0; padding: 10px;'>";
            echo "<h2>" . ucfirst($pokemonData['name']) . "</h2>";
            echo "<p><strong>ID:</strong> {$pokemonData['id']}</p>";
            echo "<p><strong>Vida (HP):</strong> " . $pokemonData['stats'][0]['base_stat'] . "</p>";
            echo "<p><strong>Ataque:</strong> " . $pokemonData['stats'][1]['base_stat'] . "</p>";
            echo "<p><strong>Defensa:</strong> " . $pokemonData['stats'][2]['base_stat'] . "</p>";
            echo "<p><strong>Tipos:</strong> ";
            foreach ($pokemonData['types'] as $type) {
                $tipo = $type['type']['name'];
                $color = $typeColors[$tipo] ?? "#ccc";
                echo "<span style='color: $color;'>" . ucfirst($tipo) . "</span> ";
            }
            echo "</p>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "<p class='error'>Pokémon no encontrado. Por favor, verifica el nombre.</p>";
        }
    }

    // Función para manejar el inicio de sesión
    function login($users, $email, $password) {
        foreach ($users as $user) {
            if ($user['email'] === $email && $user['password'] === $password) {
                return $user['name']; // Retorna el nombre del usuario si encuentra coincidencia
            }
        }
        return false; // Retorna false si no encuentra coincidencia
    }

    // Lógica principal
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Manejo de la búsqueda de Pokémon
        if (isset($_POST['pokemon-name'])) {
            $pokemonName = strtolower(trim($_POST['pokemon-name']));
            if (!empty($pokemonName)) {
                $typeColors = getPokemonTypeColors();
                $pokemonData = getPokemonData($pokemonName);
                renderPokemonCard($pokemonData, $typeColors);
            } else {
                echo "<p class='error'>Por favor, ingresa un nombre válido.</p>";
            }
        }

        // Manejo del inicio de sesión
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $users = loadFromJson(); 
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $userName = login($users, $email, $password);

            if ($userName) {
                // Redirigir al usuario a la página principal
                header("Location: index.php");
                exit();
            } else {
                echo "<p class='error'>Email o contraseña incorrectos.</p>";
            }
        }

        // Manejo de registros
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
            $users = loadFromJson();
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            // Agregar el nuevo usuario al archivo JSON
            $newUser = ['name' => $name, 'email' => $email, 'password' => $password];
            $users[] = $newUser;
            saveToJson($users);

            echo "<p class='success'>Registro exitoso, por favor inicie sesión.</p>";
        }
    }

    function loadFromJson()
    {
        $file = 'users.json';
        if (file_exists($file)) {
            $content = file_get_contents($file);
            return json_decode($content, true) ?? []; // Decodificar JSON o devolver un array vacío
        }
        return []; // Si el archivo no existe, devolver un array vacío
    }

    function saveToJson($users)
    {
        // Nombre del archivo JSON
        $file = 'users.json';
        file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));
    }

?>
