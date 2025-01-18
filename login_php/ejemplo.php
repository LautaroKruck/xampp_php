<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        $arr_asoc = ["coche1"=>"ford", "coche2"=>"renault", "coche3"=>"fiat"];

        echo $arr_asoc['coche1'];

        $arr = [
            ["marca"=>"ford", "modelo"=>"focus"],
            ["marca"=>"renault", "modelo"=>"clio"]
        ];
        
    
    ?>
        <ul>
            <?php foreach  ($arr_asoc as $key => $value): ?>
                <li><?= $value ?></li>
            <?php endforeach; ?>
        </ul>

        <form action="index.php" method= "post">
                <input type="color" name="inputcolor" id="inputcolor">
                <button type="sumbit">Enviar </button>
        </form>

        <?php
            $colorEscogido = $_POST["inputcolor"] ?? "black";
        ?>

        <p style="<?= $colorEscogido?>"> Hola muy buenas, estoy usando php</p>
        
</body>

</html>


