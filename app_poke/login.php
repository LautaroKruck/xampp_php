<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <?php include('header.php'); ?>
    
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


</body>
</html>