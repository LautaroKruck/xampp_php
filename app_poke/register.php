<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Formulario de Registro</title>

</head>
<body>
    <?php include('header.php'); ?>
    
    <form action="logica.php" method="POST">
        <h2>Registro</h2>
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
</body>
</html>