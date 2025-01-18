<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Entrada</title>
</head>
<body>
    <h2>Formulario de Entrada</h2>
    <p>Construir un formulario de entrada para introducir los siguientes datos:</p>
    <ul>
        <li>Nombre</li>
        <li>Apellidos</li>
        <li>Edad</li>
        <li>Email</li>
        <li>Checkbox para solicitar ser admin</li>
    </ul>

    <form action="sign-in.php" method="post">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" maxlength="50" required>
        <br><br>
        <label for="lastname">Apellidos:</label>
        <input type="text" id="lastname" name="lastname" maxlength="255" required>
        <br><br>
        <label for="age">Edad:</label>
        <input type="number" id="age" name="age" min="18" max="65" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>
        <input type="checkbox" id="admin" name="admin">
        <label for="admin">Solicitar ser admin</label>
        <br><br>
        <input type="submit" value="Enviar">
        <br><br>
        <small>Recuerda que solo serás admin si marcas la casilla</small>
        <br><br>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los valores del formulario
        $name =         $_POST['name'];
        $lastname =     $_POST['lastname'];
        $age =          $_POST['age'];
        $email =        $_POST['email'];
        $isAdmin =      isset($_POST['admin']) ? 'admin' : 'user';

        // Validación de campos
        $errors = [];

        // Validar nombre
        if (strlen($name) > 50) {
            $errors[] = "El nombre no puede ser más largo de 50 caracteres.";
        }

        // Validar apellidos
        if (strlen($lastname) > 255) {
            $errors[] = "Los apellidos no pueden ser más largos de 255 caracteres.";
        }

        // Validar edad
        if (!filter_var($age, FILTER_VALIDATE_INT) || $age < 18 || $age > 65) {
            $errors[] = "La edad debe ser un número entero entre 18 y 65.";
        }

        // Validar email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "El email no es válido.";
        }

        // Mostrar errores o mensaje de bienvenida
        if (empty($errors)) {
            echo "<h3>Bienvenido, $name $lastname!</h3>";
            echo "<p>Tu edad es $age años.</p>";
            echo "<p>Tu email es: $email</p>";
            if ($isAdmin) {
                echo "<p>Vas a ser admin.</p>";
            } else {
                echo "<p>Vas a ser user.</p>";
            }
        } else {
            echo "<ul>";
            foreach ($errors as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
        }
    }
    ?>
</body>
</html>
