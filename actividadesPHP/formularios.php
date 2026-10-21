<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calcular el área de un círculo</title>
</head>
<body>
    <h1>Calcular el área de un círculo</h1>
    <form action="calcular.php" method="get">
        <label for="radio">Radio:</label>
        <input type="number" name="radio" id="radio" step="0.00001" required>
        <input type="submit" value="Calcular">
    </form>
    
    <?php


    // Obtener el valor del radio
        $radio = $_GET["radio"];


    // Calcular el área del círculo
        $area = pi() * $radio * $radio;


    // Mostrar el resultado
        echo "El área del círculo es de " . $area . " unidades cuadradas.";


    ?>

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'] ?? '';
    $apellidos = $_POST['apellidos'] ?? '';
    $email = $_POST['email'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';
    $sexo = $_POST['sexo'] ?? '';
    $profesion = $_POST['profesion'] ?? '';
    $aficiones = $_POST['aficiones'] ?? [];
    $herramienta = $_POST['herramienta'] ?? '';
    $comentario = $_POST['comentario'] ?? '';

    echo "<h3>Datos recibidos:</h3>";
    echo "Nombre: " . htmlspecialchars($nombre) . "<br>";
    echo "Apellidos: " . htmlspecialchars($apellidos) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Sexo: " . htmlspecialchars($sexo) . "<br>";
    echo "Profesión: " . htmlspecialchars($profesion) . "<br>";
    echo "Aficiones: " . htmlspecialchars(implode(", ", $aficiones)) . "<br>";
    echo "Herramienta: " . htmlspecialchars($herramienta) . "<br>";
    echo "Comentario: " . htmlspecialchars($comentario) . "<br>";
}
?>

<form action="" method="post">
    <label>Nombre: <input type="text" name="nombre"></label><br>
    <label>Apellidos: <input type="text" name="apellidos"></label><br>
    <label>e-mail: <input type="email" name="email"></label><br>
    <label>Contraseña: <input type="password" name="contrasena"></label><br><br>
    
    <label>Sexo:</label>
    <input type="radio" name="sexo" value="Hombre"> Hombre
    <input type="radio" name="sexo" value="Mujer"> Mujer<br><br>
    
    <label>Profesión:</label>
    <input type="radio" name="profesion" value="Profesor"> Profesor
    <input type="radio" name="profesion" value="Programador"> Programador
    <input type="radio" name="profesion" value="Diseñador gráfico"> Diseñador gráfico<br><br>
    
    <label>Aficiones:</label>
    <input type="checkbox" name="aficiones[]" value="Ciencia"> Ciencia
    <input type="checkbox" name="aficiones[]" value="Libros"> Libros
    <input type="checkbox" name="aficiones[]" value="Deportes"> Deportes<br><br>
    
    <label>Elija la herramienta de diseño web que prefiera:</label>
    <select name="herramienta">
        <option value="Herramienta 1">Herramienta web 1</option>
        <option value="Herramienta 2">Herramienta web 2</option>
    </select><br><br>
    
    <label>Indique sus comentarios:</label><br>
    <textarea name="comentario"></textarea><br><br>
    
    <input type="submit" value="Enviar">
    <input type="reset" value="Limpiar todo">
</form>



<form action="" method="post">
    <label>Introduce un número decimal: <input type="number" step="any" name="decimal" required></label>
    <input type="submit" value="Convertir a entero">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['decimal'])) {
    $numeroDecimal = $_POST['decimal'];
    if (is_numeric($numeroDecimal)) {
        $numeroEntero = (int)$numeroDecimal;
        echo "<p>El número entero es: <strong>$numeroEntero</strong></p>";
    } else {
        echo "<p>Por favor, introduce un número válido.</p>";
    }
}
?>


<form action="" method="post">
    <label>Introduce un texto: <input type="text" name="texto" required></label>
    <input type="submit" value="Transformar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['texto'])) {
    $texto = $_POST['texto'];
    $mayusculas = mb_strtoupper($texto, 'UTF-8');
    $minusculas = mb_strtolower($texto, 'UTF-8');
    
    echo "<p><strong>Mayúsculas:</strong> $mayusculas</p>";
    echo "<p><strong>Minúsculas:</strong> $minusculas</p>";
}
?>


<form action="" method="post">
    <label>Número 1: <input type="number" name="num1" step="1" required></label><br>
    <label>Número 2: <input type="number" name="num2" step="1" required></label><br>
    <input type="submit" value="Calcular Suma">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['num1']) && isset($_POST['num2'])) {
    $n1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_INT);
    $n2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_INT);
    
    if ($n1 !== false && $n2 !== false) {
        $suma = $n1 + $n2;
        echo "<p>La suma de $n1 y $n2 es: <strong>$suma</strong></p>";
    } else {
        echo "<p>Por favor, introduce números enteros válidos.</p>";
    }
}
?>


<form action="" method="post">
    <label>Introduce el radio (r): <input type="number" step="any" name="radio" required></label>
    <input type="submit" value="Calcular">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['radio'])) {
    $r = (float)$_POST['radio'];
    if ($r > 0) {
        $longitud = 2 * M_PI * $r;
        $superficie = M_PI * pow($r, 2);
        $volumen = (4 / 3) * M_PI * pow($r, 3);
        
        echo "<h3>Resultados (redondeados a 2 decimales):</h3>";
        echo "Longitud de la circunferencia: " . round($longitud, 2) . "<br>";
        echo "Superficie del círculo: " . round($superficie, 2) . "<br>";
        echo "Volumen de la esfera: " . round($volumen, 2) . "<br>";
    } else {
        echo "<p>Por favor, introduce un radio mayor que 0.</p>";
    }
}
?>


<form action="" method="post">
    <label>Introduce una cadena: <input type="text" name="cadena" required></label>
    <input type="submit" value="Invertir">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cadena'])) {
    $cadenaOriginal = $_POST['cadena'];
    $cadenaInvertida = '';
    $longitud = strlen($cadenaOriginal);
    
    for ($i = $longitud - 1; $i >= 0; $i--) {
        $cadenaInvertida .= $cadenaOriginal[$i];
    }
    
    echo "<p>Cadena original: <strong>" . htmlspecialchars($cadenaOriginal) . "</strong></p>";
    echo "<p>Cadena invertida: <strong>" . htmlspecialchars($cadenaInvertida) . "</strong></p>";
}
?>
