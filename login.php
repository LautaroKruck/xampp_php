<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 style = "color:red">Login de la Pagina Web</h1>
    <form action="login.php" method="GET">

        <label for="username">Nombre de Usuario:</label>
        <input type="text" name="username" id= "username"/>

        <label for="password">Contraseña de Usuario:</label>
        <input type="password" name="password" id= "password"/>

        <input type="submit" value="Enviar">
    </form>

    <?php

    $user = "admin";
    $pass = "admin";
    
    if ($_GET["username"] == $user && $_GET["password"] == $pass) {
        echo "BIENVENID@ ". $user;
    } else {
        echo "Contraseña o nombre de Usuario incorrecto.";
    }
    ?>
</body>
</html>