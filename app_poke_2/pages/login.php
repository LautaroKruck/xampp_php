<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Enlaces a archivos CSS -->
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
</head>
<body>
    <?php include('../includes/header.php'); ?>

    <form action="do_login.php" method="POST" >
    <h2>Login</h2>
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

    <?php include('../includes/footer.php'); ?>
    
</body>

</html>