<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <form action="controlarRegistro.php" method="post">
        <h1>Registro</h1>
        <label for="user_id">Id:</label>
        <input style="border-color: <?= isset($registro_incorrecto) && $registro_incorrecto ? 'red' : 'black' ?>" type="text" id="user_id" name="user_id" required><br><br>

        <label for="user_name">Nombre:</label>
        <input type="text" id="user_name" name="user_name" required><br><br>

        <label for="user_email">Email:</label>
        <input type="email" id="user_email" name="user_email" required><br><br>

        <label for="user_pass">Contraseña:</label>
        <input type="password" id="user_pass" name="user_pass" required><br><br>

        <input type="submit" value="Registrar">
        <input type="reset" value="Limpiar">

        <?php if (isset($registro_incorrecto) && $registro_incorrecto): ?>
            <p style="color: red;">El usuario ya está registrado.</p>
        <?php endif; ?>
    </form>
</body>
</html>