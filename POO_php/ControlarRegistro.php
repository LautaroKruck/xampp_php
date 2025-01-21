<?php
// Controlar Registro
require_once "Usuario.php";
require_once "GestionFichero.php";

$usuario = new Usuario("1", "Pepe", "pepe@gmail.com", "1234");
$registro_incorrecto = false;

if (
    isset($_POST["user_id"]) &&
    isset($_POST["user_name"]) &&
    isset($_POST["user_email"]) &&
    isset($_POST["user_pass"])
) {
    $id = htmlspecialchars($_POST["user_id"]);
    $name = htmlspecialchars($_POST["user_name"]);
    $email = htmlspecialchars($_POST["user_email"]);
    $pass = htmlspecialchars($_POST["user_pass"]);

    // Validar si el usuario ya existe
    if ($id === $usuario->getId() && $email === $usuario->getEmail()) {
        $registro_incorrecto = true;
        require_once "index.php";
    } else {
        $newUser = new Usuario($id, $name, $email, $pass);

        $gestionFichero = new GestionFichero("usuarios.json");
        $usuarios = $gestionFichero->leerFichero();
        $usuarios[] = [
            'id' => $newUser->getId(),
            'nombre' => $newUser->getNombre(),
            'email' => $newUser->getEmail(),
            'password' => $newUser->getPassword()
        ];

        $gestionFichero->escribirFichero($usuarios);

        $name = $newUser->getNombre(); // Para usar en el archivo "registroCorrecto.php"
        require_once "registroCorrecto.php";
    }
}
?>