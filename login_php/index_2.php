<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="">
        <label for="name">Nombre:</label><br>
        <input type="name" id="name" name="name" ><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" <?= $emailError ?>><br><br>
        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" <?= $passError ?>><br><br>
        <button type="submit">Login</button>
    </form>
    <?= $message ?>

</body>
</html>
