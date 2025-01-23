<?php
require_once '../includes/LoginController.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nombre'], $_POST['email'], $_POST['password'])) {
        $nombre = trim($_POST['nombre']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        // Ruta correcta al archivo JSON
        $loginController = new LoginController('../data/users.json');

        // Intenta iniciar sesión
        if ($loginController->login($nombre, $email, $password)) {
            header('Location: api.php'); // Redirige al API tras iniciar sesión
            exit;
        } else {
            $error = 'Nombre, correo electrónico o contraseña incorrectos.';
        }
    } else {
        $error = 'Por favor, complete todos los campos.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Enlaces a archivos CSS -->
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
</head>
<body>
    <?php include('../includes/extras/header.php'); ?>

    <form action="index.php" method="POST">
        <h2>Login</h2>
        <?php if ($error): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endif; ?>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="Introduce tu nombre" required>
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email" placeholder="Introduce tu email" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" placeholder="Introduce tu contraseña" required>
        </div>
        <div class="form-group" style="display: flex; justify-content: space-between;">
            <button type="submit">Iniciar</button>
            <button type="reset">Borrar</button>
        </div>
    </form>

    <?php include('../includes/extras/footer.php'); ?>
</body>
</html>
