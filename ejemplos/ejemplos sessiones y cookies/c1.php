<?php

if (!isset($_COOKIE['contador'])) {
    setcookie('contador', "1", time() + 3600 * 24);
    echo "Bienvenido, esta es tu primera visita ." ;
} else {
    $contador = (int) $_COOKIE['contador'];
    $contador++;
    setcookie('contador', $contador, time() + 3600 * 24);
    echo "Has visitado esta página $contador veces.";
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
    <br>
    <a href="c1a.php">Borrar cookies</a>  
</body>
</html>