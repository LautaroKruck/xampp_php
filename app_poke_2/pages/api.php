<?php
require_once '../includes/PokemonController.php';

$pokemonController = new PokemonController();
$pokemonData = null;
$typeColors = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pokemon-name'])) {
    $pokemonName = $_POST['pokemon-name'];
    $pokemonData = $pokemonController->getPokemonData($pokemonName);
    $typeColors = $pokemonController->getTypeColors();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poke App</title>
    <!-- Enlaces a archivos CSS -->
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
</head>
<body>
    <!-- Incluir el encabezado -->
    <?php include('../includes/extras/header.php'); ?>

    <main class="container">
        <div id="buscador-info" class="buscador-info">
            <h1>Nombre del Pokémon</h1>
            <form id="pokemon-form" method="POST" action="api.php">
                <input
                    type="text"
                    name="pokemon-name"
                    id="pokemon-name"
                    placeholder="Ingrese el nombre del Pokémon"
                    required
                />
                <button type="submit">Buscar</button>
            </form>
        </div>

        <div id="pokemon-info" class="pokemon-info">
            <h1>Información de Pokémon</h1>
            <!-- La información del Pokémon será generada aquí -->
            <?php
            if ($pokemonData) {
                $pokemonController->renderPokemonCard($pokemonData, $typeColors);
            }
            ?>
        </div>
    </main>

    <!-- Incluir el pie de página -->
    <?php include('../includes/extras/footer.php'); ?>

</body>
</html>
