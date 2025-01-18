<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <div class="main_resultado">
            <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $num1 = $_POST['num1'] ?? 0;
                    $num2 = $_POST['num2'] ?? 0;
                    $operacion = $_POST['operacion'] ?? '';

                    if (!is_numeric($num1) || !is_numeric($num2)) {
                        echo "<p>Por favor, ingrese números válidos.</p>";
                        exit;
                    }

                    switch ($operacion) {
                        case 'suma':
                            $resultado = $num1 + $num2;
                            echo "<p>El resultado de la suma es: $resultado</p>";
                            break;
                        case 'resta':
                            $resultado = $num1 - $num2;
                            echo "<p>El resultado de la resta es: $resultado</p>";
                            break;
                        case 'multiplicacion':
                            $resultado = $num1 * $num2;
                            echo "<p>El resultado de la multiplicación es: $resultado</p>";
                            break;
                        case 'division':
                            if ($num2 != 0) {
                                $resultado = $num1 / $num2;
                                echo "<p>El resultado de la división es: $resultado</p>";
                            } else {
                                echo "<p>No se puede dividir entre cero.</p>";
                            }
                            break;
                        default:
                            echo "<p>Operación no válida.</p>";
                    }
                } else {
                    echo "<p>No se recibieron datos.</p>";
                }
            ?>
        </div>
        <a href="index.html">Volver</a>
    </main>
</body>
</html>
