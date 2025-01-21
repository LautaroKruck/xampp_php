<?php

class PokemonController {
    private $typeColors;

    public function __construct() {
        $this->typeColors = [
            "normal" => "#A8A77A", "fire" => "#EE8130", "water" => "#6390F0",
            "electric" => "#F7D02C", "grass" => "#7AC74C", "ice" => "#96D9D6",
            "fighting" => "#C22E28", "poison" => "#A33EA1", "ground" => "#E2BF65",
            "flying" => "#A98FF3", "psychic" => "#F95587", "bug" => "#A6B91A",
            "rock" => "#B6A136", "ghost" => "#735797", "dragon" => "#6F35FC",
            "dark" => "#705746", "steel" => "#B7B7CE", "fairy" => "#D685AD"
        ];
    }

    public function getPokemonData(string $pokemonName): array {
        $url = "https://pokeapi.co/api/v2/pokemon/" . strtolower(trim($pokemonName));
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($result, true);
        return $data ?? [];
    }

    public function getTypeColors(): array {
        return $this->typeColors;
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
}

?>