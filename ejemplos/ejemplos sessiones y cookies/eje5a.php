<?php

// muestre el noombre 
// de usuario. En la pafgina de destino, si no existe debe 
// mostrar el mensaje de incioo de sesion

session_start();

if (isset($_SESSION['usuario'])) {
    echo "El nombre de usuario es: " . $_SESSION['usuario'];
} else {
    echo "No hay sesión iniciada.";
}

echo "<br><a href='eje5.php'>Volver</a>";

