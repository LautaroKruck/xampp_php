<?php
require_once '../includes/RegisterController.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['repeat-password'])) {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeatPassword = $_POST['repeat-password'];

        if ($password !== $repeatPassword) {
                $error = "Las contraseñas no coinciden.";
                exit;
        } else {
            $registerController = new RegisterController('../data/users.json');

            if ($registerController->register($nombre, $email, $password)) {
                header('Location: api.php');
            } else {
                $error = 'El usuario ya está registrado.';
            }
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
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/register.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <title>Formulario de Registro</title>

</head>
<body>
    <?php include('../includes/extras/header.php'); ?>

    <form action="register.php" method="POST">
        <h2>Registro</h2>
        <?php if ($error): ?>
            <p style="color: red;"><?php echo $error; ?></p>
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
        <div class="form-group">
            <label for="repeat-password">Repetir Contraseña</label>
            <input type="password" id="repeat-password" name="repeat-password" placeholder="Repite tu contraseña" required>
        </div>
        <div class="form-group" style="display: flex; justify-content: space-between;">
            <button type="submit">Enviar</button>
            <button type="reset">Borrar</button>
        </div>
    </form>
    
    <?php include('../includes/extras/footer.php'); ?>

</body>

</html>
