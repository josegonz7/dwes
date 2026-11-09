<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenida</title>
</head>
<body>
<?php
if (isset($_SESSION['nombre_usuario']) && isset($_SESSION['apellido_usuario'])) {
    $nombreCompleto = htmlspecialchars($_SESSION['nombre_usuario']) . ' ' . htmlspecialchars($_SESSION['apellido_usuario']);
    echo "<h1>¡Bienvenido/a, " . $nombreCompleto . "!</h1>";
    echo "<p>Acceso concedido al evento exclusivo.</p>";
} else {
    echo "<h1>Acceso prohibido</h1>";
    echo "<p>No tienes permiso para acceder a esta página. Por favor, ingresa tus datos en el formulario.</p>";
    echo '<a href="formulario.html">Ir al formulario</a>';
}
?>
</body>
</html>