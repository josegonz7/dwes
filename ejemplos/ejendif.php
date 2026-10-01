<?php

$usuario_logueado = true;
$es_admin = true;
$nombre_usuario = "Juan";

if ($usuario_logueado) {
    echo "El usuario está logueado.<br>";
} else {
    echo "El usuario no está logueado.<br>";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>bienvenido, <?php echo $nombre_usuario; ?></h1>
</body>
</html>