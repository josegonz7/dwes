<!-- 
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
    <section>
        <h2>Otras formas de resolver una ecuación de segundo grado</h2>

        <h3>1. Factorización</h3>
        <p>Consiste en escribir la ecuación como producto de dos factores e igualar cada factor a cero. Es práctica cuando la ecuación se puede factorizar fácilmente.</p>
        <p>Ejemplo: x² - 5x + 6 = 0</p>
        <p>(x - 2)(x - 3) = 0, por tanto x = 2 o x = 3.</p>

        <h3>2. Completar el cuadrado</h3>
        <p>Se transforma la expresión para obtener un binomio al cuadrado. Después se despeja x.</p>
        <p>Ejemplo: x² + 4x + 3 = 0</p>
        <p>x² + 4x = -3<br>(x + 2)² = 1<br>x + 2 = ±1, por tanto x = -1 o x = -3.</p>

        <h3>3. Analizar el discriminante</h3>
        <p>Antes de calcular las soluciones, se puede estudiar el discriminante Δ = b² - 4ac:</p>
        <ul>
            <li>Si Δ &gt; 0, hay dos soluciones reales distintas.</li>
            <li>Si Δ = 0, hay una solución real doble.</li>
            <li>Si Δ &lt; 0, no hay soluciones reales (hay dos soluciones complejas).</li>
        </ul>
        <p>Este análisis también se utiliza en el cálculo de arriba para decidir qué resultado mostrar.</p>
    </section>
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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>AMP-7. Registro de Notas</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        .destacado-verde { background-color: #d4edda; color: #155724; }
        .destacado-rojo { background-color: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
    <h2>Registro de Notas del Alumno</h2>
    <form method="post" action="">
        <label for="nombre">Nombre del Alumno:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>
        <label for="matematicas">Matemáticas:</label><br>
        <input type="number" step="0.01" min="0" max="10" id="matematicas" name="matematicas" required><br><br>
        <label for="lengua">Lengua:</label><br>
        <input type="number" step="0.01" min="0" max="10" id="lengua" name="lengua" required><br><br>
        <label for="ciencias">Ciencias:</label><br>
        <input type="number" step="0.01" min="0" max="10" id="ciencias" name="ciencias" required><br><br>
        <button type="submit">Calcular Promedio</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = htmlspecialchars($_POST['nombre']);
        $matematicas = floatval($_POST['matematicas']);
        $lengua = floatval($_POST['lengua']);
        $ciencias = floatval($_POST['ciencias']);
        $promedio = ($matematicas + $lengua + $ciencias) / 3;
        $claseFila = '';
        if ($promedio >= 7) {
            $claseFila = 'destacado-verde';
        } elseif ($promedio < 4) {
            $claseFila = 'destacado-rojo';
        }
        echo "<h3>Resultados Evaluation:</h3>";
        echo "<table>";
        echo "<tr><th>Alumno</th><th>Matemáticas</th><th>Lengua</th><th>Ciencias</th><th>Promedio</th></tr>";
        echo "<tr class='$claseFila'>";
        echo "<td>$nombre</td>";
        echo "<td>$matematicas</td>";
        echo "<td>$lengua</td>";
        echo "<td>$ciencias</td>";
        echo "<td>" . number_format($promedio, 2) . "</td>";
        echo "</tr>";
        echo "</table>";
    }
    ?>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>AMP-8. Ecuación de segundo grado</title>
</head>
<body>
    <h2>Ecuación de 2º Grado (ax² + bx + c = 0)</h2>
    <form method="get" action="">
        <label for="a">Coeficiente a:</label>
        <input type="number" step="any" name="a" id="a" required><br>
        <label for="b">Coeficiente b:</label>
        <input type="number" step="any" name="b" id="b" required><br>
        <label for="c">Coeficiente c:</label>
        <input type="number" step="any" name="c" id="c" required><br><br>
        <button type="submit">Calcular</button>
    </form>
    <?php
    if (isset($_GET['a']) && isset($_GET['b']) && isset($_GET['c'])) {
        $a = floatval($_GET['a']);
        $b = floatval($_GET['b']);
        $c = floatval($_GET['c']);
        if ($a == 0) {
            echo "<p>El coeficiente &apos;a&apos; no puede ser 0 (no es una ecuación de segundo grado).</p>";
        } else {
            $discriminante = ($b * $b) - (4 * $a * $c);
            if ($discriminante > 0) {
                $x1 = (-$b + sqrt($discriminante)) / (2 * $a);
                $x2 = (-$b - sqrt($discriminante)) / (2 * $a);
                echo "<p>La ecuación tiene dos soluciones reales:<br>Solución 1: $x1<br>Solución 2: $x2</p>";
            } elseif ($discriminante == 0) {
                $x = -$b / (2 * $a);
                echo "<p>La ecuación tiene una única solución real:<br>Solución: $x</p>";
            } else {
                echo "<p>La ecuación no tiene soluciones reales.</p>";
            }
        }
    } else {
        echo "<p>Por favor, introduce los coeficientes a, b y c en el formulario o en la URL.</p>";
    }
    ?>
</body>
</html> -->
