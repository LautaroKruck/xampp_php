<?php

// Array asociativo con datos de usuarios
$users = [
    ['name' => 'Juan', 'email' => 'juan@gmail.com', 'password' => '1234'],
    ['name' => 'Username', 'email' => 'user@gmail.com', 'password' => '4321'],
    ['name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => 'admin123'] // Puedes añadir más usuarios aquí
];

$emailError = $passError = "";

// Verificar si se han enviado los datos del formulario
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = trim($_POST['email']); // Eliminar espacios al inicio y al final
    $password = trim($_POST['password']); // Eliminar espacios al inicio y al final
    $info = false; // Variable para validar si el usuario existe

    // Validar login recorriendo el array de usuarios
    foreach ($users as $user) {
        if ($user['email'] === $email && $user['password'] === $password) {
            $info = true;
            $userName = $user['name']; // Guardar el nombre del usuario autenticado
            break;
        }
    }

    if ($info) {
        // Inicio de sesión exitoso
        echo "<h1>Bienvenido, $userName</h1>";

        require_once "index.php";
    } else {
        // Error de inicio de sesión
        echo "Email o contraseña incorrectos.";

        require_once "login.php";
    }
}
?>