
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>AMP-1. Tabla de Multiplicar</title>
</head>
<body>
    <h1>Tabla de Multiplicar</h1>
    <form method="post" action="">
        <label for="numero">Introduce un número:</label>
        <input type="number" id="numero" name="numero" required>
        <button type="submit">Calcular</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['numero'])) {
        $num = intval($_POST['numero']);
        echo "<h3>Tabla de multiplicar del $num:</h3>";
        for ($i = 1; $i <= 10; $i++) {
            echo "$num x $i = " . ($num * $i) . "<br>";
        }
    }
    ?>
</body>
</html>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>AMP-2. Tabla Recursiva</title>
</head>
<body>
    <h1>Tabla de Multiplicar (Recursiva)</h1>
    <form method="post" action="">
        <label for="numero">Introduce un número:</label>
        <input type="number" id="numero" name="numero" required>
        <button type="submit">Calcular</button>
    </form>
    <?php
    function tablaRecursiva($num, $i = 1) {
        if ($i > 10) return;
        echo "$num x $i = " . ($num * $i) . "<br>";
        tablaRecursiva($num, $i + 1);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['numero'])) {
        $num = intval($_POST['numero']);
        echo "<h3>Tabla de multiplicar del $num:</h3>";
        tablaRecursiva($num);
    }
    ?>
</body>
</html>


<?php
if (isset($_GET['edad'])) {
    $edad = intval($_GET['edad']);
    $anioActual = intval(date("Y"));
    
    $edadMas10 = $edad + 10;
    $edadMenos10 = $edad - 10;
    $anioMas10 = $anioActual + 10;
    $anioMenos10 = $anioActual - 10;
    $anioJubilacion = $anioActual + (67 - $edad);
    
    echo "Edad actual: $edad años<br>";
    echo "Edad dentro de 10 años: $edadMas10 años<br>";
    echo "Edad hace 10 años: $edadMenos10 años<br>";
    echo "Año en 10 años: $anioMas10<br>";
    echo "Año hace 10 años: $anioMenos10<br>";
    echo "Año de jubilación (a los 67 años): $anioJubilacion<br>";
} else {
    echo "Por favor, proporciona la edad en la URL (ej: ?edad=33).";
}
?>


<?php
if (isset($_GET['cantidad'])) {
    $cantidad = intval($_GET['cantidad']);
    $elementos = [500, 200, 100, 50, 20, 10, 5, 2, 1];
    
    echo "<h3>Descomposición de $cantidad euros:</h3>";
    foreach ($elementos as $valor) {
        $num = intdiv($cantidad, $valor);
        $cantidad %= $valor;
        $tipo = ($valor >= 5) ? "billete" : "moneda";
        if ($num != 1) $tipo .= "s";
        echo "$num $tipo de $valor<br>";
    }
} else {
    echo "Por favor, introduce una cantidad en la URL (ej: ?cantidad=139).";
}
?>

