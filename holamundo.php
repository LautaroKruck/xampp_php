<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Primer programa con PHP </h1>
    
    <?php echo "<h2>¡Hola Mundo!</h2>"; ?>
    <?php echo "<h3>¿Adios Mundo!</h3>"; ?>

    <?php
        $nombre = "Juan";
        echo "<h4>Hola $nombre!</h4>";
   ?>
   <?php echo "<ul>"."<li>opcion 1</li>"."<li>opcion 2</li>"."</ul>"; ?>

   Declarar dos cariables con dos valores numericos intercambiar el valor de ambas variables imprimr ambas variables por pantalla

   <?php
   echo "<h3> Intercambio variables</h3>";
        $num1 = 10;
        $num2 = 20;
        echo "<h5>Valor de num1 antes: $num1</h5>";
        echo "<h5>Valor de num2 antes: $num2</h5>";

        $var = $num1;
        $num2 = $num1;
        $num1 = $num2;
        echo "<h5>Valor de num1 despues: $num1</h5>";
        echo "<h5>Valor de num2 despues: $num2</h5>";
    ?>  

    <?php
    echo "<h3>Conversion de monedas...</h3>";

        $pesetas = 166386;
        $euros = $pesetas / 166.386;
        $euros2 = 10;
        $pesetas2 = $euros * 166.386;
        echo "<h6>Conversion de $pesetas pesetas a euros: $euros </h6>";
        echo "<h6>Conversion de $euros2 euros a pesetas: $pesetas2 </h6>";
   ?>

   <?php 
   echo "<h3> Calculadora...</h3>";

        $numero1 = 5;
        $numero2 = 7;

        echo "Suma: ".$numero1."+".$numero2."=".($numero1 + $numero2)."<br/>";
        echo "Resta: ".$numero1."-".$numero2."=".($numero1 - $numero2)."<br/>";
        echo "Multiplicacion: ".$numero1."*".$numero2."=".($numero1 * $numero2)."<br/>";
        echo "Division: ".$numero1."/".$numero2."=".($numero1 / $numero2)."<br/>";
        echo "Modulo: ".$numero1."%".$numero2."=".($numero1 % $numero2)."<br/>";

  ?>
</body>
</html>