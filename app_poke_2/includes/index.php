<?php
require_once "LoginController.php";
require_once "RegistroController.php";
require_once "PokemonController.php";

$rutaUsuarios = "usuarios.json";
$loginController = new LoginController($rutaUsuarios);
$registroController = new RegistroController($rutaUsuarios);
$pokemonController = new PokemonController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['user_email'], $_POST['user_pass'])) {
        $email = trim($_POST['user_email']);
        $password = trim($_POST['user_pass']);
        $usuario = $loginController->login($email, $password);

        if ($usuario) {
            echo "Bienvenido, " . $usuario->getName();
        } else {
            echo "Email o contraseña incorrectos.";
        }
    } elseif (isset($_POST['user_name'], $_POST['user_email'], $_POST['user_pass'])) {
        $name = trim($_POST['user_name']);
        $email = trim($_POST['user_email']);
        $password = trim($_POST['user_pass']);

        if ($registroController->registrarUsuario($name, $email, $password)) {
            echo "Registro exitoso.";
        } else {
            echo "El email ya está registrado.";
        }
    } elseif (isset($_POST['pokemon-name'])) {
        $pokemonName = strtolower(trim($_POST['pokemon-name']));
        $pokemonData = $pokemonController->getPokemonData($pokemonName);
        $typeColors = $pokemonController->getTypeColors();

        if ($pokemonData) {
            echo "<pre>";
            print_r($pokemonData);
            echo "</pre>";
        } else {
            echo "Pokémon no encontrado.";
        }
    }
}
?>
