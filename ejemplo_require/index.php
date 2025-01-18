<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

    <?php
        require_once "header.php";
    ?>

    <main class="body__main">
        <form method="POST" action="index.php">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </main>

    <?php
        /*
        LOGIN

        -Declara dos variables con el email y password que esten en el sistema
        -Comprobar si lo que se envia por el formulario coincide con las variables declaradas

        -Si el login es correcto -> imprimir un h3 en verde que salga "Login correcto"
        -Si el login es incorrecto -> imprimir un h3 que ponga en rojo "Credenciales incorrectas"
        
        NO QUIERO MENSAJES "RANDOM" CUANDO SE CARGA LA PAGINA


        */
        
        // Definir credenciales correctas
        $correctEmail = "juana@example";
        $correctPassword = "pass1234";
        
        // Si se envía el formulario
        if (isset($_POST['exampleInputEmail1']) && isset($_POST['exampleInputPassword1'])) {
        
            $email = $_POST['exampleInputEmail1'];
            $password = $_POST['exampleInputPassword1'];
            
            // Validar las credenciales
            if ($email === $correctEmail && $password === $correctPassword) {
                // Guardar la información del usuario en la sesión
                echo "<h3 class='text-success'>Login correcto</h3>";
            } else {
                // Si las credenciales son incorrectas
                echo "<h3 class='text-danger'>Credenciales incorrectas</h3>";
            }
        }


        $arr = array ("hola", "mundo", "adios", "loquesea");
        foreach ($arr as $item) {
            echo "". $item ."<br>";
        }
        $arr2 = ["pikachu", "charmander", "squirtle", "bulbasur"];
        for ($i = 0; $i < count($arr2); $i++) {
            echo "". $arr2[$i] ."<br>";
        }
        array_unshift($arr2,"ditto");

        foreach ($arr2 as $item) {
            echo "". $item ."<br>";
        }

        echo "<hr>";

        $arr3 = ["Los Barrios", "Jerez", "Conil"];
        $arr3 [] = "San Fernando";
        $arr3 [2] = "Chiclana";

        foreach ($arr3 as $item) {
            echo "". $item ."<br>";
        }

        echo "<hr>";
        
        $arr_bidi = [
            ["Juan", "Pepe", "Alicia"],
            ["PC", "Play", "Xbox"],
            ["Futbol", "Padel", "Bolos"]
        ];

        foreach ($arr_bidi as $sub_array) {
            foreach ($sub_array as $item) {
                echo "". $item. "<br>";
            }
            echo "<hr>";
        }

        echo "<hr>";
        $arr_bidi_asoc  = [ 
            ["pueblo1"=>"Ubrique", "pueblo2"=>"El Bosque","pueblo3"=>"Benamaoma"],
            ["pueblo1"=>"Chiclana", "pueblo2"=>"San Fernando","pueblo3"=>"Jerez"]
        ];

        echo $arr_bidi_asoc[0]["pueblo1"] ."<br>";
        
        ?>

    <?php
        require_once "footer.php";
    ?>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>