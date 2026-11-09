<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicio de sesion</title>
</head>
<body>
    <h1>Inicio de sesión</h1>
    <form action="login.php" method="post">
        Usuario: <input type="text" name="usuario" required><br>
        Contraseña: <input type="password" name="contrasena" required><br
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>