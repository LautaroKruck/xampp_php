

<?php
    /*
        EJERCICIO

        DECLARAR un ARRAY ASOCIATIVO BIDIMENSIONAL QUE VARIOS USUARIOS 
        LOS USUARIOS SE GURADAN CON EMAIL, NOMBRE Y PASSWORD

        REALIZAR IUN FORMULARIO DE LOGIN EN HTML 

        COMPROBAR EL LOGIN DEL USUARIO

        SI EL LOGIN ES CORRECTO IMPRIMIR LOGIN CORRECTO EN VERDE 
        SI EL LOGIN ES INCORRECTO IMPRIMIR LOGIN INCORRECTO EN ROJO Y LOS CAMPOS EMAIL Y PASSWORD SE PONEN EN ROJO
    */
        $users = [
            [ 'name' => 'juan', 'email' => 'juan@gmail.com', 'password'=> '1234'],
            [ 'name'=> 'username', 'email'=> 'user@gmail.com', 'password'=> '4321']
        ];

        $emailError = $passError = "";

        if (isset($_POST['email']) && isset($_POST['password'])) {
            $name = trim($_POST["name"]);
            $email = trim($_POST["email"]);
            $password = trim($_POST["password"]);
            $info = false;

            // Validar login
            foreach ($users as $user) {
                if ($user["email"] === $email && $user["password"] === $password) {
                    $info = true;
                    break;
                }
            }

            if ($info) {
                require_once "api_poke.php";
            } else {
                require_once "index.php";
            }
        }
?>
