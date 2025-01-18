<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="num1">Num1</label>
        <input type="number" id="num1" name="num1" required><br><br>
        <label for="num2">Num2</label>
        <input type="number" id="num2" name="num2" required><br><br>
        <input type="submit" name='btton' value="Sumar">
        <input type="submit" name='btton' value="Restar">
        <input type="submit" name='btton' value="Multiplicar">
        <input type="submit" name='btton' value="Dividir">

    </form>

    <?php if(isset($_POST['num1']) && isset($_POST['num2'])): ?>

        <?php 
            echo 'hola';
            require_once 'fun.php';

            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $resultado = 0;
            match($_POST['btton']) {
                "Sumar" => $resultado = sumar($num1, $num2),
                "Restar" => $resultado = restar($num1, $num2),
                "Multiplicar" => $resultado = multiplicar($num1, $num2),
                "Dividir" => $resultado = dividir($num1, $num2),
                default => "Error al realizar la operación",
            }
        ?>
        <h3>El resultado es <?=$resultado?></h3>

    <?php endif; ?>
</body>
</html>