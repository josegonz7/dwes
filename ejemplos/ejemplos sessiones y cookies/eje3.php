<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
session_start();

// vaciar el array de la session
$_SESSION[] = array();

// destruir la session
session_destroy();

echo "Sesión cerrada correctamente.<br>";
?>
</body>
</html>